<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api\Spot;

use Lin\Binance\Request;

class Trade extends Request
{
    //Default required HMAC SHA256
    protected $signature=true;

    //Default seting
    protected $version='v3';

    /**
     * 下单 (TRADE)
    POST /api/v3/order  (HMAC SHA256)

    Name	Type	Mandatory	Description
    symbol	STRING	YES
    side	ENUM	YES
    type	ENUM	YES
    timeInForce	ENUM	NO
    quantity	DECIMAL	YES
    price	DECIMAL	NO
    newClientOrderId	STRING	NO	用户自定义的orderid，如空缺系统会自动赋值
    stopPrice	DECIMAL	NO	仅 STOP_LOSS, STOP_LOSS_LIMIT, TAKE_PROFIT, TAKE_PROFIT_LIMIT 需要此参数
    icebergQty	DECIMAL	NO	仅有限价单(包括条件限价单与限价做事单)可以使用该参数，含义为创建冰山订单并指定冰山订单的尺寸
    newOrderRespType	ENUM	NO	指定响应类型 ACK, RESULT, or FULL; MARKET 与 LIMIT 订单默认为FULL, 其他默认为ACK.
    recvWindow	LONG	NO
    timestamp	LONG	YES


    根据 order type的不同，某些参数强制要求，具体如下:
    Type	强制要求的参数
    LIMIT	timeInForce, quantity, price
    MARKET	quantity
    STOP_LOSS	quantity, stopPrice
    STOP_LOSS_LIMIT	timeInForce, quantity, price, stopPrice
    TAKE_PROFIT	quantity, stopPrice
    TAKE_PROFIT_LIMIT	timeInForce, quantity, price, stopPrice
    LIMIT_MAKER	quantity, price

     * */
    public function postOrder(array $data){
        $this->type='POST';
        $this->path='/api/'.$this->version.'/order';

        $data['timestamp']=time().'000';
        $data['newOrderRespType']=$data['newOrderRespType'] ?? 'ACK';

        switch (strtoupper($data['type'])){
            case 'LIMIT':{
                $data['timeInForce']=$data['timeInForce'] ?? 'GTC';
                break;
            }
        }

        $this->data=$data;
        return $this->exec();
    }

    /**
     * 测试下单接口 (TRADE)
    POST /api/v3/order/test (HMAC SHA256)
     * */
    public function postOrderTest(array $data){
        $this->type='POST';
        $this->path='/api/'.$this->version.'/order/test';
        $data['timestamp']=time().'000';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *撤销订单 (TRADE)
    DELETE /api/v3/order  (HMAC SHA256)

    symbol	STRING	YES
    orderId	LONG	NO
    origClientOrderId	STRING	NO
    newClientOrderId	STRING	NO	用户自定义的本次撤销操作的ID(注意不是被撤销的订单的自定义ID)。如无指定会自动赋值。
    recvWindow	LONG	NO
    timestamp	LONG	YES
     * */
    public function deleteOrder(array $data){
        $this->type='DELETE';
        $this->path='/api/'.$this->version.'/order';

        $data['timestamp']=time().'000';

        $this->data=$data;
        return $this->exec();
    }

    /**
     *撤销订单 (TRADE)
    DELETE /api/v3/openOrders  (HMAC SHA256)

    symbol	STRING	YES
    recvWindow	LONG	NO
    timestamp	LONG	YES
     * */
    public function deleteAllOrders(array $data){
        $this->type='DELETE';
        $this->path='/api/'.$this->version.'/openOrders';

        $data['timestamp']=time().'000';

        $this->data=$data;
        return $this->exec();
    }

    /**
     * New OCO (TRADE)
    POST /api/v3/order/oco (HMAC SHA256)
     * */
    public function postOrderOco(array $data=[]){
        $this->type='POST';
        $this->path='/api/'.$this->version.'/order/oco';

        $data['timestamp']=time().'000';

        $this->data=$data;
        return $this->exec();
    }

    /**
     * Cancel OCO (TRADE)
    DELETE /api/v3/orderList (HMAC SHA256) Cancel an entire Order List.
     * */
    public function deleteOrderList(array $data=[]){
        $this->type='DELETE';
        $this->path='/api/'.$this->version.'/orderList';

        $data['timestamp']=time().'000';

        $this->data=$data;
        return $this->exec();
    }


}
