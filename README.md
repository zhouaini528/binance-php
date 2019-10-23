### It is recommended that you read the official document first

Binance docs [https://github.com/binance-exchange/binance-official-api-docs](https://github.com/binance-exchange/binance-official-api-docs)

All interface methods are initialized the same as those provided by binance. See details [src/api](https://github.com/zhouaini528/binance-php/tree/master/src/Api)

Many interfaces are not yet complete, and users can continue to extend them based on my design. Welcome to improve it with me

[中文文档](https://github.com/zhouaini528/binance-php/blob/master/README_CN.md)

### Other exchanges API

[Exchanges](https://github.com/zhouaini528/exchanges-php) It includes all of the following exchanges and is highly recommended.

[Bitmex](https://github.com/zhouaini528/bitmex-php)

[Okex](https://github.com/zhouaini528/okex-php)

[Huobi](https://github.com/zhouaini528/huobi-php)

[Binance](https://github.com/zhouaini528/binance-php)

[Kucoin](https://github.com/zhouaini528/kucoin-php)

#### Installation
```
composer require linwj/binance
```

Support for more request Settings [More](https://github.com/zhouaini528/binance-php/blob/master/tests/proxy.php#L21)
```php
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

System related API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/system.php)

```php
$binance=new Binance();

//Order book
try {
    $result=$binance->system()->getDepth([
        'symbol'=>'BTCUSDT',
        'limit'=>'20',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//Recent trades list
try {
    $result=$binance->system()->getTrades([
        'symbol'=>'BTCUSDT',
        'limit'=>'20',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//Current average price
try {
    $result=$binance->system()->getAvgPrice([
        'symbol'=>'BTCUSDT'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
```

Trade related API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/trade.php)

```php
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
    print_r(json_decode($e->getMessage(),true));
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
    print_r(json_decode($e->getMessage(),true));
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
    print_r(json_decode($e->getMessage(),true));
}
```

User related API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/user.php)

```php
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
    print_r(json_decode($e->getMessage(),true));
}

//Get current account information.
try {
    $result=$binance->user()->getAccount();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
```

[More Test](https://github.com/zhouaini528/binance-php/tree/master/tests)

[More API](https://github.com/zhouaini528/binance-php/tree/master/src/Api)
