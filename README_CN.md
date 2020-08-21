### 建议您先阅读官方文档
币币交易文档地址 [https://github.com/binance-exchange/binance-official-api-docs](https://github.com/binance-exchange/binance-official-api-docs)

合约交易文档地址 [https://binance-docs.github.io/apidocs/futures/cn](https://binance-docs.github.io/apidocs/futures/cn)


大部分的接口已经完成，使用者可以根据我的设计方案继续扩展，欢迎与我一起迭代它。

[English Document](https://github.com/zhouaini528/binance-php/blob/master/README.md)

### 其他交易所API

[Exchanges](https://github.com/zhouaini528/exchanges-php) 它包含以下所有交易所，强烈推荐使用该SDK。

[Bitmex](https://github.com/zhouaini528/bitmex-php)

[Okex](https://github.com/zhouaini528/okex-php)

[Huobi](https://github.com/zhouaini528/huobi-php)

[Binance](https://github.com/zhouaini528/binance-php)

[Kucoin](https://github.com/zhouaini528/Kucoin-php)

[Mxc](https://github.com/zhouaini528/mxc-php)

[Coinbase](https://github.com/zhouaini528/coinbase-php)

[ZB](https://github.com/zhouaini528/zb-php)

[Bitfinex](https://github.com/zhouaini528/zb-php)

[Bittrex](https://github.com/zhouaini528/bittrex-php)

[Gate](https://github.com/zhouaini528/gate-php)

[Bigone](https://github.com/zhouaini528/bigone-php)   

#### 安装方式
```
composer require linwj/binance
```

本地开发支持代理 [More](https://github.com/zhouaini528/binance-php/blob/master/tests/proxy.php#L21)

```php
use Lin\Binance\Binance;
$binance=new Binance($key,$secret);

//You can set special needs
$binance->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,
    
    //If you are developing locally and need an agent, you can set this
    'proxy'=>true,
    //More flexible Settings
    'proxy'=>[
     'http'  => 'http://127.0.0.1:12333',
     'https' => 'http://127.0.0.1:12333',
     'no'    =>  ['.cn']
     ],

    //Close the certificate
    'verify'=>false,
]);
```


### 币币交易 API

系统数据相关 API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/spot/system.php)


```php
use Lin\Binance\Binance;
$binance=new Binance();

//Order book
try {
    $result=$binance->system()->getDepth([
        'symbol'=>'BTCUSDT',
        'limit'=>'20',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

//Recent trades list
try {
    $result=$binance->system()->getTrades([
        'symbol'=>'BTCUSDT',
        'limit'=>'20',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

//Current average price
try {
    $result=$binance->system()->getAvgPrice([
        'symbol'=>'BTCUSDT'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
```


交易相关 API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/spot/trade.php)

```php
use Lin\Binance\Binance;
$binance=new Binance($key,$secret);

//Send in a new order.
try {
    $result=$binance->trade()->postOrder([
        'symbol'=>'BTCUSDT',
        'side'=>'BUY',
        'type'=>'LIMIT',
        'quantity'=>'0.01',
        'price'=>'2000',
        'timeInForce'=>'GTC',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

//Check an order's status.
try {
    $result=$binance->user()->getOrder([
        'symbol'=>'BTCUSDT',
        'orderId'=>$result['orderId'],
        'origClientOrderId'=>$result['origClientOrderId'],
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

//Cancel an active order.
try {
    $result=$binance->trade()->deleteOrder([
        'symbol'=>'BTCUSDT',
        'orderId'=>$result['orderId'],
        'origClientOrderId'=>$result['origClientOrderId'],
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
```


用户相关 API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/spot/user.php)

```php
use Lin\Binance\Binance;
$binance=new Binance($key,$secret);

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
    print_r($e->getMessage());
}

//Get current account information.
try {
    $result=$binance->user()->getAccount();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
```


[更多用例](https://github.com/zhouaini528/binance-php/tree/master/tests/spot)

[更多API](https://github.com/zhouaini528/binance-php/tree/master/src/Api)

### 合约交易 API

Market数据相关 API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/future/market.php)

```php
use Lin\Binance\BinanceFuture;
use Lin\Binance\BinanceDelivery;

$binance=new BinanceFuture();
$binance=new BinanceDelivery();
try {
    $result=$binance->market()->getExchangeInfo();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getDepth([
        'symbol'=>'BTCUSDT',
        'limit'=>5
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getTrades([
        'symbol'=>'BTCUSDT',
        'limit'=>5
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getHistoricalTrades([
        'symbol'=>'BTCUSDT'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getAggTrades([
        'symbol'=>'BTCUSDT',
        'limit'=>5
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getPremiumIndex([
        //'symbol'=>'BTCUSDT',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getFundingRate([
        'symbol'=>'BTCUSDT',
        'limit'=>5
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
```

交易相关 API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/future/trade.php)

```php
use Lin\Binance\BinanceFuture;
use Lin\Binance\BinanceDelivery;

$binance=new BinanceFuture($key,$secret);
//Or New Delivery
$binance=new BinanceDelivery($key,$secret);

//Send in a new order.
try {
    $result=$binance->trade()->postOrder([
        'symbol'=>'BTCUSDT',
        'side'=>'BUY',
        'type'=>'LIMIT',
        'quantity'=>'1',
        'price'=>'5000',
        'timeInForce'=>'GTC',
        //'newClientOrderId'=>'xxxxxxx'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
sleep(1);

//Check an order's status.
try {
    $result=$binance->user()->getOrder([
        'symbol'=>'BTCUSDT',
        'orderId'=>$result['orderId'],
        //'origClientOrderId'=>$result['clientOrderId'],
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
sleep(1);

//Cancel an active order.
try {
    $result=$binance->trade()->deleteOrder([
        'symbol'=>'BTCUSDT',
        'orderId'=>$result['orderId'],
        'origClientOrderId'=>$result['clientOrderId'],
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
```

用户相关 API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/future/user.php)

```php
use Lin\Binance\BinanceFuture;
use Lin\Binance\BinanceDelivery;

$binance=new BinanceFuture($key,$secret);
//Or New Delivery
$binance=new BinanceDelivery($key,$secret);

try {
    $result=$binance->user()->getBalance();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->user()->getAccount();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->user()->getOrder([
        'symbol'=>'BTCUSDT',
        'orderId'=>'111111111',
        'origClientOrderId'=>'xxxxxxx',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->user()->getOpenOrder([
        'symbol'=>'BTCUSDT',
        'orderId'=>'111111111',
        'origClientOrderId'=>'xxxxxxx',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->user()->getLeverageBracket();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->user()->getForceOrders();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->user()->getAdlQuantile();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

```

[更多用例](https://github.com/zhouaini528/binance-php/tree/master/tests/future)

[更多API](https://github.com/zhouaini528/binance-php/tree/master/src/Api)


