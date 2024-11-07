<?php


/**
 * @author lin <465382251@qq.com>
 *
 * Fill in your key and secret and pass can be directly run
 *
 * Most of them are unfinished and need your help
 * https://github.com/zhouaini528/huobi-php.git
 * */

use Lin\Binance\BinancePortfolio;

require __DIR__ .'../../../vendor/autoload.php';

include 'key_secret.php';

$binance=new BinancePortfolio($key,$secret);

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


$client_id=md5(date('Y-m-d H:i:s',time()).rand(1,99999));

//Send in a new order.
try {
    //$result=$binance->trade()->um()->postOrder();
    $result=$binance->um()->postOrder([
        'symbol'=>'BTCUSDT',
        'side'=>'BUY',
        'positionSide'=>'LONG',
        'type'=>'LIMIT',
        'quantity'=>'0.003',
        'price'=>'50000',
        'timeInForce'=>'GTC',
        'newClientOrderId'=>$client_id,
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//Check an order's status.
try {
    $result=$binance->um()->getOrder([
        'symbol'=>'BTCUSDT',
        //'orderId'=>'xxxxxxx',
        'origClientOrderId'=>$client_id,
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}


//Cancel an active order.
try {
    $result=$binance->um()->deleteOrder([
        'symbol'=>'BTCUSDT',
        //'orderId'=>'xxxxxxxx',
        'origClientOrderId'=>$client_id,
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}










