<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api\Futures;

use Lin\Binance\Request;

class Market extends Request
{
    //Default Dont required HMAC SHA256
    protected $signature=false;

    /**
     *GET /fapi/v2/ping
     * */
    public function getPing(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v2/ping';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v2/time
     * */
    public function getTime(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v2/time';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v2/exchangeInfo
     * */
    public function getExchangeInfo(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v2/exchangeInfo';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v2/depth
     * */
    public function getDepth(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v2/depth';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v2/trades
     * */
    public function getTrades(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v2/trades';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v2/historicalTrades
     * */
    public function getHistoricalTrades(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v2/historicalTrades';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v2/aggTrades
     * */
    public function getAggTrades(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v2/aggTrades';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v2/premiumIndex
     * */
    public function getPremiumIndex(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v2/premiumIndex';
        $this->data=$data;
        return $this->exec();
    }

    /**
     * GET /fapi/v2/fundingRate
     * */
    public function getFundingRate(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v2/fundingRate';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v2/klines
     * */
    public function getKlines(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v2/klines';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v2/continuousKlines
     * */
    public function getContinuousKlines(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v2/continuousKlines';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v2/indexPriceKlines
     * */
    public function getIndexPriceKlines(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v2/indexPriceKlines';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v2/markPriceKlines
     * */
    public function getMarkPriceKlines(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v2/markPriceKlines';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v2/ticker/24hr
     * */
    public function get24hr(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v2/ticker/24hr';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v2/ticker/price
     * */
    public function getTickerPrice(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v2/ticker/price';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v2/ticker/bookTicker
     * */
    public function getTickerBookTicker(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v2/ticker/bookTicker';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v2/allForceOrders
     * */
    public function get(array $data=[]){
        $this->type='GET';
        $this->path='';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v2/openInterest
     * */
    public function getOpenInterest(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v2/openInterest';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /futures/data/openInterestHist
     * */
    public function getOpenInterestHist(array $data=[]){
        $this->type='GET';
        $this->path='/futures/data/openInterestHist';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /futures/data/topLongShortAccountRatio
     * */
    public function getTopLongShortAccountRatio(array $data=[]){
        $this->type='GET';
        $this->path='/futures/data/topLongShortAccountRatio';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /futures/data/topLongShortPositionRatio
     * */
    public function getTopLongShortPositionRatio(array $data=[]){
        $this->type='GET';
        $this->path='/futures/data/topLongShortPositionRatio';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /futures/data/globalLongShortAccountRatio
     * */
    public function getGlobalLongShortAccountRatio(array $data=[]){
        $this->type='GET';
        $this->path='/futures/data/globalLongShortAccountRatio';
        $this->data=$data;
        return $this->exec();
    }

    /**
     * GET /futures/data/takerlongshortRatio
     * */
    public function getTakerlongshortRatio(array $data=[]){
        $this->type='GET';
        $this->path='/futures/data/takerlongshortRatio';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v2/lvtKlines
     * */
    public function getLvtKlines(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v2/lvtKlines';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v2/indexInfo
     * */
    public function getIndexInfo(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v2/indexInfo';
        $this->data=$data;
        return $this->exec();
    }
}