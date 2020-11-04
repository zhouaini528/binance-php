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
    //'baseurl'=>'ws://fstream.binance.com',
    'baseurl'=>'ws://dstream.binance.com',
]);

$action=intval($_GET['action'] ?? 0);//http pattern
if(empty($action)) $action=intval($argv[1]);//cli pattern

switch ($action){
    //**************public
    //subscribe
    case 1:{

        $binance->subscribe([
            'btcusd_201225@depth',
            'ethusd_201225@depth',
        ]);

        break;
    }

    //unsubscribe
    case 2:{
        $binance->unsubscribe([
            'btcusd_201225@depth',
            'ethusd_201225@depth',
        ]);

        break;
    }

    case 3:{

        $binance->subscribe([
            'btcusd_201225@aggTrade',
            'btcusd_201225@trade',
            'btcusd_201225@kline_1d',
            'btcusd_201225@miniTicker',
            'btcusd_201225@depth20'
        ]);

        break;
    }

    //**************private
    //subscribe
    case 10:{
        $binance->keysecret($key_secret[2]);
        //Subscribe to all private channels by default
        $binance->subscribe();

        break;
    }

    //unsubscribe
    case 11:{
        $binance->keysecret($key_secret[2]);
        $binance->unsubscribe();
        break;
    }


    case 20:{
        //****Three ways to get all data

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

        break;
    }

    case 21:{
        //****Three ways return to the specified channel data

        //The first way
        $data=$binance->getSubscribe([
            'btcusd_201225@depth',
            'ethusd_201225@depth',
        ]);
        print_r(json_encode($data));

        //The second way callback
        $binance->getSubscribe([
            'btcusd_201225@depth',
            'ethusd_201225@depth',
        ],function($data){
            print_r(json_encode($data));
        });

        //The third way is to guard the process
        $binance->getSubscribe([
            'btcusd_201225@depth',
            'ethusd_201225@depth',
        ],function($data){
            print_r(json_encode($data));
        },true);

        break;
    }

    case 22:{
        //****Three ways return to the specified channel data,All private data is also returned by default

        //The first way
        $binance->keysecret($key_secret[2]);
        $data=$binance->getSubscribe([
            'btcusd_201225@depth',
            'ethusd_201225@depth',
        ]);
        print_r(json_encode($data));

        //The second way callback
        $binance->keysecret($key_secret[2]);
        $binance->getSubscribe([
            'btcusd_201225@depth',
            'ethusd_201225@depth',
        ],function($data){
            print_r(json_encode($data));
        });

        //The third way is to guard the process
        $binance->keysecret($key_secret[2]);
        $binance->getSubscribe([
            'btcusd_201225@depth',
            'ethusd_201225@depth',
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
        ]);
        break;
    }

    case 10003:{
        $binance->subscribe([

        ]);
        break;
    }

    case 10004:{

        $binance->client()->test2();

        break;
    }
}


