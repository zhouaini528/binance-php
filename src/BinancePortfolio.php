<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance;


use Lin\Binance\Api\Portfolio\Account;
use Lin\Binance\Api\Portfolio\Trade;
use Lin\Binance\Api\Portfolio\Websocket;

class BinancePortfolio
{
    protected $key;
    protected $secret;
    protected $host;

    protected $options=[];

    function __construct(string $key='',string $secret='',string $host='https://papi.binance.com'){
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

            'options'=>$this->options,
        ];
    }

    /**
     *
     * */
    function setOptions(array $options=[]){
        $this->options=$options;
    }

    /**
     *
     * */
    public function trade(){
        return new Trade($this->init());
    }

    public function websocket(){
        return new Websocket($this->init());
    }

    public function account(){
        return new Account($this->init());
    }

    public function um(){
        return (new Trade($this->init()))->um();
    }

    public function cm(){
        return (new Trade($this->init()))->cm();
    }

    public function margin(){
        return (new Trade($this->init()))->margin();
    }
}
