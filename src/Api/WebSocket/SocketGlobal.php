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

    protected function server(){
        $address=isset($this->config['global']) ? explode(':',$this->config['global']) : ['0.0.0.0','2208'];
        $this->server=new Server($address[0],$address[1]);
        return $this;
    }

    protected function client(){
        $address=isset($this->config['global']) ? $this->config['global'] : '0.0.0.0:2208';
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

    protected function addSubUpdate($type='public',$data=[]){
        do{
            $old_value=$new_value=$this->client->add_sub;
            foreach ($new_value as $k=>$v){
                if($type=='public' && count($v)==1) unset($new_value[$k]);
                if($type=='private') {
                    //添加的频道必须当前用户
                    $key=$v[1]['key'];
                    if(count($v)>1 && $key==$data['user_key']) unset($new_value[$k]);
                }
            }
        }
        while(!$this->client->cas('add_sub', $old_value, $new_value));
    }

    protected function delSubUpdate($type='public',$data=[]){
        do{
            $old_value=$new_value=$this->client->del_sub;
            foreach ($new_value as $k=>$v){
                if($type=='public' && count($v)==1) unset($new_value[$k]);
                if($type=='private') {
                    //添加的频道必须当前用户
                    $key=$v[1]['key'];
                    if(count($v)>1 && $key==$data['user_key']) unset($new_value[$k]);
                }
            }
        }
        while(!$this->client->cas('del_sub', $old_value, $new_value));
    }

    protected function allSubUpdate($type='public',$data=[]){
        do{
            $old_value=$new_value=$this->client->all_sub;
            foreach ($data['sub'] as $v){
                if($type=='public') $key=$v;
                if($type=='private') $key=$v[1]['key'].$v[0];
                $new_value[$key]=$v;
            }
        }
        while(!$this->client->cas('all_sub', $old_value, $new_value));
    }

    protected function unAllSubUpdate($type='public',$data=[]){
        do{
            $old_value=$new_value=$this->client->all_sub;
            foreach ($data['sub'] as $v){
                if($type=='public') unset($new_value[$v]);
                if($type=='private') unset($new_value[$v[1]['key'].$v[0]]);
            }
        }
        while(!$this->client->cas('all_sub', $old_value, $new_value));
    }

    protected function keysecretUpdate($key,$login=0){
        do{
            $old_client_keysecret=$new_client_keysecret=$this->client->keysecret;
            $new_client_keysecret[$key]['login']=$login;
        }
        while(!$this->client->cas('keysecret', $old_client_keysecret, $new_client_keysecret));
    }

    protected function keysecretInit($keysecret){
        do {
            $old_value = $new_value = $this->client->keysecret;

            if(!isset($new_value[$keysecret['key']])) {
                $new_value[$keysecret['key']]=$keysecret;
                $new_value[$keysecret['key']]['login']=0;
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
}
