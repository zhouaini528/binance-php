<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api\Futures;

use Lin\Binance\Request;

class User extends Request
{
    //Default required HMAC SHA256
    protected $signature=true;

    /**
     * GET /fapi/v1/openOrders (HMAC SHA256)
     * */
    public function getOpenOrders(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/openOrders';

        $data['timestamp']=time().'000';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/allOrders (HMAC SHA256)
     * */
    public function getAllOrders(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/allOrders';

        $data['timestamp']=time().'000';
        $data['limit']=$data['limit'] ?? 1000;

        $this->data=$data;
        return $this->exec();
    }

    /**
     *Get /fapi/v1/balance (HMAC SHA256)
     * */
    public function getBalance(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/balance';

        $data['timestamp']=time().'000';

        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/account (HMAC SHA256)
     * */
    public function getAccount(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/account';

        $data['timestamp']=time().'000';

        $this->data=$data;
        return $this->exec();
    }


    /**
     *GET /fapi/v1/userTrades (HMAC SHA256)
     * */
    public function getTrades(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/userTrades';

        $data['timestamp']=time().'000';

        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/income (HMAC SHA256)
     * */
    public function getIncome(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/income';

        $data['timestamp']=time().'000';

        $this->data=$data;
        return $this->exec();
    }
}
