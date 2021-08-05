<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api\WebSocket;


trait SocketFunction
{
    //标记分隔符
    static $USER_DELIMITER='===';

    /**
     * @param $key_secret
     * @return mixed
     */
    public function getListenKey(array $key_secret){
        //'baseurl'=>'ws://stream.binance.com:9443',//default
        //'baseurl'=>'ws://fstream.binance.com',
        //'baseurl'=>'ws://dstream.binance.com',

        switch ($this->config['baseurl']){
            case 'ws://fstream.binance.com':{
                $binance=new \Lin\Binance\BinanceFuture($key_secret['key'],$key_secret['secret']);
                $listen_key=$binance->user()->postListenKey();
                break;
            }
            case 'ws://dstream.binance.com':{
                $binance=new \Lin\Binance\BinanceDelivery($key_secret['key'],$key_secret['secret']);
                $listen_key=$binance->user()->postListenKey();
                break;
            }
            //ws://stream.binance.com:9443
            default:{
                $binance=new \Lin\Binance\Binance($key_secret['key'],$key_secret['secret']);
                $listen_key=$binance->user()->postUserDataStream();
            }
        }

        return current($listen_key);
    }

    /**
     * @param $global
     * @param $tag
     * @param $data
     * @param string $keysecret
     */
    protected function errorMessage($global,$tag,$data,$keysecret=''){
        $all_sub=$global->get('all_sub');
        if(empty($all_sub)) return;

        if($tag=='public') {
            //查询 message 是否包含了关键词。并把错误信息写入频道记录
            foreach ($all_sub as $k=>$v){
                if(is_array($v)) continue;
                $sub=strtolower($v);
                if(stristr(strtolower($data['message']),$v)!==false) $global->save($sub,$data);
            }
        }else{
            //如果是用户单独订阅，则该用户所有相关的订阅都显示该错误
            /*foreach ($all_sub as $k=>$v){
                if(!is_array($v)) continue;
                $sub=strtolower($v[0]);
                $global->add($keysecret['key'].$sub,$data);
            }*/
        }
    }

    protected function log($message){
        if (!is_string($message)) $message=json_encode($message);

        $time=time();
        $tiemdate=date('Y-m-d H:i:s',$time);

        $message=$tiemdate.' '.$message.PHP_EOL;

        if(isset($this->config['log'])){
            if(is_array($this->config['log']) && isset($this->config['log']['filename'])){
                $filename=$this->config['log']['filename'].'-'.date('Y-m-d',$time).'.txt';
            }else{
                $filename=date('Y-m-d',$time).'.txt';
            }

            file_put_contents($filename,$message,FILE_APPEND);
        }

        echo $message;
    }

    /**
     * 设置用户key
     * @param $keysecret
     */
    protected function userKey(array $keysecret,string $sub){
        return $keysecret['key'].self::$USER_DELIMITER.$sub;
    }

    /**
     * 重新订阅
     */
    private function reconnection($global,$type='public',array $keysecret=[]){
        $all_sub=$global->get('all_sub');
        if(empty($all_sub)) return;

        $temp=[];
        if($type=='public'){
            foreach ($all_sub as $v){
                if(!is_array($v)) $temp[]=$v;
            }
            //$global->save('add_sub',$temp);
        }else{

        }

        $add_sub=$global->get('add_sub');
        if(empty($add_sub)) $global->save('add_sub',$temp);
        else $global->save('add_sub',array_merge($temp,$add_sub));
    }
}
