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


/*
 * Additional mandatory parameters based on type:
    Type	Additional mandatory parameters
    LIMIT	timeInForce, quantity, price
    MARKET	quantity
    STOP_LOSS	quantity, stopPrice
    STOP_LOSS_LIMIT	timeInForce, quantity, price, stopPrice
    TAKE_PROFIT	quantity, stopPrice
    TAKE_PROFIT_LIMIT	timeInForce, quantity, price, stopPrice
    LIMIT_MAKER	quantity, price
 * */
try {
    $result=$binance->trade()->postOrder([
        'symbol'=>'BTCUSDT',
        'side'=>'BUY',
        'type'=>'LIMIT',
        'timeInForce'=>'GTC',
        'quantity'=>'0.01',
        'price'=>'2000'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}




