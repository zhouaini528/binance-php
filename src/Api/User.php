<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api;

use Lin\Binance\Request;

class User extends Request
{
    //该接口默认需要HMAC SHA256
    protected $signature=true;
    
    /**
     * 查看账户当前挂单 (USER_DATA)
    GET /api/v3/openOrders  (HMAC SHA256)
     * */
    public function getOpenOrders(array $data){
        $this->type='GET';
        $this->path='/api/v3/openOrders';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *查询所有订单（包括历史订单） (USER_DATA)
    GET /api/v3/allOrders (HMAC SHA256)
    
    Name	Type	Mandatory	Description
    symbol	STRING	YES	
    orderId	LONG	NO	只返回此orderID之后的订单，缺省返回最近的订单
    startTime	LONG	NO	
    endTime	LONG	NO	
    limit	INT	NO	Default 500; max 1000.
    recvWindow	LONG	NO	
    timestamp	LONG	YES	
     * */
    public function getAllOrders(array $data){
        $this->type='GET';
        $this->path='/api/v3/allOrders';
        
        $data['timestamp']=time().'000';
        $data['limit']=$data['limit'] ?? 1000;
        
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *查询订单 (USER_DATA)
    GET /api/v3/order (HMAC SHA256)
    
    Name	Type	Mandatory	Description
    symbol	STRING	YES	
    orderId	LONG	NO	
    origClientOrderId	STRING	NO	
    recvWindow	LONG	NO	
    timestamp	LONG	YES	
     * */
    public function getOrder(array $data){
        $this->type='GET';
        $this->path='/api/v3/order';
        
        $data['timestamp']=time().'000';
        
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *账户信息 (USER_DATA)
    GET /api/v3/account (HMAC SHA256)
    
    Name	Type	Mandatory	Description
    recvWindow	LONG	NO	
    timestamp	LONG	YES	
     * */
    public function getAccount(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/account';
        
        $data['timestamp']=time().'000';
        
        $this->data=$data;
        return $this->exec();
    }
    

    /**
     *账户成交历史 (USER_DATA)
    GET /api/v3/myTrades  (HMAC SHA256)
     * */
    public function getMyTrades(array $data){
        $this->type='GET';
        $this->path='/api/v3/myTrades';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *充值历史 (USER_DATA)
    GET /wapi/v3/depositHistory.html (HMAC SHA256)
     * */
    public function getDepositHistory(array $data){
        $this->type='GET';
        $this->path='/wapi/v3/depositHistory.html';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *提现历史 (USER_DATA)
    GET /wapi/v3/withdrawHistory.html (HMAC SHA256)
     * */
    public function getWithdrawHistory(array $data){
        $this->type='GET';
        $this->path='/wapi/v3/withdrawHistory.html';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *获取充值地址(USER_DATA)
    GET  /wapi/v3/depositAddress.html (HMAC SHA256)
     * */
    public function getDepositAddress(array $data){
        $this->type='GET';
        $this->path='/wapi/v3/depositAddress.html';
        $this->data=$data;
        return $this->exec();
    }
    
    
    /**
     *账户状态 (USER_DATA)
    GET /wapi/v3/accountStatus.html
     * */
    public function getAccountStatus(array $data){
        $this->signature=false;
        $this->type='GET';
        $this->path='/wapi/v3/accountStatus.html';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *小额资产转换历史 (USER_DATA)
    GET /wapi/v3/userAssetDribbletLog.html   (HMAC SHA256)
     * */
    public function getAssetDribbletLog(array $data){
        $this->type='GET';
        $this->path='/wapi/v3/userAssetDribbletLog.html';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *交易手续费率查询 (USER_DATA)
    GET  /wapi/v3/tradeFee.html (HMAC SHA256)
     * */
    public function getTradeFee(array $data){
        $this->type='GET';
        $this->path='/wapi/v3/tradeFee.html';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *上架资产详情 (USER_DATA)
    GET  /wapi/v3/assetDetail.html (HMAC SHA256)
     * */
    public function getAssetDetail(array $data){
        $this->type='GET';
        $this->path='/wapi/v3/assetDetail.html';
        $this->data=$data;
        return $this->exec();
    }
}