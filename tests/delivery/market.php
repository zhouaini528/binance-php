<?php


/**
 * @author lin <465382251@qq.com>
 *
 * Fill in your key and secret and pass can be directly run
 *
 * Most of them are unfinished and need your help
 * https://github.com/zhouaini528/huobi-php.git
 * */
use Lin\Binance\BinanceDelivery;

require __DIR__ .'../../../vendor/autoload.php';

include 'key_secret.php';

$binance=new BinanceDelivery();

$binance->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,

    //https://github.com/guzzle/guzzle
    'proxy'=>[],

    //https://www.php.net/manual/en/book.curl.php
    'curl'=>[],

    //default is v1
    //'version'=>'v1',
]);

try {
    $result=$binance->market()->getPing();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getTime();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getExchangeInfo();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getDepth([
        'symbol'=>'BTCUSD_200925',
        'limit'=>5
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getTrades([
        'symbol'=>'BTCUSD_200925',
        'limit'=>5
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getHistoricalTrades([
        'symbol'=>'BTCUSD_200925'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getAggTrades([
        'symbol'=>'BTCUSD_200925',
        'limit'=>5
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getPremiumIndex([
        //'symbol'=>'BTCUSD_200925',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getFundingRate([
        'symbol'=>'BTCUSD_200925',
        'limit'=>5
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getKlines([
        'symbol'=>'BTCUSD_200925',
        'interval'=>'1m',
        'limit'=>5
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getContinuousKlines([
        'pair'=>'BTCUSD',
        'contractType'=>'CURRENT_QUARTER',
        'interval'=>'1m',
        'limit'=>5
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getTopLongShortAccountRatio([
        'pair'=>'BTCUSD',
        'period'=>'5m',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getOpenInterestHist([
        'pair'=>'BTCUSD',
        'contractType'=>'ALL',
        'period'=>'5m',
        'limit'=>5
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}





