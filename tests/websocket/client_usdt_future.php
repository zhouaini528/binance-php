<?php


/**
 * @author lin <465382251@qq.com>
 *
 * Fill in your key and secret and pass can be directly run
 *
 * Most of them are unfinished and need your help
 * https://github.com/zhouaini528/okex-php.git
 * */
use \Lin\Binance\BinanceWebSocket;

require __DIR__ .'../../../vendor/autoload.php';

include 'key_secret.php';

$binance=new BinanceWebSocket();

$binance->config([
    //Do you want to enable local logging,default false
    'log'=>true,

    //Daemons address and port,default 0.0.0.0:2208
    //'global'=>'127.0.0.1:2208',

    //Heartbeat time,default 20 seconds
    //'ping_time'=>20,

    //Channel subscription monitoring time,2 seconds
    //'listen_time'=>2,

    //Channel data update time,0.1 seconds
    //'data_time'=>0.1,

    //baseurl
    //'baseurl'=>'ws://stream.binance.com:9443',//default
    'baseurl'=>'ws://fstream.binance.com',
    //'baseurl'=>'ws://dstream.binance.com',
]);

$action=intval($_GET['action'] ?? 0);//http pattern
if(empty($action)) $action=intval($argv[1]);//cli pattern

switch ($action){
    //**************public
    //subscribe
    case 1:{

        $binance->subscribe([
            'btcusdt@depth',
            'bchusdt@depth',
        ]);

        break;
    }

    //unsubscribe
    case 2:{
        $binance->unsubscribe([
            'btcusdt@depth',
            'bchusdt@depth',
        ]);

        break;
    }

    case 3:{

        $binance->subscribe([
            'btcusdt@aggTrade',
            'btcusdt@trade',
            'btcusdt@kline_1d',
            'btcusdt@miniTicker',
            'btcusdt@depth20'
        ]);

        break;
    }

    //**************private
    //subscribe
    case 10:{
        $binance->keysecret($key_secret[0]);
        //Subscribe to all private channels by default
        $binance->subscribe();

        /*$binance->subscribe([
            '<listenKey>@account',
            '<listenKey>@balance',
            '<listenKey>@position',
        ]);*/
        break;
    }

    //unsubscribe
    case 11:{
        $binance->keysecret($key_secret[0]);
        $binance->unsubscribe([
            'spot/depth5:BCH-USDT',
            'futures/depth5:BCH-USD-210326',
            'swap/depth5:BCH-USD-SWAP',

            'futures/position:BCH-USD-210326',
            'futures/account:BCH-USDT',
            'swap/position:BCH-USD-SWAP',
        ]);

        break;
    }

    case 15:{
        $binance->keysecret([
            'key'=>'xxxxxxxxx',
            'secret'=>'xxxxxxxxx',
            'passphrase'=>'xxxxxxxxx',
        ]);
        $binance->subscribe([
            'spot/depth5:BTC-USDT',
            'futures/depth5:BTC-USD-210326',
            'swap/depth5:BTC-USD-SWAP',

            'futures/position:BTC-USD-210326',
            'swap/position:BTC-USD-SWAP',
        ]);
        break;
    }

    case 20:{
        //****Three ways to get all data

        //The first way
        $data=$binance->getSubscribes();
        print_r(json_encode($data));
        die;

        //The second way callback
        $binance->getSubscribes(function($data){
            print_r(json_encode($data));
        });

        //The third way is to guard the process
        $binance->getSubscribes(function($data){
            print_r(json_encode($data));
        },true);

        break;
    }

    case 21:{
        //****Three ways return to the specified channel data

        //The first way
        $data=$binance->getSubscribe([
            'spot/depth5:BCH-USDT',
            'futures/depth5:BCH-USD-210326',
        ]);
        print_r(json_encode($data));

        //The second way callback
        $binance->getSubscribe([
            'spot/depth5:BCH-USDT',
            'futures/depth5:BCH-USD-210326',
        ],function($data){
            print_r(json_encode($data));
        });

        //The third way is to guard the process
        $binance->getSubscribe([
            'spot/depth5:BCH-USDT',
            'futures/depth5:BCH-USD-210326',
        ],function($data){
            print_r(json_encode($data));
        },true);

        break;
    }

    case 22:{
        //****Three ways return to the specified channel data

        //The first way
        $binance->keysecret($key_secret[0]);
        $data=$binance->getSubscribe([
            'futures/depth5:BCH-USD-210326',
            'futures/position:BCH-USD-210326',//If there are private channels, $binance->keysecret() must be set
        ]);
        print_r(json_encode($data));

        //The second way callback
        $binance->keysecret($key_secret[0]);
        $binance->getSubscribe([
            'futures/depth5:BCH-USD-210326',
            'futures/position:BCH-USD-210326',//If there are private channels, $binance->keysecret() must be set
        ],function($data){
            print_r(json_encode($data));
        });

        //The third way is to guard the process
        $binance->keysecret($key_secret[0]);
        $binance->getSubscribe([
            'futures/depth5:BCH-USD-210326',
            'futures/position:BCH-USD-210326',//If there are private channels, $binance->keysecret() must be set
        ],function($data){
            print_r(json_encode($data));
        },true);

        break;
    }

    case 99:{
        $binance->client()->test();
        break;
    }

    //Simulation error message
    case 10001:{
        $binance->subscribe([
            'spot/depth5:BCH-USDT-xx',
        ]);
        break;
    }

    case 10002:{
        $binance->keysecret([
            'key'=>'xxxxxxxxx',
            'secret'=>'xxxxxxxxx',
            'passphrase'=>'xxxxxxxxx',
        ]);
        $binance->subscribe([
            'swap/depth5:BTC-USD-SWAP-xxx',

            'futures/position:BTC-USD-210326',
            'swap/position:BTC-USD-SWAP',
        ]);
        break;
    }

    case 10003:{
        $binance->subscribe([
            'spot/depth5:BCH-USDT',
            'futures/depth5:BCH-USD-210326',
            'swap/depth5:BCH-USD-SWAP',
            'option/depth5:BTCUSD-20201021-11750-C',

            'futures/position:BTC-USD-210326',
            'swap/position:BTC-USD-SWAP',
        ]);
        break;
    }

    case 10004:{
        //$a='futures/position:bch-usd-210326';
        //print_r($binance->client()->$a);
        /*$data=$binance->getSubscribe();
        print_r(json_encode($data));*/
        $binance->client()->test2();

        break;
    }

    case 10005:{
        $binance->keysecret($key_secret[0]);
        $binance->subscribe([
            'futures/position:BCH-USD-210326',
        ]);
        break;
    }

    //subscribe
    case 10006:{
        $binance->keysecret($key_secret[1]);
        $binance->subscribe([
            'spot/depth5:BCH-USDT',
            'futures/depth5:BCH-USD-210326',
            'swap/depth5:BCH-USD-SWAP',

            'futures/position:BCH-USD-210326',
            'futures/account:BCH-USDT',
            'swap/position:BCH-USD-SWAP',
        ]);
        break;
    }
}


