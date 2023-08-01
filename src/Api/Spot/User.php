<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api\Spot;

use Lin\Binance\Api\Version;
use Lin\Binance\Request;

class User extends Request
{
    //Default required HMAC SHA256
    protected $signature = true;

    //Default seting
//    protected $version = 'v3';

    /**
     * 查看账户当前挂单 (USER_DATA)
     * GET /api/v3/openOrders  (HMAC SHA256)
     * */
    public function getOpenOrders(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/openOrders';
        $data['timestamp'] = time() . '000';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *查询所有订单（包括历史订单） (USER_DATA)
     * GET /api/v3/allOrders (HMAC SHA256)
     *
     * Name    Type    Mandatory    Description
     * symbol    STRING    YES
     * orderId    LONG    NO    只返回此orderID之后的订单，缺省返回最近的订单
     * startTime    LONG    NO
     * endTime    LONG    NO
     * limit    INT    NO    Default 500; max 1000.
     * recvWindow    LONG    NO
     * timestamp    LONG    YES
     * */
    public function getAllOrders(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/allOrders';

        $data['timestamp'] = time() . '000';
        $data['limit'] = $data['limit'] ?? 1000;

        $this->data = $data;
        return $this->exec();
    }

    /**
     *查询订单 (USER_DATA)
     * GET /api/v3/order (HMAC SHA256)
     *
     * Name    Type    Mandatory    Description
     * symbol    STRING    YES
     * orderId    LONG    NO
     * origClientOrderId    STRING    NO
     * recvWindow    LONG    NO
     * timestamp    LONG    YES
     * */
    public function getOrder(array $data, string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/order';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *账户信息 (USER_DATA)
     * GET /api/v3/account (HMAC SHA256)
     *
     * Name    Type    Mandatory    Description
     * recvWindow    LONG    NO
     * timestamp    LONG    YES
     * */
    public function getAccount(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/account';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }


    /**
     *账户成交历史 (USER_DATA)
     * GET /api/v3/myTrades  (HMAC SHA256)
     * */
    public function getMyTrades(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/myTrades';
        $data['timestamp'] = time() . '000';
        $this->data = $data;
        return $this->exec();
    }


    /**
     *充值历史 (USER_DATA)
     * GET /sapi/v1/capital/deposit/hisrec
     * */
    public function getCapitalDepositHisrec(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/sapi/' . $version . '/capital/deposit/hisrec';
        $data['timestamp'] = time() . '000';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *提现历史 (USER_DATA)
     * GET /sapi/v1/capital/withdraw/history
     * */
    public function getCapitalWithdrawHistory(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/sapi/' . $version . '/capital/withdraw/history';
        $data['timestamp'] = time() . '000';
        $this->data = $data;
        return $this->exec();
    }

    /**
     * 提币 (USER_DATA)
     * POST /sapi/v1/capital/withdraw/apply (HMAC SHA256)
     */
    public function postCapitalWithdraw(array $data = [], string $version = Version::V3)
    {
        $this->type = 'POST';
        $this->path = '/sapi/v1/capital/withdraw/apply';
        $data['timestamp'] = time() . '000';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *获取充值地址(USER_DATA)
     * GET /sapi/v1/capital/deposit/address
     * */
    public function getCapitalDepositAddress(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/sapi/' . $version . '/capital/deposit/address';
        $data['timestamp'] = time() . '000';
        $this->data = $data;
        return $this->exec();
    }


    /**
     *账户状态 (USER_DATA)
     * GET /sapi/v1/account/status
     * */
    public function getAccountStatus(array $data = [], string $version = Version::V3)
    {
        $this->signature = false;
        $this->type = 'GET';
        $this->path = '/sapi/' . $version . '/account/status';
        $data['timestamp'] = time() . '000';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *小额资产转换历史 (USER_DATA)
     * GET /sapi/v1/asset/dribblet
     * */
    public function getAssetDribblet(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/sapi/' . $version . '/asset/dribblet';
        $data['timestamp'] = time() . '000';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *交易手续费率查询 (USER_DATA)
     * GET /sapi/v1/asset/tradeFee
     * */
    public function getTradeFee(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/sapi/' . $version . '/asset/tradeFee';
        $data['timestamp'] = time() . '000';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *上架资产详情 (USER_DATA)
     * GET /sapi/v1/asset/assetDetail
     * */
    public function getAssetDetail(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/sapi/' . $version . '/asset/assetDetail';
        $data['timestamp'] = time() . '000';
        $this->data = $data;
        return $this->exec();
    }

    /**
     * POST /sapi/v1/asset/transfer (HMAC SHA256)
     * */
    public function getAssetTransfer(array $data = [], string $version = Version::V3)
    {
        $this->type = 'POST';
        $this->path = '/sapi/' . $version . '/asset/transfer';
        $data['timestamp'] = time() . '000';
        $this->data = $data;
        return $this->exec();
    }

    /**
     * POST /sapi/v1/asset/get-funding-asset (HMAC SHA256)
     * */
    public function postAssetGetFundingAsset(array $data = [], string $version = Version::V3)
    {
        $this->type = 'POST';
        $this->path = '/sapi/' . $version . '/asset/get-funding-asset';
        $data['timestamp'] = time() . '000';
        $this->data = $data;
        return $this->exec();
    }

    /**
     * GET /sapi/v1/account/apiRestrictions (HMAC SHA256)
     * */
    public function getAccountApiRestrictions(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/sapi/' . $version . '/account/apiRestrictions';
        $data['timestamp'] = time() . '000';
        $this->data = $data;
        return $this->exec();
    }



    //Websocket Account Pull

    /**
     * POST /api/v3/userDataStream
     */
    public function postUserDataStream(array $data = [], string $version = Version::V3)
    {
        $this->type = 'POST';
        $this->path = '/api/' . $version . '/userDataStream';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *PUT /api/v3/userDataStream
     */
    public function putUserDataStream(array $data = [], string $version = Version::V3)
    {
        $this->type = 'PUT';
        $this->path = '/api/' . $version . '/userDataStream';
        $this->data = $data;
        $this->signature = false;
        return $this->exec();
    }

    /**
     *DELETE /api/v3/userDataStream
     */
    public function deleteUserDataStream(array $data = [], string $version = Version::V3)
    {
        $this->type = 'DELETE';
        $this->path = '/api/' . $version . '/userDataStream';
        $this->data = $data;
        $this->signature = false;
        return $this->exec();
    }


    /**
     * POST /sapi/v1/userDataStream
     */
    public function postUserDataStreamSapi(array $data = [], string $version = Version::V3)
    {
        $this->type = 'POST';
        $this->path = '/api/' . $version . '/userDataStream';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *PUT /sapi/v1/userDataStream
     */
    public function putUserDataStreamSapi(array $data = [], string $version = Version::V3)
    {
        $this->type = 'PUT';
        $this->path = '/api/' . $version . '/userDataStream';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *DELETE /sapi/v1/userDataStream
     */
    public function deleteUserDataStreamSapi(array $data = [], string $version = Version::V3)
    {
        $this->type = 'DELETE';
        $this->path = '/api/' . $version . '/userDataStream';
        $this->data = $data;
        return $this->exec();
    }


    /**
     * POST /sapi/v1/userDataStream/isolated
     */
    public function postUserDataStreamIsolated(array $data = [], string $version = Version::V3)
    {
        $this->type = 'POST';
        $this->path = '/api/' . $version . '/userDataStream/isolated';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *PUT /sapi/v1/userDataStream/isolated
     */
    public function putUserDataStreamIsolated(array $data = [], string $version = Version::V3)
    {
        $this->type = 'PUT';
        $this->path = '/api/' . $version . '/userDataStream/isolated';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *DELETE /sapi/v1/userDataStream/isolated
     */
    public function deleteUserDataStreamIsolated(array $data = [], string $version = Version::V3)
    {
        $this->type = 'DELETE';
        $this->path = '/api/' . $version . '/userDataStream/isolated';
        $this->data = $data;
        return $this->exec();
    }


    /**
     *Query OCO (USER_DATA)
     * GET /api/v3/orderList (HMAC SHA256)
     */
    public function getOrderList(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/orderList';
        $data['timestamp'] = time() . '000';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *Query all OCO (USER_DATA)
     * GET /api/v3/allOrderList (HMAC SHA256)
     */
    public function getAllOrderList(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/allOrderList';
        $data['timestamp'] = time() . '000';
        $this->data = $data;

        return $this->exec();
    }

    /**
     *Query Open OCO (USER_DATA)
     * GET /api/v3/openOrderList (HMAC SHA256)
     */
    public function getOpenOrderList(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/openOrderList';
        $data['timestamp'] = time() . '000';
        $this->data = $data;
        return $this->exec();
    }
}
