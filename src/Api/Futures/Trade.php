<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api\Futures;

use Lin\Binance\Api\Version;
use Lin\Binance\Request;

class Trade extends Request
{
    //Default required HMAC SHA256
    protected $signature = true;

    //Default seting
//    protected $version = 'v1';

    function __construct(array $data)
    {
        parent::__construct($data);

        $this->data['timestamp'] = time() . '000';
    }

    /*
     *GET /fapi/v1/positionSide/dual (HMAC SHA256)
     */
    public function getPositionSideDual(array $data = [], string $version = Version::V1)
    {
        $this->type = 'get';
        $this->path = '/fapi/' . $version . '/positionSide/dual';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /*
     * GET /fapi/v1/multiAssetsMargin (HMAC SHA256)
     */
    public function getMultiAssetsMargin(array $data = [], string $version = Version::V1)
    {
        $this->type = 'get';
        $this->path = '/fapi/' . $version . '/multiAssetsMargin';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /*
     *POST /fapi/v1/order (HMAC SHA256)
     */
    public function postOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/fapi/' . $version . '/order';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }
    /*
     *PUT /fapi/v1/order (HMAC SHA256)
     */
    public function putOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'PUT';
        $this->path = '/fapi/' . $version . '/order';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }
    /*
    *POST /fapi/v1/order/test (HMAC SHA256)
    */
    public function postTestOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/fapi/' . $version . '/order/test';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /*
     *POST /fapi/v1/batchOrders (HMAC SHA256)
     */
    public function postBatchOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/fapi/' . $version . '/batchOrders';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /*
     *DELETE /fapi/v1/order (HMAC SHA256)
     */
    public function deleteOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'DELETE';
        $this->path = '/fapi/' . $version . '/order';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /*
     *DELETE /fapi/v1/allOpenOrders (HMAC SHA256)
     */
    public function deleteAllOpenOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'DELETE';
        $this->path = '/fapi/' . $version . '/allOpenOrders';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /*
     *DELETE /fapi/v1/batchOrders (HMAC SHA256)
     */
    public function deleteBatchOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'DELETE';
        $this->path = '/fapi/' . $version . '/batchOrders';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /*
     *POST /fapi/v1/countdownCancelAll (HMAC SHA256)
     */
    public function postCountdownCancelAll(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/fapi/' . $version . '/countdownCancelAll';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /*
     *POST /fapi/v1/leverage (HMAC SHA256)
     */
    public function postLeverage(array $data = [], string $version = Version::V1)
    {
        $this->type = 'post';
        $this->path = '/fapi/' . $version . '/leverage';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /*
     *POST /fapi/v1/marginType (HMAC SHA256)
     */
    public function getMarginType(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/fapi/' . $version . '/marginType';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /*
     *POST /fapi/v1/positionMargin (HMAC SHA256)
     */
    public function postPositionMargin(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/fapi/' . $version . '/positionMargin';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /*
     *GET /fapi/v1/positionMargin/history (HMAC SHA256)
     */
    public function getPositionMarginHistory(array $data = [], string $version = Version::V1)
    {
        $this->type = 'get';
        $this->path = '/fapi/' . $version . '/positionMargin/history';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }
}
