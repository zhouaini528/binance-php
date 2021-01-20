<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api\WebSocket;

use GlobalData\Server;
use GlobalData\Client;

trait SocketGlobal
{
    protected $server;
    protected $client;

    private $config=[];

    private function port(){
        switch ($this->config['baseurl']){
            case 'ws://fstream.binance.com':{
                return '2210';
            }
            case 'ws://dstream.binance.com':{
                return '2209';
            }
            //ws://stream.binance.com:9443
            default:{
                return '2208';
            }
        }
    }

    protected function server(){
        $address=isset($this->config['global']) ? explode(':',$this->config['global']) : ['0.0.0.0',$this->port()];
        $this->server=new Server($address[0],$address[1]);
        return $this;
    }

    protected function client(){
        $address=isset($this->config['global']) ? $this->config['global'] : '0.0.0.0:'.$this->port();
        $this->client=new Client($address);
        return $this;
    }

    protected function add($key,$value){
        $this->client->add($key,$value);

        $this->saveGlobalKey($key);
    }

    protected function get($key){
        if(!isset($this->client->$key) || empty($this->client->$key)) return [];
        return $this->client->$key;
    }


    protected function save($key,$value){
        if(!isset($this->client->$key)) $this->add($key,$value);
        else $this->client->$key=$value;
    }

    /**
     * 对了获取数据
     * @param $key
     * @return array
     */
    protected function getQueue($key){
        if(!isset($this->client->$key) || empty($this->client->$key)) return [];

        do{
            $old_value=$new_value=$this->client->$key;

            if(empty($new_value)) return [];
            //队列先进先出。
            $value=array_shift($new_value);
        }
        while(!$this->client->cas($key, $old_value, $new_value));

        return $value;
    }

    /**
     * 队列保存数据
     * @param $key
     * @param $value
     */
    protected function saveQueue($key,$value){
        //最大存储数据量，超过后保留一条最新的数据，其余数据全部删除。
        $max= isset($this->config['queue_count']) ? $this->config['queue_count'] : 100;

        if(!isset($this->client->$key)) $this->add($key,[$value]);
        else {
            do{
                $old_value=$new_value=$this->client->$key;

                //超过最大数据量，保留最新数据
                if(count($new_value)>$max){
                    $new_value=[$value];
                }else{
                    array_push($new_value,$value);
                }
            }
            while(!$this->client->cas($key, $old_value, $new_value));
        }
    }

    protected function addSubUpdate($data=[]){
        do{
            $old_value=$new_value=$this->client->add_sub;
            foreach ($new_value as $k=>$v){
                unset($new_value[$k]);
            }
        }
        while(!$this->client->cas('add_sub', $old_value, $new_value));
    }

    protected function delSubUpdate($data=[]){
        do{
            $old_value=$new_value=$this->client->del_sub;
            foreach ($new_value as $k=>$v){
                unset($new_value[$k]);
            }
        }
        while(!$this->client->cas('del_sub', $old_value, $new_value));
    }

    protected function allSubUpdate($data,$type='add'){
        do{
            $old_value=$new_value=$this->client->all_sub;

            foreach ($data as $k=>$v){
                switch ($type){
                    case 'add':{
                        if(is_array($v)){
                            if(!isset($new_value[$k])) $new_value[$k]=$v;
                            else $new_value[$k]=array_unique(array_merge($new_value[$k],$v));
                        }else{
                            $new_value[$k]=$v;
                        }
                        break;
                    }
                    case 'del':{
                        unset($new_value[$k]);
                        break;
                    }
                }
            }

        }
        while(!$this->client->cas('all_sub', $old_value, $new_value));
    }

    protected function keysecretInit($keysecret,$data=[]){
        do {
            $old_value = $new_value = $this->client->keysecret;

            if(empty($data)) {
                $new_value[$keysecret['key']]=[];
            }else{
                if(isset($new_value[$keysecret['key']])) $new_value[$keysecret['key']]=array_merge($new_value[$keysecret['key']],$keysecret);
                else $new_value[$keysecret['key']]=$keysecret;

                if(!empty($data)){
                    foreach ($data as $k=>$v){
                        $new_value[$keysecret['key']][$k]=$v;
                    }
                }
            }
        }
        while(!$this->client->cas('keysecret', $old_value, $new_value));
    }

    protected function saveGlobalKey($key){
        do {
            $old_value = $new_value = $this->client->global_key;
            $new_value[$key]=$key;
        }
        while(!$this->client->cas('global_key', $old_value, $new_value));
    }

    /**
     * binance
     */
    protected function getId(){
        list($msec, $sec) = explode(' ', microtime());
        return (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
    }
}
