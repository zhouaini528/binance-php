### It is recommended that you read the official document first

Spot trading docs [https://github.com/binance-exchange/binance-official-api-docs](https://github.com/binance-exchange/binance-official-api-docs)

Futures trading docs [https://binance-docs.github.io/apidocs/futures/cn](https://binance-docs.github.io/apidocs/futures/cn)

Delivery trading docs [https://binance-docs.github.io/apidocs/delivery/cn](https://binance-docs.github.io/apidocs/delivery/cn)

Support [Websocket](https://github.com/zhouaini528/binance-php/blob/master/README.md#Websocket)

Most of the interface is now complete, and the user can continue to extend it based on my design, working with me to improve it.

**If you don't find the exchange SDK you want, you can tell me and I'll join them.**

#### Installation
```
composer require mhallaji/binance
```

Support for more request Settings [More](https://github.com/zhouaini528/binance-php/blob/master/tests/spot/proxy.php#L21)
```php
use Lin\Binance\Binance;
$binance=new Binance($key,$secret);

//You can set special needs
$binance->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,
    
    //https://github.com/guzzle/guzzle
    'proxy'=>[],
    //https://www.php.net/manual/en/book.curl.php
    'curl'=>[],
    //default is v1
    'version'=>'v2',
]);
```

### Spot Trading API

System related API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/spot/system.php)

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

Trade related API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/spot/trade.php)

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

//Cancel all Open Orders on a Symbol
try {
    $result=$binance->trade()->deleteAllOrders([
        'symbol'=>'ADAUSDT',
        //'timeInForce'=>'GTC',
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
```

User related API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/spot/user.php)

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

//Query OCO (USER_DATA)
try {
    $result=$binance->user()->getOrderList([
        'orderListId'=>'xxxxxx'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//Query all OCO (USER_DATA)
try {
    $result=$binance->user()->getAllOrderList();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//Query Open OCO (USER_DATA)
try {
    $result=$binance->user()->getOpenOrderList();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
```

[More Test](https://github.com/zhouaini528/binance-php/tree/master/tests/spot)

[More API](https://github.com/zhouaini528/binance-php/tree/master/src/Api)

### Futures Trading API

Market related API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/future/system.php)

```php
use Lin\Binance\BinanceFuture;
use Lin\Binance\BinanceDelivery;

$binance=new BinanceFuture();
//Or New Delivery
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

Trade related API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/future/trade.php)

```php
use Lin\Binance\BinanceFuture;
use Lin\Binance\BinanceDelivery;

$binance=new BinanceFuture();
//Or New Delivery
$binance=new BinanceDelivery($key,$secret);

//Send in a new order.
try {
    $result=$binance->trade()->postOrder([
        'symbol'=>'BTCUSDT',
        'side'=>'BUY',
        'type'=>'LIMIT',
        'quantity'=>'0.01',
        'price'=>'6500',
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
    $result=$binance->trade()->getOrder([
        'symbol'=>'BTCUSDT',
        'orderId'=>$result['orderId'],
        'origClientOrderId'=>$result['clientOrderId'],
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

User related API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/future/user.php)

```php
use Lin\Binance\BinanceFuture;
use Lin\Binance\BinanceDelivery;

$binance=new BinanceFuture();
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

[More Test](https://github.com/zhouaini528/binance-php/tree/master/tests/future)

[More API](https://github.com/zhouaini528/binance-php/tree/master/src/Api)

### Websocket

Websocket has two services, server and client. The server is responsible for dealing with the new connection of the exchange, data receiving, authentication and login. Client is responsible for obtaining and processing data.

Server initialization must be started in Liunx CLI mode.
```php
use \Lin\Binance\BinanceWebSocket;
require __DIR__ .'./vendor/autoload.php';

$binance=new BinanceWebSocket();

$binance->config([
    //Do you want to enable local logging,default false
    'log'=>true,
    //Or set the log name,
    //'log'=>['filename'=>'spot'],

    //Daemons address and port,default 0.0.0.0:2208
    //'global'=>'127.0.0.1:2208',

    //Heartbeat time,default 20 seconds
    //'ping_time'=>20,

    //Channel subscription monitoring time,2 seconds
    //'listen_time'=>2,

    //Channel data update time,0.1 seconds
    //'data_time'=>0.1,

    //Number of messages WS queue shuold hold, default 100
    //'queue_count'=>100,

    //baseurl
    'baseurl'=>'ws://stream.binance.com:9443',//spot default
    //'baseurl'=>'ws://fstream.binance.com',//usdt future
    //'baseurl'=>'ws://dstream.binance.com',//coin future
]);

$binance->start();
```

If you want to test, you can "php server.php start" immediately outputs the log at the terminal.

If you want to deploy, you can "php server.php start -d" enables resident process mode, and enables "log=>true" to view logs.

[More Test](https://github.com/zhouaini528/binance-php/tree/master/tests/websocket/server_spot.php)


Client side initialization.
```php
$binance=new BinanceWebSocket();

$binance->config([
    //Do you want to enable local logging,default false
    'log'=>true,
    //Or set the log name,
    //'log'=>['filename'=>'usdt-future'],

    //Daemons address and port,default 0.0.0.0:2208
    //'global'=>'127.0.0.1:2208',

    //Heartbeat time,default 20 seconds
    //'ping_time'=>20,

    //Channel subscription monitoring time,2 seconds
    //'listen_time'=>2,

    //Channel data update time,0.1 seconds
    'data_time'=>1,

    //Number of messages WS queue shuold hold, default 100
    //'queue_count'=>100,

    //baseurl
    'baseurl'=>'ws://stream.binance.com:9443',//spot default
    //'baseurl'=>'ws://fstream.binance.com',//usdt future
    //'baseurl'=>'ws://dstream.binance.com',//coin future
]);
```

Subscribe
```php
//You can only subscribe to public channels
$binance->subscribe([
    'btcusdt@depth',
    'bchusdt@depth',
    'btcusdt@aggTrade',
    'btcusdt@trade',
    'btcusdt@kline_1d',
    'btcusdt@miniTicker',
    'btcusdt@depth20'
]);

//You can also subscribe to both private and public channels.If keysecret() is set, all private channels will be subscribed by default
$binance->keysecret([
    'key'=>'xxxxxxxxx',
    'secret'=>'xxxxxxxxx',
]);
$binance->subscribe([
    'btcusdt@depth',
    'bchusdt@depth',
    'btcusdt@aggTrade',
    'btcusdt@trade',
    'btcusdt@kline_1d',
    'btcusdt@miniTicker',
    'btcusdt@depth20',
]);
```

Unsubscribe
```php
//Unsubscribe from public channels
$binance->unsubscribe([
    'btcusdt@depth',
    'bchusdt@depth',
    'btcusdt@aggTrade',
    'btcusdt@trade',
    'btcusdt@kline_1d',
    'btcusdt@miniTicker',
    'btcusdt@depth20'
]);

//Unsubscribe from public and private channels.If keysecret() is set, all private channels will be Unsubscribed by default
$binance->keysecret([
    'key'=>'xxxxxxxxx',
    'secret'=>'xxxxxxxxx',
]);
$binance->unsubscribe([
    'btcusdt@depth',
    'bchusdt@depth',
    'btcusdt@aggTrade',
    'btcusdt@trade',
    'btcusdt@kline_1d',
    'btcusdt@miniTicker',
    'btcusdt@depth20'
]);
```

Get all channel subscription data
```php

//The first way
$data=$binance->getSubscribes();
print_r(json_encode($data));

//The second way callback
$binance->getSubscribes(function($data){
    print_r(json_encode($data));
});

//The third way is to guard the process
$binance->getSubscribes(function($data){
    print_r(json_encode($data));
},true);

//Note that if you need to get data in a loop, the first and second methods need to add 'pcntl_alarm(0)'
while(1){
    pcntl_alarm(0);
    sleep(1);
    $data=$binance->getSubscribes();
    print_r(json_encode($data));
}
```

Get partial channel subscription data
```php
//The first way
$data=$binance->getSubscribe([
    'btcusdt@depth',
    'bchusdt@depth',
]);
print_r(json_encode($data));

//The second way callback
$binance->getSubscribe([
    'btcusdt@depth',
    'bchusdt@depth',
],function($data){
    print_r(json_encode($data));
});

//The third way is to guard the process
$binance->getSubscribe([
    'btcusdt@depth',
    'bchusdt@depth',
],function($data){
    print_r(json_encode($data));
},true);
```

Get partial private channel subscription data
```php
//The first way
$binance->keysecret($key_secret);
$data=$binance->getSubscribe();//Return all data of private channel
print_r(json_encode($data));

//The second way callback
$binance->keysecret($key_secret);
$binance->getSubscribe([//Return all data of private channel and partial data of public channel
    'btcusdt@depth',
    'bchusdt@depth',
],function($data){
    print_r(json_encode($data));
});

//The third way is to guard the process
$binance->keysecret($key_secret);
$binance->getSubscribe([//Return all data of private channel and partial data of public channel
    'btcusdt@depth',
    'bchusdt@depth',
],function($data){
    print_r(json_encode($data));
},true);
```

Re link websocket public quotation data and private data
```php
$binance->reconPublic();

$binance->reconPrivate($key);
```

[Spot Websocket More Test](https://github.com/zhouaini528/binance-php/tree/master/tests/websocket/client_spot.php)

[USDT Future Websocket More Test](https://github.com/zhouaini528/binance-php/tree/master/tests/websocket/client_usdt_future.php)

[Coin Future Websocket More Test](https://github.com/zhouaini528/binance-php/tree/master/tests/websocket/client_coin_future.php)

