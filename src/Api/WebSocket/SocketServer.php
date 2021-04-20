<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api\WebSocket;

use Lin\Binance\Api\WebSocket\SocketGlobal;
use Lin\Binance\Api\WebSocket\SocketFunction;
use Workerman\Lib\Timer;
use Workerman\Worker;
use Workerman\Connection\AsyncTcpConnection;

class SocketServer
{
    use SocketGlobal;
    use SocketFunction;

    private $worker;

    private $connection=[];
    private $connectionIndex=0;
    private $config=[];

    function __construct(array $config=[])
    {
        $this->config=$config;
    }

    public function start(){
        $this->worker = new Worker();
        $this->server();

        $this->worker->onWorkerStart = function() {
            $this->addConnection('public');
        };

        Worker::runAll();
    }

    private function addConnection(string $tag,array $keysecret=[]){
        $this->newConnection()($tag,$keysecret);
    }

    private function getBaseUrl($global,$keysecret){
        $baseurl=isset($this->config['baseurl']) ? $this->config['baseurl'] : 'ws://stream.binance.com:9443';

        if(empty($keysecret)) {
            $baseurl.='/stream';
        }else{
            //$baseurl='ws://stream.binance.com:9443/ws/w2DAeRP0jmuWT0yEw01gAfM9BUAwdwSW9cjU4VKyesUWtHe4Uw3Ch82gp9D6';
            $client_keysecret=$global->get('keysecret');
            $baseurl.='/ws/'.$client_keysecret[$keysecret['key']]['listen_key'];
        }

        return $baseurl;
    }

    private function newConnection(){
        return function($tag,$keysecret){
            $global=$this->client();

            $baseurl=$this->getBaseUrl($global,$keysecret);

            $this->connection[$this->connectionIndex] = new AsyncTcpConnection($baseurl);
            $this->connection[$this->connectionIndex]->transport = 'ssl';

            $this->log('Connection '.$baseurl);

            //自定义属性
            $this->connection[$this->connectionIndex]->tag=$tag;//标记公共连接还是私有连接
            $this->connection[$this->connectionIndex]->tag_reconnection_num=0;//标记当前已重连次数
            if(!empty($keysecret)) $this->connection[$this->connectionIndex]->tag_keysecret=$keysecret;//标记私有连接

            $this->connection[$this->connectionIndex]->onConnect=$this->onConnect($keysecret);
            $this->connection[$this->connectionIndex]->onMessage=$this->onMessage($global);
            $this->connection[$this->connectionIndex]->onClose=$this->onClose($global);
            $this->connection[$this->connectionIndex]->onError=$this->onError();

            $this->connect($this->connection[$this->connectionIndex]);
            $this->ping($this->connection[$this->connectionIndex]);
            $this->other($this->connection[$this->connectionIndex],$global);

            $this->connectionIndex++;
        };
    }

    private function onConnect(array $keysecret){
        return function($con) use($keysecret){
            if(empty($keysecret)) return;

            $this->keysecretInit($keysecret,[
                'connection'=>1
            ]);

            $this->log($keysecret['key'].' new connect send');
        };
    }

    private function onMessage($global){
        return function($con,$data) use($global){
            $data=json_decode($data,true);

            if(isset($data['stream'])) {
                /*$debug=$global->get('debug2');
                if($debug==1){
                    $con->tag_data_time='1618899692';
                    return;
                }*/

                $table=$data['stream'];
                $global->save($table,$data);

                //最后数据更新时间
                $con->tag_data_time=time();
                //成功接收数据重连次数回归0
                $con->tag_reconnection_num=0;
                return;
            }

            if(isset($data['e']) && $con->tag!='public') {
                $table=$this->userKey($con->tag_keysecret,$data['e']);

                $global->saveQueue($table,$data);

                $global->allSubUpdate([$con->tag_keysecret['key']=>[$table]],'add');
                return;
            }

            if(isset($data['result']) && empty($data['result'])) return;

            $this->log($data);
        };
    }

    private function onClose($global){
        return function($con) use($global){
            //这里连接失败 会轮询 connect
            if($con->tag=='public') {
                //TODO如果连接失败  应该public  private 都行重新加载
                $this->log($con->tag.' reconnection');

                $this->reconnection($global,'public');
            }else{
                $this->log('private connection close,ready to reconnect '.$con->tag_keysecret['key']);

                //更改为掉线状态
                $listen_key=$this->getListenKey($con->tag_keysecret);
                $this->keysecretInit($con->tag_keysecret,[
                    'connection'=>2,
                    'listen_key'=>$listen_key,
                    'listen_key_time'=>time(),
                    'connection_close'=>0,
                ]);

                //重新订阅私有频道
                $this->reconnection($global,'private',$con->tag_keysecret);
            }

            $con->reConnect(10);
        };
    }

    private function onError(){
        return function($con, $code, $msg){
            $this->log('onerror code:'.$code.' msg:'.$msg);
        };
    }

    private function connect($con){
        $con->connect();
    }

    private function ping($con){
        $time=isset($this->config['ping_time']) ? $this->config['ping_time'] : 20 ;

        $con->timer_ping=Timer::add($time, function() use ($con) {
            //$con->send('ping');

            $this->log($con->tag.' send ping');
        });
    }

    private function other($con,$global){
        $time=isset($this->config['listen_time']) ? $this->config['listen_time'] : 2 ;

        $con->timer_other=Timer::add($time, function() use($con,$global) {
            $this->subscribe($con,$global);

            $this->unsubscribe($con,$global);

            $this->account($con,$global);

            $this->coinFutureSubscribe($con,$global);

            $this->debug($con,$global);

            //公共数据如果60秒内无数据更新，则断开连接重新订阅，重试次数不超过10次
            if($con->tag=='public') {
                /*if(isset($con->tag_data_time)){
                    //debug
                    echo time() - $con->tag_data_time;
                    echo PHP_EOL;
                }*/

                //public
                if (isset($con->tag_data_time) && time() - $con->tag_data_time > 60 * ($con->tag_reconnection_num + 1) && $con->tag_reconnection_num <= 10) {
                    $con->close();

                    $con->tag_reconnection_num++;

                    $this->log('listen ' . $con->tag . ' reconnection_num:' . $con->tag_reconnection_num . ' tag_data_time:' . $con->tag_data_time);
                }
            }else{
                //private

            }

            $this->log('listen '.$con->tag);
        });
    }

    /**
     * 调试用
     * @param $con
     * @param $global
     */
    private function debug($con,$global){
        $debug=$global->get('debug');

        if($con->tag=='public') {
            //public
            if(isset($debug['public']) && $debug['public'][$con->tag]=='close'){
                $this->log($con->tag.' debug '.json_encode($debug));

                $debug['public'][$con->tag]='recon';
                $global->save('debug',$debug);

                $con->close();
            }
        }else{
            //private
            if(isset($debug['private'][$con->tag_keysecret['key']]) && $debug['private'][$con->tag_keysecret['key']]=='close'){
                $this->log($con->tag_keysecret['key'].' debug '.json_encode($debug));

                $debug['private'][$con->tag_keysecret['key']]='recon';
                $global->save('debug',$debug);

                $con->close();
            }
        }
    }

    private function subscribe($con,$global){
        if(empty($global->get('add_sub'))) return;

        $sub=$global->get('add_sub');

        //公共连接 标记订阅频道是否有改变。
        if(empty($sub)) {
            $this->log('public dont change return');
            return;
        }

        $data=[
            "method"=>"SUBSCRIBE",
            'params'=>$sub,
            'id'=>$this->getId()
        ];

        $data=json_encode($data);
        $con->send($data);

        $this->log($data);
        $this->log('public subscribe send');

        //*******订阅成功后，删除add_sub  public 值
        $global->addSubUpdate();

        //*******订阅成功后 更改 all_sub  public 值
        $global->allSubUpdate($sub,'add');

        return;
    }

    private function unsubscribe($con,$global){
        if(empty($this->get('del_sub'))) return;

        $unsub=[];
        $temp=$this->get('del_sub');
        foreach ($temp as $v){
            $unsub[]=$v;
        }

        if(empty($unsub)) {
            $this->log('unsubscribe public return');
            return;
        }

        //判断当前是否已经重复订阅。可以无所谓。
        $data=[
            "method"=>"UNSUBSCRIBE",
            'params'=>$unsub,
            'id'=>$this->getId()
        ];

        $data=json_encode($data);
        $con->send($data);

        $this->log($data);
        $this->log('public unsubscribe send');

        //*******订阅成功后，删除del_sub  public 值
        $global->delSubUpdate();

        //*******订阅成功后 更改 all_sub  public 值
        $global->allSubUpdate($unsub,'del');

        return;
    }

    private function account($con,$global){
        $keysecret=$global->get('keysecret');
        if(empty($keysecret)) return;

        foreach ($keysecret as $k=>$v){
            //是否取消连接
            if($con->tag!='public' && isset($v['connection_close']) && $v['connection_close']==1){
                $con->close();

                $this->keysecretInit($v,[]);

                $this->log('private connection close '.$v['key']);
                continue;
            }


            //是否有新的连接
            if(isset($v['connection'])){
                switch ($v['connection']){
                    case 0:{
                        $listen_key=$this->getListenKey($v);

                        $this->keysecretInit($v,[
                            'connection'=>2,
                            'listen_key'=>$listen_key,
                            'listen_key_time'=>time(),
                            'connection_close'=>0,
                        ]);

                        $this->log('private account new connection '.$v['key']);

                        $this->addConnection($v['key'],$v);
                        break;
                    }
                    case 1:{
                        //listen_key是否过期  60分钟过期时间
                        if(time()-$v['listen_key_time']>=3000) {

                            $listen_key=$this->getListenKey($v);
                            $this->keysecretInit($v,[
                                'listen_key'=>$listen_key,
                                'listen_key_time'=>time(),
                            ]);

                            $this->log('private update listen_key_time '.$v['key']);
                        }
                        break;
                    }
                    case 2:{
                        $this->log('private already account return '.$v['key']);
                        break;
                    }
                }
            }

        }
    }

    /**
     * @param $con
     * @param $global
     */
    private function coinFutureSubscribe($con,$global){
        if($con->tag!='public' && $this->config['baseurl']=='ws://dstream.binance.com'){
            $data=[
                "method"=>"REQUEST",
                'params'=>[
                    '@account',
                    '@balance',
                    '@position',
                ],
                'id'=>$this->getId()
            ];
            $con->send(json_encode($data));
        }
    }
}
