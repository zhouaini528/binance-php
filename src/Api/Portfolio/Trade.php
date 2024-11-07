<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api\Portfolio;

use Lin\Binance\Api\Version;
use Lin\Binance\Request;

class Um extends Request
{
    //Default required HMAC SHA256
    protected $signature = true;

    //Default seting
    //protected $version='v1';

    /**
     * POST /papi/v1/um/order
     * */
    public function postOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/papi/' . $version . '/um/order';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *POST /papi/v1/um/conditional/order
     * */
    public function postConditionalOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/conditional/order';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *DELETE /papi/v1/um/order
     * */
    public function deleteOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'DELETE';
        $this->path = '/papi/' . $version . '/um/order';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *DELETE /papi/v1/um/allOpenOrders
     * */
    public function deleteallOpenOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'DELETE';
        $this->path = '/papi/' . $version . '/um/allOpenOrders';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *DELETE /papi/v1/um/conditional/order
     * */
    public function deleteConditionalOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'DELETE';
        $this->path = '/papi/' . $version . '/um/conditional/order';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *DELETE /papi/v1/um/conditional/allOpenOrders
     * */
    public function deleteConditionalAllOpenOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'DELETE';
        $this->path = '/papi/' . $version . '/um/conditional/allOpenOrders';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *PUT /papi/v1/um/order
     * */
    public function putOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'PUT';
        $this->path = '/papi/' . $version . '/um/order';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/order
     * */
    public function getOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/order';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/allOrders
     * */
    public function getAllOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/allOrders';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/openOrder
     * */
    public function getOpenOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/openOrder';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/openOrders
     * */
    public function getOpenOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/openOrders';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/conditional/allOrders
     * */
    public function getConditionalAllOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/conditional/allOrders';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/conditional/openOrders
     * */
    public function getConditionalOpenOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/conditional/openOrders';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/conditional/openOrder
     * */
    public function getConditionalOpenOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/conditional/openOrder';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/conditional/orderHistory
     * */
    public function getConditionalOrderHistory(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/Conditional/orderHistory';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/forceOrders
     * */
    public function getForceOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/forceOrders';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/orderAmendment
     * */
    public function getOrderAmendment(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/orderAmendment';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/userTrades
     * */
    public function getUserTrades(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/userTrades';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/adlQuantile
     * */
    public function getAdlQuantile(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/adlQuantile';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *POST /papi/v1/um/feeBurn
     * */
    public function postFeeBurn(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/feeBurn';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/feeBurn
     * */
    public function getFeeBurn(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/feeBurn';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }
}


class Cm extends Request
{
    //Default required HMAC SHA256
    protected $signature = true;

    //Default seting
    //protected $version='v1';

    /**
     *POST /papi/v1/cm/order
     * */
    public function postOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/papi/' . $version . '/cm/order';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *POST /papi/v1/cm/conditional/order
     * */
    public function postConditionalOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/papi/' . $version . '/cm/conditional/order';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *DELETE /papi/v1/cm/order
     * */
    public function deleteOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'DELETE';
        $this->path = '/papi/' . $version . '/cm/order';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *DELETE /papi/v1/cm/allOpenOrders
     * */
    public function deleteAllOpenOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'DELETE';
        $this->path = '/papi/' . $version . '/cm/allOpenOrders';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *DELETE /papi/v1/cm/conditional/order
     * */
    public function deleteConditionalOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'DELETE';
        $this->path = '/papi/' . $version . '/cm/conditional/order';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *DELETE /papi/v1/cm/conditional/allOpenOrders
     * */
    public function deleteConditionalAllOpenOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'DELETE';
        $this->path = '/papi/' . $version . '/cm/conditional/allOpenOrders';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *PUT /papi/v1/cm/order
     * */
    public function putOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'PUT';
        $this->path = '/papi/' . $version . '/cm/order';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/cm/order
     * */
    public function getOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/cm/order';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/cm/allOrders
     * */
    public function getAllOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/cm/allOrders';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/cm/openOrders
     * */
    public function getOpenOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/cm/openOrders';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/cm/conditional/openOrders
     * */
    public function getConditionalOpenOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/cm/conditional/openOrders';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/cm/conditional/openOrder
     * */
    public function getConditionalOpenOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/cm/conditional/openOrder';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/cm/conditional/allOrders
     * */
    public function getConditionalAllOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/cm/conditional/allOrders';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/cm/conditional/orderHistory
     * */
    public function getConditionalOrderHistory(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/cm/conditional/orderHistory';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/cm/forceOrders
     * */
    public function getForceOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/cm/forceOrders';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/cm/orderAmendment
     * */
    public function getOrderAmendment(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/cm/orderAmendment';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/cm/userTrades
     * */
    public function getUserTrades(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/cm/userTrades';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/cm/adlQuantile
     * */
    public function getAdlQuantile(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/cm/adlQuantile';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }
}

class Margin extends Request
{
    //Default required HMAC SHA256
    protected $signature = true;

    //Default seting
    //protected $version='v1';

    /**
     *GET /papi/v1/margin/forceOrders
     * */
    public function getForceOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/margin/forceOrders';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *DELETE /papi/v1/margin/order
     * */
    public function deleteOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'DELETE';
        $this->path = '/papi/' . $version . '/margin/order';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *DELETE /papi/v1/margin/orderList
     * */
    public function deleteOrderList(array $data = [], string $version = Version::V1)
    {
        $this->type = 'DELETE';
        $this->path = '/papi/' . $version . '/margin/orderList';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *DELETE /papi/v1/margin/allOpenOrders
     * */
    public function deleteAllOpenOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'DELETE';
        $this->path = '/papi/' . $version . '/margin/allOpenOrders';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *POST /papi/v1/margin/order
     * */
    public function postOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/papi/' . $version . '/margin/order';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *POST /papi/v1/marginLoan
     * */
    public function postMarginLoan(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/papi/' . $version . '/margin/marginLoan';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *POST /papi/v1/margin/order/oco
     * */
    public function postOrderOco(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/papi/' . $version . '/margin/order/oco';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/margin/order
     * */
    public function getOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/margin/order';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/margin/openOrders
     * */
    public function getOpenOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/margin/openOrders';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/margin/allOrders
     * */
    public function getAllOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/margin/allOrders';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/margin/orderList
     * */
    public function getOrderList(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/margin/orderList';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/margin/allOrderList
     * */
    public function get(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/margin/AllOrderList';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/margin/openOrderList
     * */
    public function getOpenOrderList(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/margin/openOrderList';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/margin/myTrades
     * */
    public function getMyTrades(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/margin/myTrades';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *POST /papi/v1/margin/repay-debt
     * */
    public function getRepayDebt(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/margin/repay-debt';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }
}

class Trade extends Request
{
    //Default required HMAC SHA256
    protected $signature = true;

    //Default seting
    //protected $version='v1';

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
     *POST /papi/v1/repapostyLoan
     * */
    public function postRepapostyLoan(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/papi/' . $version . '/repayLoan';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    public function um(){
        return new Um($this->init());
    }

    public function cm(){
        return new Cm($this->init());
    }

    public function margin(){
        return new Margin($this->init());
    }
}