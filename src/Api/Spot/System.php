<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api\Spot;

use Lin\Binance\Api\Version;
use Lin\Binance\Request;

class System extends Request
{
    //Default Dont required HMAC SHA256
    protected $signature = false;

    //Default seting
//    protected $version = 'v3';

    /**
     * 测试服务器连通性 PING
     * GET /api/v3/ping
     * */
    public function getPing(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/ping';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *获取服务器时间
     * GET /api/v3/time
     * */
    public function getTime(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/time';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *交易规范信息
     * GET /api/v3/exchangeInfo
     * */
    public function getExchangeInfo(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/exchangeInfo';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *深度信息
     * GET /api/v3/depth
     *
     * symbol    STRING    YES
     * limit    INT    NO    默认 100; 最大 1000. 可选值:[5, 10, 20, 50, 100, 500, 1000]
     * */
    public function getDepth(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/depth';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *近期成交
     * GET /api/v3/trades
     *
     * symbol    STRING    YES
     * limit    INT    NO    Default 500; max 1000.
     * */
    public function getTrades(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/trades';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *查询历史成交(MARKET_DATA)
     * GET /api/v3/historicalTrades
     * */
    public function getHistoricalTrades(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/historicalTrades';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *近期成交(归集)
     * GET /api/v3/aggTrades
     *
     * symbol    STRING    YES
     * fromId    LONG    NO    从包含fromID的成交开始返回结果
     * startTime    LONG    NO    从该时刻之后的成交记录开始返回结果
     * endTime    LONG    NO    返回该时刻为止的成交记录
     * limit    INT    NO    默认 500; 最大 1000.
     * */
    public function getAggTrades(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/aggTrades';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *K线数据
     * GET /api/v3/klines
     * */
    public function getKlines(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/klines';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *当前平均价格
     * GET /api/v3/avgPrice
     * Name    Type    Mandatory    Description
     * symbol    STRING    YES
     * */
    public function getAvgPrice(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/avgPrice';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *系统状态 (System)
     * GET /sapi/v3/system/status
     * */
    public function getSystemStatus(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/system/status';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *24hr价格变动情况
     * GET /api/v3/ticker/24hr
     * */
    public function get24hr(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/ticker/24hr';
        $this->data = $data;
        return $this->exec();
    }

    /**
     * 最新价格接口
     * GET /api/v3/ticker/price
     * */
    public function getTickerPrice(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/ticker/price';
        $this->data = $data;
        return $this->exec();
    }

    /**
     *最优挂单接口
     * GET /api/v3/ticker/bookTicker
     * */
    public function getTickerBookTicker(array $data = [], string $version = Version::V3)
    {
        $this->type = 'GET';
        $this->path = '/api/' . $version . '/ticker/bookTicker';
        $this->data = $data;
        return $this->exec();
    }
}
