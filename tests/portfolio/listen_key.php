<?php


/**
 * @author lin <465382251@qq.com>
 *
 * Fill in your key and secret and pass can be directly run
 *
 * Most of them are unfinished and need your help
 * https://github.com/zhouaini528/huobi-php.git
 * */
use Lin\Binance\Binance;

require __DIR__ .'../../../vendor/autoload.php';

include 'key_secret.php';

$binance=new \Lin\Binance\BinancePortfolio($key,$secret);

$binance->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,

    //https://github.com/guzzle/guzzle
    'proxy'=>[],

    //https://www.php.net/manual/en/book.curl.php
    'curl'=>[],

    //default is v1
    //'version'=>'v3',
]);

try {
    $result=$binance->websocket()->postListenKey();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}



