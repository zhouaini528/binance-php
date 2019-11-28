<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api\Futures;

use Lin\Binance\Request;

class Trade extends Request
{
    //该接口默认需要HMAC SHA256
    protected $signature=true;
    
    /**
     *POST /fapi/v1/order (HMAC SHA256)
     */
    public function postOrderTest(array $data){
        $this->type='POST';
        $this->path='/fapi/v1/order/test';
        
        $data['timestamp']=time().'000';
        
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     * POST /fapi/v1/order/test (HMAC SHA256)
     */
    public function postOrder(array $data){
        $this->type='POST';
        $this->path='/fapi/v1/order';
        
        $data['timestamp']=time().'000';
        
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     * GET /fapi/v1/order (HMAC SHA256)
     */
    public function getOrder(array $data){
        $this->type='GET';
        $this->path='/fapi/v1/order';
        
        $data['timestamp']=time().'000';
        
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *DELETE /fapi/v1/order (HMAC SHA256)
     * */
    public function deleteOrder(array $data){
        $this->type='DELETE';
        $this->path='/fapi/v1/order';
        
        $data['timestamp']=time().'000';
        
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     * POST /fapi/v1/leverage (HMAC SHA256)
     * */
    public function postLeverage(array $data){
        $this->type='DELETE';
        $this->path='/fapi/v1/leverage';
        
        $data['timestamp']=time().'000';
        
        $this->data=$data;
        return $this->exec();
    }
}