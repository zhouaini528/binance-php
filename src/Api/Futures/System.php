<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api\Futures;

use Lin\Binance\Request;

class System extends Request
{
    //Default required HMAC SHA256
    protected $signature=true;

    /**
     * GET /fapi/v1/ping
     * */
    public function getPing(array $data=[]){
        $this->signature=false;

        $this->type='GET';
        $this->path='/fapi/v1/ping';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/time
     * */
    public function getTime(array $data=[]){
        $this->signature=false;

        $this->type='GET';
        $this->path='/fapi/v1/time';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.binance.com/sapi/v1/futures/transfer   HMAC SHA256
     * */
    public function postTransfer(array $data=[]){
        $this->type='POST';
        $this->path='/fapi/v1/time';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.binance.com/sapi/v1/futures/transfer   HMAC SHA256
     * */
    public function getTransfer(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/time';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/positionRisk (HMAC SHA256)
     * */
    public function getPositionRisk(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/time';
        $this->data=$data;
        return $this->exec();
    }
}
