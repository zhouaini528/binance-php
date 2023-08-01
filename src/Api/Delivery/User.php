<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api\Delivery;

use Lin\Binance\Api\Version;
use Lin\Binance\Request;

class User extends Request
{
    //Default required HMAC SHA256
    protected $signature = true;

    //Default setting
//    protected $version = 'v1';

    function __construct(array $data)
    {
        parent::__construct($data);

        $this->data['timestamp'] = time() . '000';
    }

    /**
     *POST /dapi/v1/positionSide/dual (HMAC SHA256)  USER_DATA
     * */
    public function postPositionSideDual(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/dapi/' . $version . '/positionSide/dual';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /**
     *GET /dapi/v1/order (HMAC SHA256) USER_DATA
     * */
    public function getOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/dapi/' . $version . '/order';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /**
     *GET /dapi/v1/openOrder (HMAC SHA256) USER_DATA
     * */
    public function getOpenOrder(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/dapi/' . $version . '/openOrder';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /**
     *GET /dapi/v1/openOrders (HMAC SHA256) USER_DATA
     * */
    public function getOpenOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/dapi/' . $version . '/openOrders';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /**
     *GET /dapi/v1/allOrders (HMAC SHA256) USER_DATA
     * */
    public function getAllOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/dapi/' . $version . '/allOrders';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /**
     *GET /dapi/v1/balance (HMAC SHA256) USER_DATA
     * */
    public function getBalance(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/dapi/' . $version . '/balance';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /**
     *GET /dapi/v1/account (HMAC SHA256) USER_DATA
     * */
    public function getAccount(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/dapi/' . $version . '/account';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /**
     *GET /dapi/v1/userTrades (HMAC SHA256) USER_DATA
     * */
    public function getUserTrades(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/dapi/' . $version . '/userTrades';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /**
     *GET /dapi/v1/income (HMAC SHA256) USER_DATA
     * */
    public function getIncome(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/dapi/' . $version . '/income';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /**
     *GET /dapi/v1/leverageBracket  USER_DATA
     * */
    public function getLeverageBracket(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/dapi/' . $version . '/leverageBracket';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /**
     *GET /dapi/v1/forceOrders  USER_DATA
     * */
    public function getForceOrders(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/dapi/' . $version . '/forceOrders';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    /**
     *GET /dapi/v1/adlQuantile USER_DATA
     * */
    public function getAdlQuantile(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/dapi/' . $version . '/adlQuantile';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }


    /**
     * POST /dapi/v1/listenKey
     */
    public function postListenKey(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/dapi/' . $version . '/listenKey';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *PUT /dapi/v1/listenKey
     */
    public function putListenKey(array $data = [], string $version = Version::V1)
    {
        $this->type = 'PUT';
        $this->path = '/dapi/' . $version . '/listenKey';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *DELETE /dapi/v1/listenKey
     */
    public function deleteListenKey(array $data = [], string $version = Version::V1)
    {
        $this->type = 'DELETE';
        $this->path = '/dapi/' . $version . '/listenKey';
        $this->data = $data;
        return $this->exec();
    }
}
