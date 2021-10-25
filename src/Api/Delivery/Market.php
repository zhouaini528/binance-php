<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api\Delivery;

use Lin\Binance\Request;

class Market extends Request
{
    //Default Dont required HMAC SHA256
    protected $signature=false;

    //Default seting
    protected $version='v1';

    /**
     *GET /dapi/v1/ping
     * */
    public function getPing(array $data=[]){
        $this->type='GET';
        $this->path='/dapi/'.$this->version.'/ping';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /dapi/v1/time
     * */
    public function getTime(array $data=[]){
        $this->type='GET';
        $this->path='/dapi/'.$this->version.'/time';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /dapi/v1/exchangeInfo
     * */
    public function getExchangeInfo(array $data=[]){
        $this->type='GET';
        $this->path='/dapi/'.$this->version.'/exchangeInfo';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /dapi/v1/depth
     * */
    public function getDepth(array $data=[]){
        $this->type='GET';
        $this->path='/dapi/'.$this->version.'/depth';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /dapi/v1/trades
     * */
    public function getTrades(array $data=[]){
        $this->type='GET';
        $this->path='/dapi/'.$this->version.'/trades';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /dapi/v1/historicalTrades
     * */
    public function getHistoricalTrades(array $data=[]){
        $this->type='GET';
        $this->path='/dapi/'.$this->version.'/historicalTrades';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /dapi/v1/aggTrades
     * */
    public function getAggTrades(array $data=[]){
        $this->type='GET';
        $this->path='/dapi/'.$this->version.'/aggTrades';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /dapi/v1/premiumIndex
     * */
    public function getPremiumIndex(array $data=[]){
        $this->type='GET';
        $this->path='/dapi/'.$this->version.'/premiumIndex';
        $this->data=$data;
        return $this->exec();
    }

    /**
     * GET /dapi/v1/fundingRate
     * */
    public function getFundingRate(array $data=[]){
        $this->type='GET';
        $this->path='/dapi/'.$this->version.'/fundingRate';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /dapi/v1/klines
     * */
    public function getKlines(array $data=[]){
        $this->type='GET';
        $this->path='/dapi/'.$this->version.'/klines';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /dapi/v1/continuousKlines
     * */
    public function getContinuousKlines(array $data=[]){
        $this->type='GET';
        $this->path='/dapi/'.$this->version.'/continuousKlines';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /dapi/v1/indexPriceKlines
     * */
    public function getIndexPriceKlines(array $data=[]){
        $this->type='GET';
        $this->path='/dapi/'.$this->version.'/indexPriceKlines';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /dapi/v1/markPriceKlines
     * */
    public function getMarkPriceKlines(array $data=[]){
        $this->type='GET';
        $this->path='/dapi/'.$this->version.'/markPriceKlines';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /dapi/v1/ticker/24hr
     * */
    public function get24hr(array $data=[]){
        $this->type='GET';
        $this->path='/dapi/'.$this->version.'/ticker/24hr';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /dapi/v1/ticker/price
     * */
    public function getTickerPrice(array $data=[]){
        $this->type='GET';
        $this->path='/dapi/'.$this->version.'/ticker/price';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /dapi/v1/ticker/bookTicker
     * */
    public function getTickerBookTicker(array $data=[]){
        $this->type='GET';
        $this->path='/dapi/'.$this->version.'/ticker/bookTicker';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /dapi/v1/allForceOrders
     * */
    public function getAllForceOrders(array $data=[]){
        $this->type='GET';
        $this->path='/dapi/'.$this->version.'/allForceOrders';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /dapi/v1/openInterest
     * */
    public function getOpenInterest(array $data=[]){
        $this->type='GET';
        $this->path='/dapi/'.$this->version.'/openInterest';
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
     *GET /futures/data/takerBuySellVol
     * */
    public function getTakerBuySellVol(array $data=[]){
        $this->type='GET';
        $this->path='/futures/data/takerBuySellVol';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /futures/data/basis
     * */
    public function getBasis(array $data=[]){
        $this->type='GET';
        $this->path='/futures/data/basis';
        $this->data=$data;
        return $this->exec();
    }
}
