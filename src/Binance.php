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
    
    function __construct(string $key='',string $secret='',string $host='https://api.huobi.pro'){
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
     * 
     * */
    public function user(){
        return new User($this->init());
    }
    
    /**
     *
     * */
    public function system(){
        return new System($this->init());
    }
    
    /**
     *
     * */
    public function trade(){
        return new Trade($this->init());
    }
}