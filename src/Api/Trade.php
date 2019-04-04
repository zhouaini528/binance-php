<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api;

use Lin\Binance\Request;

class Trade extends Request
{
    /**
     * 下单 (TRADE)
    POST /api/v3/order  (HMAC SHA256)
     * */
    public function postOrder(array $data){
        $this->type='POST';
        $this->path='/api/v3/order';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     * 测试下单接口 (TRADE)
    POST /api/v3/order/test (HMAC SHA256)
     * */
    public function postOrderTest(array $data){
        $this->type='POST';
        $this->path='/api/v3/order/test';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *撤销订单 (TRADE)
    DELETE /api/v3/order  (HMAC SHA256)
     * */
    public function deleteOrder(array $data){
        $this->type='DELETE';
        $this->path='/api/v3/order';
        $this->data=$data;
        return $this->exec();
    }
}