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
     *GET /papi/v1/um/positionRisk
     * */
    public function getPositionRisk(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/positionRisk';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *POST /papi/v1/um/leverage
     * */
    public function postLeverage(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/papi/' . $version . '/um/leverage';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *POST /papi/v1/um/positionSide/dual
     * */
    public function postPositionSideDual(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/papi/' . $version . '/um/positionSide/dual';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/positionSide/dual
     * */
    public function getPositionSideDual(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/positionSide/dual';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/leverageBracket
     * */
    public function getLeverageBracket(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/leverageBracket';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/apiTradingStatus
     * */
    public function getApiTradingStatus(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/apiTradingStatus';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/commissionRate
     * */
    public function getCommissionRate(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/commissionRate';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/income
     * */
    public function getIncome(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/income';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/account
     * */
    public function getAccount(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/account';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/accountConfig
     * */
    public function getAccountConfig(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/accountConfig';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/symbolConfig
     * */
    public function getSymbolConfig(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/symbolConfig';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v2/um/account
     * */
    public function getAccountV2(array $data = [], string $version = Version::V2)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/account';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET papi/v1/um/trade/asyn
     * */
    public function getTradeAsyn(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/trade/asyn';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/trade/asyn/id
     * */
    public function getTradeAsynId(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/trade/asyn/id';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET papi/v1/um/order/asyn
     * */
    public function getOrderAsyn(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/order/asyn';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/order/asyn/id
     * */
    public function getOrderAsynId(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/order/asyn/id';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET papi/v1/um/income/asyn
     * */
    public function getIncomeAsyn(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/income/asyn';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/um/income/asyn/id
     * */
    public function getIncomeAsynId(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/um/income/asyn/id';

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
     *GET /papi/v1/cm/positionRisk
     * */
    public function getPositionRisk(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/cm/positionRisk';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *POST /papi/v1/cm/leverage
     * */
    public function postLeverage(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/papi/' . $version . '/cm/leverage';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *POST /papi/v1/cm/positionSide/dual
     * */
    public function postPositionSideDual(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/papi/' . $version . '/cm/positionSide/dual';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/cm/positionSide/dual
     * */
    public function getPositionSideDual(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/cm/positionSide/dual';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/cm/leverageBracket
     * */
    public function getLeverageBracket(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/cm/leverageBracket';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/cm/commissionRate
     * */
    public function getCommissionRate(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/cm/commissionRate';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/cm/income
     * */
    public function getIncome(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/cm/income';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/cm/account
     * */
    public function getAccount(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/cm/account';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *
     * */
    public function get(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/cm/';

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
     *GET /papi/v1/margin/maxBorrowable
     * */
    public function getMaxBorrowable(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/margin/maxBorrowable';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/margin/maxWithdraw
     * */
    public function getMaxWithdraw(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/margin/maxWithdraw';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/margin/marginLoan
     * */
    public function getMarginLoan(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/margin/marginLoan';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/margin/repayLoan
     * */
    public function getRepayLoan(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/margin/repayLoan';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/margin/marginInterestHistory
     * */
    public function getMarginInterestHistory(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/margin/marginInterestHistory';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }
}

class Account extends Request
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

    public function um(){
        return new Um($this->init());
    }

    public function cm(){
        return new Cm($this->init());
    }

    public function margin(){
        return new Margin($this->init());
    }

    /**
     *GET /papi/v1/balance
     * */
    public function getBalance(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/balance';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/account
     * */
    public function getAccount(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/account';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/repay-futures-switch
     * */
    public function getRepayFuturesSwitch(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/repay-futures-switch';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *POST /papi/v1/repay-futures-switch
     * */
    public function postRepayFuturesSwitch(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/papi/' . $version . '/repay-futures-switch';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *POST /papi/v1/repay-futures-negative-balance
     * */
    public function postRepayFuturesNegativeBalance(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/papi/' . $version . '/repay-futures-negative-balance';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *GET /papi/v1/portfolio/interest-history
     * */
    public function getPortfolioInterestHistory(array $data = [], string $version = Version::V1)
    {
        $this->type = 'GET';
        $this->path = '/papi/' . $version . '/portfolio/interest-history';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *POST /papi/v1/auto-collection
     * */
    public function postAutoCollection(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/papi/' . $version . '/auto-collection';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *POST /papi/v1/asset-collection
     * */
    public function postAssetCollection(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/papi/' . $version . '/asset-collection';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }

    /**
     *POST /papi/v1/bnb-transfer
     * */
    public function postBnbTransfer(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/papi/' . $version . '/bnb-transfer';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }
}