<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api;

use Lin\Binance\Request;

class System extends Request
{
    /**
     * 测试服务器连通性 PING
    GET /api/v1/ping
     * */
    public function getPing(array $data){
        $this->type='GET';
        $this->path='/api/v1/ping';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *获取服务器时间
    GET /api/v1/time
     * */
    public function getTime(array $data){
        $this->type='GET';
        $this->path='/api/v1/time';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *交易规范信息
    GET /api/v1/exchangeInfo
     * */
    public function getExchangeInfo(array $data){
        $this->type='GET';
        $this->path='/api/v1/exchangeInfo';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *深度信息
    GET /api/v1/depth
     * */
    public function getDepth(array $data){
        $this->type='GET';
        $this->path='/api/v1/depth';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *近期成交
    GET /api/v1/trades
     * */
    public function getTrades(array $data){
        $this->type='GET';
        $this->path='/api/v1/trades';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *
     * */
    public function get(array $data){
        $this->type='GET';
        $this->path='';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *查询历史成交(MARKET_DATA)
    GET /api/v1/historicalTrades
     * */
    public function getHistoricalTrades(array $data){
        $this->type='GET';
        $this->path='/api/v1/historicalTrades';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *近期成交(归集)
    GET /api/v1/aggTrades
     * */
    public function getAggTrades(array $data){
        $this->type='GET';
        $this->path='/api/v1/aggTrades';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *K线数据
    GET /api/v1/klines
     * */
    public function getKlines(array $data){
        $this->type='GET';
        $this->path='/api/v1/klines';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *当前平均价格
    GET /api/v3/avgPrice
     * */
    public function getAvgPrice(array $data){
        $this->type='GET';
        $this->path='/api/v3/avgPrice';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *系统状态 (System)
    GET /wapi/v3/systemStatus.html
     * */
    public function getSystemStatus(array $data){
        $this->type='GET';
        $this->path='/wapi/v3/systemStatus.html';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *24hr价格变动情况
    GET /api/v1/ticker/24hr
     * */
    public function get24hr(array $data){
        $this->type='GET';
        $this->path='/api/v1/ticker/24hr';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     * 最新价格接口
    GET /api/v3/ticker/price
     * */
    public function getTickerPrice(array $data){
        $this->type='GET';
        $this->path='/api/v3/ticker/price';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *最优挂单接口
    GET /api/v3/ticker/bookTicker
     * */
    public function getTickerBookTicker(array $data){
        $this->type='GET';
        $this->path='/api/v3/ticker/bookTicker';
        $this->data=$data;
        return $this->exec();
    }
}