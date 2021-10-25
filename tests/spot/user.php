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

//Get all account orders; active, canceled, or filled.
/*try {
    $result=$binance->user()->getAllOrders([
        'symbol'=>'BCHABCUSDT',
        'limit'=>'20',
        //'orderId'=>'',
        //'startTime'=>'',
        //'endTime'=>'',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}*/


//Get current account information.
try {
    $result=$binance->user()->getAccount();
    echo json_encode($result);
    //print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//Query OCO (USER_DATA)
//GET /api/v3/orderList (HMAC SHA256)
try {
    $result=$binance->user()->getOrderList([
        'orderListId'=>'xxxxxx'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//Query all OCO (USER_DATA)
//GET /api/v3/allOrderList (HMAC SHA256)
try {
    $result=$binance->user()->getAllOrderList();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//Query Open OCO (USER_DATA)
//GET /api/v3/openOrderList (HMAC SHA256)
try {
    $result=$binance->user()->getOpenOrderList();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}





