### It is recommended that you read the official document first

Huobi docs [https://github.com/huobiapi/API_Docs_en/wiki/REST_Reference](https://github.com/huobiapi/API_Docs_en/wiki/REST_Reference)

All interface methods are initialized the same as those provided by huobi. See details [src/api](https://github.com/zhouaini528/huobi-php/tree/master/src/Api)

Many interfaces are not yet complete, and users can continue to extend them based on my design. Feel free to iterate with me.

[中文文档](https://github.com/zhouaini528/huobi-php/blob/master/README_CN.md)

### Other exchanges API
[Bitmex](https://packagist.org/packages/linwj/bitmex)

[Okex](https://packagist.org/packages/linwj/okex)

[Huobi](https://packagist.org/packages/linwj/huobi)

### Spot Trading API

Market related API [More](https://github.com/zhouaini528/huobi-php/blob/master/tests/spot/market.php)
```php
$huobi=new HuobiSpot();

//Get market data. This endpoint provides the snapshots of market data and can be used without verifications.
try {
    $result=$huobi->market()->getDepth([
        'symbol'=>'btcusdt',
        //'type'=>'step3'   default step0
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//List trading pairs and get the trading limit, price, and more information of different trading pairs.
try {
    $result=$huobi->market()->getTickers();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
```

Order related API [More](https://github.com/zhouaini528/huobi-php/blob/master/tests/spot/order.php)
```php
$huobi=new HuobiSpot($key,$secret);

//Place an Order
try {
    $result=$huobi->order()->postPlace([
        'account-id'=>$account_id,
        'symbol'=>'btcusdt',
        'type'=>'buy-limit',
        'amount'=>'0.001',
        'price'=>'100',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
sleep(1);

//Get order details by order ID.
try {
    $result=$huobi->order()->get([
        'order-id'=>$result['data'],
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
sleep(1);

//Cancelling an unfilled order.
try {
    $result=$huobi->order()->postSubmitCancel([
        'order-id'=>$result['data']['id'],
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
```

Accounts related API [More](https://github.com/zhouaini528/huobi-php/blob/master/tests/spot/account.php)
```php
$huobi=new HuobiSpot($key,$secret);

//get the status of an account
try {
    $result=$huobi->account()->get();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//Get the balance of an account
try {
    $result=$huobi->account()->getBalance([
        'account-id'=>$result['data'][0]['id']
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

```

[More use cases](https://github.com/zhouaini528/huobi-php/tree/master/tests/spot)

[More API](https://github.com/zhouaini528/huobi-php/tree/master/src/Api/Spot)

### Futures Trading API
being developed
