<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api\Delivery;

use Lin\Binance\Request;

class Trade extends Request
{
    //Default required HMAC SHA256
    protected $signature=true;

    /*
     *GET /dapi/v1/positionSide/dual (HMAC SHA256)
     */
    public function getPositionSideDual(array $data=[]){
        $this->type='get';
        $this->path='/dapi/v1/positionSide/dual';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *POST /dapi/v1/order (HMAC SHA256)
     */
    public function postOrder(array $data=[]){
        $this->type='POST';
        $this->path='/dapi/v1/order';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *POST /dapi/v1/order/test (HMAC SHA256)
     */
    public function postOrderTest(array $data=[]){
        $this->type='POST';
        $this->path='/dapi/v1/order/test';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *POST /dapi/v1/batchOrders (HMAC SHA256)
     */
    public function postBatchOrders(array $data=[]){
        $this->type='POST';
        $this->path='/dapi/v1/batchOrders';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *DELETE /dapi/v1/order (HMAC SHA256)
     */
    public function deleteOrder(array $data=[]){
        $this->type='DELETE';
        $this->path='/dapi/v1/order';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *DELETE /dapi/v1/allOpenOrders (HMAC SHA256)
     */
    public function deleteAllOpenOrders(array $data=[]){
        $this->type='DELETE';
        $this->path='/dapi/v1/allOpenOrders';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *DELETE /dapi/v1/batchOrders (HMAC SHA256)
     */
    public function deleteBatchOrders(array $data=[]){
        $this->type='DELETE';
        $this->path='/dapi/v1/batchOrders';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *POST /dapi/v1/countdownCancelAll (HMAC SHA256)
     */
    public function postCountdownCancelAll(array $data=[]){
        $this->type='POST';
        $this->path='/dapi/v1/countdownCancelAll';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *POST /dapi/v1/leverage (HMAC SHA256)
     */
    public function postLeverage(array $data=[]){
        $this->type='get';
        $this->path='/dapi/v1/leverage';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *POST /dapi/v1/marginType (HMAC SHA256)
     */
    public function getMarginType(array $data=[]){
        $this->type='POST';
        $this->path='/dapi/v1/marginType';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *POST /dapi/v1/positionMargin (HMAC SHA256)
     */
    public function postPositionMargin(array $data=[]){
        $this->type='POST';
        $this->path='/dapi/v1/positionMargin';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *GET /dapi/v1/positionMargin/history (HMAC SHA256)
     */
    public function getPositionMarginHistory(array $data=[]){
        $this->type='get';
        $this->path='/dapi/v1/positionMargin/history';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *GET /dapi/v1/positionRisk (HMAC SHA256)
     */
    public function getPositionRisk(array $data=[]){
        $this->type='get';
        $this->path='/dapi/v1/positionRisk';
        $this->data=$data;
        return $this->exec();
    }
}
