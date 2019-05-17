<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance;


use Lin\Binance\Api\User;
use Lin\Binance\Api\System;
use Lin\Binance\Api\Trade;

class Binance
{
    protected $key;
    protected $secret;
    protected $host;
    
    protected $proxy=false;
    
    function __construct(string $key='',string $secret='',string $host='https://api.binance.com'){
        $this->key=$key;
        $this->secret=$secret;
        $this->host=$host;
    }
    
    /**
     *
     * */
    private function init(){
        return [
            'key'=>$this->key,
            'secret'=>$this->secret,
            'host'=>$this->host,
        ];
    }
    
    /**
     * Local development sets the proxy
     * @param bool|array
     * $proxy=false Default
     * $proxy=true  Local proxy http://127.0.0.1:12333
     *
     * Manual proxy
     * $proxy=[
     'http'  => 'http://127.0.0.1:12333',
     'https' => 'http://127.0.0.1:12333',
     'no'    =>  ['.cn']
     * ]
     * */
    function setProxy($proxy=true){
        $this->proxy=$proxy;
    }
    
    /**
     * 
     * */
    public function user(){
        $user= new User($this->init());
        $user->proxy($this->proxy);
        return $user;
    }
    
    /**
     *
     * */
    public function system(){
        $system= new System($this->init());
        $system->proxy($this->proxy);
        return $system;
    }
    
    /**
     *
     * */
    public function trade(){
        $trade= new Trade($this->init());
        $trade->proxy($this->proxy);
        return $trade;
    }
}