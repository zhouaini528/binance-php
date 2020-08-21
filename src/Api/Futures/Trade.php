<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api\Futures;

use Lin\Binance\Request;

class Trade extends Request
{
    //Default required HMAC SHA256
    protected $signature=true;

    function __construct(array $data)
    {
        parent::__construct($data);

        $this->data['timestamp']=time().'000';
    }

    /*
     *GET /fapi/v1/positionSide/dual (HMAC SHA256)
     */
    public function getPositionSideDual(array $data=[]){
        $this->type='get';
        $this->path='/fapi/v1/positionSide/dual';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /*
     *POST /fapi/v1/order (HMAC SHA256)
     */
    public function postOrder(array $data=[]){
        $this->type='POST';
        $this->path='/fapi/v1/order';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /*
     *POST /fapi/v1/order/test (HMAC SHA256)
     */
    public function postOrderTest(array $data=[]){
        $this->type='POST';
        $this->path='/fapi/v1/order/test';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /*
     *POST /fapi/v1/batchOrders (HMAC SHA256)
     */
    public function postBatchOrders(array $data=[]){
        $this->type='POST';
        $this->path='/fapi/v1/batchOrders';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /*
     *DELETE /fapi/v1/order (HMAC SHA256)
     */
    public function deleteOrder(array $data=[]){
        $this->type='DELETE';
        $this->path='/fapi/v1/order';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /*
     *DELETE /fapi/v1/allOpenOrders (HMAC SHA256)
     */
    public function deleteAllOpenOrders(array $data=[]){
        $this->type='DELETE';
        $this->path='/fapi/v1/allOpenOrders';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /*
     *DELETE /fapi/v1/batchOrders (HMAC SHA256)
     */
    public function deleteBatchOrders(array $data=[]){
        $this->type='DELETE';
        $this->path='/fapi/v1/batchOrders';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /*
     *POST /fapi/v1/countdownCancelAll (HMAC SHA256)
     */
    public function postCountdownCancelAll(array $data=[]){
        $this->type='POST';
        $this->path='/fapi/v1/countdownCancelAll';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /*
     *POST /fapi/v1/leverage (HMAC SHA256)
     */
    public function postLeverage(array $data=[]){
        $this->type='get';
        $this->path='/fapi/v1/leverage';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /*
     *POST /fapi/v1/marginType (HMAC SHA256)
     */
    public function getMarginType(array $data=[]){
        $this->type='POST';
        $this->path='/fapi/v1/marginType';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /*
     *POST /fapi/v1/positionMargin (HMAC SHA256)
     */
    public function postPositionMargin(array $data=[]){
        $this->type='POST';
        $this->path='/fapi/v1/positionMargin';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /*
     *GET /fapi/v1/positionMargin/history (HMAC SHA256)
     */
    public function getPositionMarginHistory(array $data=[]){
        $this->type='get';
        $this->path='/fapi/v1/positionMargin/history';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /*
     *GET /fapi/v1/positionRisk (HMAC SHA256)
     */
    public function getPositionRisk(array $data=[]){
        $this->type='get';
        $this->path='/fapi/v1/positionRisk';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }
}
