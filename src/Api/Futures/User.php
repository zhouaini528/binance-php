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

    //Default seting
    protected $version='v1';

    function __construct(array $data)
    {
        parent::__construct($data);

        $this->data['timestamp']=time().'000';
    }

    /**
     *POST /fapi/v1/positionSide/dual (HMAC SHA256)  USER_DATA
     * */
     public function postPositionSideDual(array $data=[]){
        $this->type='POST';
        $this->path='/fapi/'.$this->version.'/positionSide/dual';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /**
     *GET /fapi/v1/order (HMAC SHA256) USER_DATA
     * */
    public function getOrder(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/'.$this->version.'/order';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /**
     *GET /fapi/v1/openOrder (HMAC SHA256) USER_DATA
     * */
    public function getOpenOrder(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/'.$this->version.'/openOrder';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /**
     *GET /fapi/v1/openOrders (HMAC SHA256) USER_DATA
     * */
    public function getOpenOrders(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/'.$this->version.'/openOrders';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /**
     *GET /fapi/v1/allOrders (HMAC SHA256) USER_DATA
     * */
    public function getAllOrders(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/'.$this->version.'/allOrders';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /**
     *GET /fapi/v2/balance (HMAC SHA256) USER_DATA
     * */
    public function getBalance(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/'.$this->version.'/balance';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /**
     *GET /fapi/v2/account (HMAC SHA256) USER_DATA
     * */
    public function getAccount(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/'.$this->version.'/account';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /**
     *GET /fapi/v2/positionRisk (HMAC SHA256) USER_DATA
     **/
    public function getPositionRisk(array $data=[]){
        $this->type='get';
        $this->path='/fapi/'.$this->version.'/positionRisk';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /**
     *GET /fapi/v1/userTrades (HMAC SHA256) USER_DATA
     * */
    public function getUserTrades(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/'.$this->version.'/userTrades';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /**
     *GET /fapi/v1/income (HMAC SHA256) USER_DATA
     * */
    public function getIncome(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/'.$this->version.'/income';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /**
     *GET /fapi/v1/leverageBracket  USER_DATA
     * */
    public function getLeverageBracket(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/'.$this->version.'/leverageBracket';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /**
     *GET /fapi/v1/forceOrders  USER_DATA
     * */
    public function getForceOrders(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/'.$this->version.'/forceOrders';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /**
     *GET /fapi/v1/adlQuantile USER_DATA
     * */
    public function getAdlQuantile(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/'.$this->version.'/adlQuantile';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /**
     * GET /fapi/v1/commissionRate (HMAC SHA256)
     * */
    public function getCommissionRate(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/'.$this->version.'/commissionRate';
        $this->data=array_merge($this->data,$data);
        return $this->exec();
    }

    /**
     * POST /fapi/v1/listenKey
     */
    public function postListenKey(array $data=[]){
        $this->type='POST';
        $this->path='/fapi/'.$this->version.'/listenKey';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *PUT /fapi/v1/listenKey
     */
    public function putListenKey(array $data=[]){
        $this->type='PUT';
        $this->path='/fapi/'.$this->version.'/listenKey';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *DELETE /fapi/v1/listenKey
     */
    public function deleteListenKey(array $data=[]){
        $this->type='DELETE';
        $this->path='/fapi/'.$this->version.'/listenKey';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/apiTradingStatus
     */
    public function getApiTradingStatus(array $data=[]){
        $this->type='get';
        $this->path='/fapi/'.$this->version.'/apiTradingStatus';
        $this->data=$data;
        return $this->exec();
    }
}
