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

require __DIR__ .'../../vendor/autoload.php';

include 'key_secret.php';

$binance=new Binance($key,$secret);

//Set the request timeout to 60 seconds by default
//$binance->setTimeOut(10);

//Get all account orders; active, canceled, or filled.
try {
    $result=$binance->user()->getAllOrders([
        'symbol'=>'BTCUSDT',
        'limit'=>'20',
        //'orderId'=>'',
        //'startTime'=>'',
        //'endTime'=>'',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
die();
//Get current account information.
try {
    $result=$binance->user()->getAccount();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}



