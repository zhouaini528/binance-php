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
    //'log'=>true,
    //Or set the log name
    'log'=>['filename'=>'usdt-future'],

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
        /*$binance->subscribe([
            'btcusdt@depth',
            'bchusdt@depth',
        ]);*/

        $binance->subscribe([
            'btcusdt@bookTicker',
            'bchusdt@bookTicker',
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

    case 4:{
        $binance->unsubscribe([
            'btcusdt@aggTrade',
            'btcusdt@trade',
            //'btcusdt@kline_1d',
            //'btcusdt@depth20'
        ]);

        break;
    }

    //**************private
    //subscribe
    case 10:{
        /*
        $binance->keysecret([
            'key'=>'xxxxxxxxx',
            'secret'=>'xxxxxxxxx',
        ]);
        */
        $binance->keysecret($key_secret[0]);
        //Subscribe to all private channels by default
        $binance->subscribe([
            'xrpusdt@bookTicker',
            //'bchusdt@depth',
        ]);

        break;
    }

    //unsubscribe
    case 11:{
        $binance->keysecret($key_secret[2]);
        //unSubscribe to all private channels by default
        $binance->unsubscribe();

        break;
    }

    case 12:{
        $binance->keysecret($key_secret[0]);
        //Subscribe to all private channels by default
        $binance->subscribe([
            'btcusdt@depth',
            'bchusdt@depth',
        ]);

        break;
    }



    case 20:{
        //****Three ways to get all data

        //The first way
        /*$data=$binance->getSubscribes();
        print_r(json_encode($data));
        return;

        //The second way callback
        $binance->getSubscribes(function($data){
            print_r(json_encode($data));
        });*/

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
            'btcusdt@depth',
            'bchusdt@depth',
        ]);

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

        break;
    }

    case 22:{
        //****Three ways return to the specified channel data,All private data is also returned by default

        //The first way
        $binance->keysecret($key_secret[0]);
        $data=$binance->getSubscribe([
            'btcusdt@depth',
            'bchusdt@depth',
        ]);
        print_r(json_encode($data));
        die;

        //The second way callback
        $binance->keysecret($key_secret[2]);
        $binance->getSubscribe([
            'btcusdt@depth',
            'bchusdt@depth',
        ],function($data){
            print_r(json_encode($data));
        });

        //The third way is to guard the process
        $binance->keysecret($key_secret[2]);
        $binance->getSubscribe([
            'btcusdt@depth',
            'bchusdt@depth',
        ],function($data){
            print_r(json_encode($data));
        },true);

        break;
    }

    case 99:{
        $binance->client()->test();
        break;
    }

    case 10004:{
        $binance->client()->test2();
        break;
    }

    case 10005:{
        $binance->client()->test_reconnection();
        break;
    }
}


