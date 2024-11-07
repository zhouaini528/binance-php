<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api\Portfolio;

use Lin\Binance\Api\Version;
use Lin\Binance\Request;

class Websocket extends Request
{
    //Default required HMAC SHA256
    protected $signature = true;

    //Default seting
    //protected $version='v1';

    /**
     *POST /papi/v1/listenKey
     * */
    public function postListenKey(array $data = [], string $version = Version::V1)
    {
        $this->type = 'POST';
        $this->path = '/papi/' . $version . '/listenKey';

        $data['timestamp'] = time() . '000';

        $this->data = $data;
        return $this->exec();
    }
}