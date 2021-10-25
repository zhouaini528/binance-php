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

$binance=new Binance($key,$secret);

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

//Send in a new order.
try {
    $result=$binance->trade()->postOrder([
        'symbol'=>'LTCUSDT',
        'side'=>'SELL',
        'type'=>'LIMIT',
        'quantity'=>'0.1',
        'price'=>'500',
        'timeInForce'=>'GTC',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//Check an order's status.
try {
    $result=$binance->user()->getOrder([
        'symbol'=>'LTCUSDT',
        'orderId'=>'22222',
        'origClientOrderId'=>'22222',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//Cancel an active order.
try {
    $result=$binance->trade()->deleteOrder([
        'symbol'=>'LTCUSDT',
        'orderId'=>'111111',
        'origClientOrderId'=>'1111111',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//New OCO (TRADE)
try {
    $result=$binance->trade()->postOrderOco([
        'symbol'=>'LTCBTC',
        'side'=>'SELL',
        'type'=>'LIMIT',
        'quantity'=>'0.1',
        'price'=>'200',
        'stopPrice'=>'0.1',
        'timeInForce'=>'GTC',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//Cancel OCO (TRADE)
try {
    $result=$binance->trade()->deleteOrderList([
        'symbol'=>'LTCBTC',
        'orderListId'=>'xxxxxxx',
        'newClientOrderId'=>'xxxxxxx',
        //'listClientOrderId'=>'xxxxxxx',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//Cancel OCO (TRADE)
try {
    $result=$binance->trade()->deleteOrderList([
        'symbol'=>'LTCBTC',
        'orderListId'=>'xxxxxxx',
        'newClientOrderId'=>'xxxxxxx',
        //'listClientOrderId'=>'xxxxxxx',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}











