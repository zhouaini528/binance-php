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
     *GET /fapi/v1/ping
     * */
    public function getPing(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/ping';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/time
     * */
    public function getTime(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/time';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/exchangeInfo
     * */
    public function getExchangeInfo(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/exchangeInfo';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/depth
     * */
    public function getDepth(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/depth';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/trades
     * */
    public function getTrades(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/trades';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/historicalTrades
     * */
    public function getHistoricalTrades(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/historicalTrades';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/aggTrades
     * */
    public function getAggTrades(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/aggTrades';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/premiumIndex
     * */
    public function getPremiumIndex(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/premiumIndex';
        $this->data=$data;
        return $this->exec();
    }

    /**
     * GET /fapi/v1/fundingRate
     * */
    public function getFundingRate(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/fundingRate';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/klines
     * */
    public function getKlines(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/klines';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/continuousKlines
     * */
    public function getContinuousKlines(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/continuousKlines';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/indexPriceKlines
     * */
    public function getIndexPriceKlines(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/indexPriceKlines';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/markPriceKlines
     * */
    public function getMarkPriceKlines(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/markPriceKlines';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/ticker/24hr
     * */
    public function get24hr(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/ticker/24hr';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/ticker/price
     * */
    public function getTickerPrice(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/ticker/price';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/ticker/bookTicker
     * */
    public function getTickerBookTicker(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/ticker/bookTicker';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/openInterest
     * */
    public function getOpenInterest(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/openInterest';
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
     *GET /fapi/v1/lvtKlines
     * */
    public function getLvtKlines(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/lvtKlines';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /fapi/v1/indexInfo
     * */
    public function getIndexInfo(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/indexInfo';
        $this->data=$data;
        return $this->exec();
    }
}