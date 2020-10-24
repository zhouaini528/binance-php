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

    private function newConnection(){
        return function($tag,$keysecret){
            $global=$this->client();

            $baseurl=isset($this->config['baseurl']) ? $this->config['baseurl'] : 'ws://stream.binance.com:9443';

            $baseurl='ws://stream.binance.com:9443/stream';

            $this->connection[$this->connectionIndex] = new AsyncTcpConnection($baseurl);
            $this->connection[$this->connectionIndex]->transport = 'ssl';

            //自定义属性
            $this->connection[$this->connectionIndex]->tag=$tag;//标记公共连接还是私有连接
            if(!empty($keysecret)) $this->connection[$this->connectionIndex]->tag_keysecret=$keysecret;//标记私有连接

            $this->connection[$this->connectionIndex]->onConnect=$this->onConnect($keysecret);
            $this->connection[$this->connectionIndex]->onMessage=$this->onMessage($global);
            $this->connection[$this->connectionIndex]->onClose=$this->onClose();
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

            $timestamp=round(microtime(true)*1000)/1000;

            $message = $timestamp.'GET/users/self/verify';
            $sign=base64_encode(hash_hmac('sha256', $message, $keysecret['secret'], true));
            $data = json_encode([
                'op' => "login",
                'args' => [$keysecret['key'], $keysecret['passphrase'], $timestamp, $sign]
            ]);

            $con->send($data);

            $this->log($keysecret['key'].' new connect send');
        };
    }

    private function onMessage($global){
        return function($con,$data) use($global){
            $data=json_decode($data,true);

            if(isset($data['stream'])) {
                $table=$data['stream'];

                if($con->tag != 'public') $table=$this->userKey($con->tag_keysecret,$table);

                $global->save($table,$data);
                return;
            }
        };
    }

    private function onClose(){
        return function($con){
            $this->log('reconnection');

            //这里连接失败 会轮询 connect
            $con->reConnect(5);
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

        Timer::add($time, function() use ($con) {
            //$con->send('ping');

            $this->log($con->tag.' send ping');
        });
    }

    private function other($con,$global){
        $time=isset($this->config['listen_time']) ? $this->config['listen_time'] : 2 ;

        Timer::add($time, function() use($con,$global) {
            $this->subscribe($con,$global);

            //$this->unsubscribe($con,$global);

            $this->log('listen '.$con->tag);
        });
    }

    private function subscribe($con,$global){
        if(empty($global->get('add_sub'))) return;

        if($con->tag=='public'){
            //公共订阅 并 触发私有连接
            $this->subscribePublic($con,$global);
        }else{
            //$this->subscribePrivate($con,$global);
        }

        return;
    }

    private function subscribePublic($con,$global){
        $sub=[
            'public'=>[],
            'private'=>[],
        ];

        $temp=$global->get('add_sub');
        foreach ($temp as $v){
            if(count($v)>1) $sub['private'][$v[1]['key']]=$v[1];
            else array_push($sub['public'],$v[0]);
        }

        //有私有频道先去建立新连接 即登陆
        foreach ($sub['private'] as $v){
            $this->login($global,$v);
        }

        //公共连接 标记订阅频道是否有改变。
        if(empty($sub['public'])) {
            $this->log('public dont change return');
            return;
        }


        $data=[
            "method"=>"SUBSCRIBE",
            'params'=>$sub['public'],
            'id'=>12345
        ];

        $data=json_encode($data);
        $con->send($data);

        $this->log($data);
        $this->log('public subscribe send');

        //*******订阅成功后，删除add_sub  public 值
        $global->addSubUpdate('public');

        //*******订阅成功后 更改 all_sub  public 值
        $global->allSubUpdate('public',['sub'=>$sub['public']]);
    }

    private function subscribePrivate($con,$global){
        $sub=[];
        $keysecret=$con->tag_keysecret;
        $temp=$global->get('add_sub');
        //判断是否是私有连接，并判断该私有连接是否是  当前用户。
        foreach ($temp as $v){
            $key=$v[1]['key'];
            if(count($v)>1 && $key==$keysecret['key']) $sub[]=$v[0];
        }

        if(empty($sub)) {
            $this->log('subscribe private return');
            return;
        }

        //**********判断是否已经登陆
        $client_keysecret=$global->get('keysecret');
        $keysecret=$con->tag_keysecret;
        if($client_keysecret[$keysecret['key']]['login']!=1) {
            $this->log('subscribe private dont login return '.$keysecret['key']);
            return;
        }

        $data=[
            'op' => "subscribe",
            'args' => $sub,
        ];

        $data=json_encode($data);
        $con->send($data);

        $this->log($data);
        $this->log('private subscribe send '.$keysecret['key']);

        //*******订阅成功后，删除add_sub   值
        $global->addSubUpdate('private',['user_key'=>$keysecret['key']]);


        //*******订阅成功后 更改 all_sub   值
        $global->allSubUpdate('private',['sub'=>$temp]);

        return;
    }

    private function unsubscribe($con,$global){
        if(empty($this->get('del_sub'))) return;

        if($con->tag=='public'){
            //公共订阅 并 触发私有连接
            $this->unsubscribePublic($con,$global);
        }else{
            $this->unsubscribePrivate($con,$global);
        }

        return;
    }

    private function unsubscribePublic($con,$global){
        $unsub=[];
        $temp=$this->get('del_sub');
        foreach ($temp as $v){
            if(count($v)==1) $unsub[]=$v[0];
        }

        if(empty($unsub)) {
            $this->log('unsubscribe public return');
            return;
        }

        //判断当前是否已经重复订阅。可以无所谓。
        $data=[
            'op' => "unsubscribe",
            'args' => $unsub,
        ];

        $data=json_encode($data);
        $con->send($data);

        $this->log($data);
        $this->log('public unsubscribe send');

        //*******订阅成功后，删除del_sub  public 值
        $global->delSubUpdate('public');


        //*******订阅成功后 更改 all_sub  public 值
        $global->unAllSubUpdate('public',['sub'=>$unsub]);

    }

    private function unsubscribePrivate($con,$global){
        $unsub=[];
        $keysecret=$con->tag_keysecret;
        $temp=$global->get('del_sub');
        //判断是否是私有连接，并判断该私有连接是否是  当前用户。
        foreach ($temp as $v){
            $key=$v[1]['key'];
            if(count($v)>1 && $key==$keysecret['key']) $unsub[]=$v[0];
        }

        if(empty($unsub)) {
            $this->log('unsubscribe private return');
            return;
        }

        $data=[
            'op' => "unsubscribe",
            'args' => $unsub,
        ];

        $data=json_encode($data);
        $con->send($data);

        $this->log($data);
        $this->log('private unsubscribe send '.$keysecret['key']);

        //*******订阅成功后，删除add_sub   值
        $global->delSubUpdate('private',['user_key'=>$keysecret['key']]);

        //*******订阅成功后 更改 all_sub   值
        $global->unAllSubUpdate('private',['sub'=>$temp]);
    }

    private function login($global,$keysecret){
        //判断是否已经登陆
        $old_client_keysecret=$global->get('keysecret');
        if(empty($old_client_keysecret)) {
            $this->log('private no value keysecret return ');
            return;
        }

        if($old_client_keysecret[$keysecret['key']]['login']==1) {
            $this->log('private already login return '.$keysecret['key']);
            return;
        }

        if($old_client_keysecret[$keysecret['key']]['login']==2) {
            $this->log('private doing return '.$keysecret['key']);
            return;
        }

        $this->log('private new connection '.$keysecret['key']);

        //**********如果登陆失败，事件监听会再次 执行轮询 创建新连接，所以必须要有正在登陆中的状态标记
        $global->keysecretUpdate($keysecret['key'],2);

        //当前连接是公共连接才允许建立新的私有连接
        $this->addConnection($keysecret['key'],$keysecret);
    }
}
