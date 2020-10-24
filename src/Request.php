<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance;

use GuzzleHttp\Exception\RequestException;
use Lin\Binance\Exceptions\Exception;

class Request
{
    protected $key='';

    protected $secret='';

    protected $host='';


    protected $nonce='';

    protected $signature='';//bool | string

    protected $headers=[];

    protected $type='';

    protected $path='';

    protected $data=[];

    protected $options=[];

    public function __construct(array $data)
    {
        $this->key=$data['key'] ?? '';
        $this->secret=$data['secret'] ?? '';
        $this->host=$data['host'] ?? 'https://api.binance.com';

        $this->options=$data['options'] ?? [];
    }

    /**
     *
     * */
    protected function auth(){
        $this->nonce();

        $this->signature();

        $this->headers();

        $this->options();
    }

    /**
     *
     * */
    protected function nonce(){
        $this->nonce='';
    }

    /**
     *
     * */
    protected function signature(){
        if(!empty($this->data)){
            $query=http_build_query($this->data,'', '&');

            if($this->signature===true){
                $this->signature = $query.'&signature='.hash_hmac('sha256', $query, $this->secret);
            }else{
                $this->signature = $query;
            }
        }
    }

    /**
     *
     * */
    protected function headers(){
        $this->headers=[
            'X-MBX-APIKEY'=>$this->key,
        ];
    }

    /**
     * 请求设置
     * */
    protected function options(){
        if(isset($this->options['headers'])) $this->headers=array_merge($this->headers,$this->options['headers']);

        $this->options['headers']=$this->headers;
        $this->options['timeout'] = $this->options['timeout'] ?? 60;

        if(isset($this->options['proxy']) && $this->options['proxy']===true) {
            $this->options['proxy']=[
                'http'  => 'http://127.0.0.1:12333',
                'https' => 'http://127.0.0.1:12333',
                'no'    =>  ['.cn']
            ];
        }
    }

    /**
     *
     * */
    protected function send(){
        $client = new \GuzzleHttp\Client();

        $query = $this->signature === true ? '' : '?'.$this->signature;

        $response = $client->request($this->type, $this->host.$this->path.$query, $this->options);

        $this->signature='';

        return $response->getBody()->getContents();
    }

    /*
     *
     * */
    protected function exec(){
        $this->auth();

        try {
            return json_decode($this->send(),true);
        }catch (RequestException $e){
            if(method_exists($e->getResponse(),'getBody')){
                $contents=$e->getResponse()->getBody()->getContents();

                $temp=json_decode($contents,true);
                if(!empty($temp)) {
                    $temp['_method']=$this->type;
                    $temp['_url']=$this->host.$this->path;
                }else{
                    $temp['_message']=$e->getMessage();
                }
            }else{
                $temp['_message']=$e->getMessage();
            }

            $temp['_httpcode']=$e->getCode();

            throw new Exception(json_encode($temp));
        }
    }
}
