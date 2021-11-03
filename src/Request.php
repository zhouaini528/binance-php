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

    protected $query='';

    protected $data=[];

    protected $options=[];

    protected $response_headers = [];

    protected $version='';

    public function __construct(array $data)
    {
        $this->key=$data['key'] ?? '';
        $this->secret=$data['secret'] ?? '';
        $this->host=$data['host'] ?? 'https://api.binance.com';

        if(isset($data['options']['version'])){
            $this->version=strtolower($data['options']['version']);
            unset($data['options']['version']);
        }

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
            foreach ($this->data as $k1=>$v1){
                if(is_array($v1)) $this->query.=$k1.'='.urlencode(json_encode($v1)).'&';
                else $this->query.=$k1.'='.$v1.'&';
            }
            $this->query=substr($this->query,0,-1);

            if($this->signature===true){
                $this->signature = $this->query.'&signature='.hash_hmac('sha256', $this->query, $this->secret);
            }else{
                $this->signature = $this->query;
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
     * Get Response Headers
     * */
    public function getResponseHeaders(){
        return $this->response_headers;
    }

    /**
     *
     * */
    protected function options(){
        if(isset($this->options['headers'])) $this->headers=array_merge($this->headers,$this->options['headers']);

        $this->options['headers']=$this->headers;
        $this->options['timeout'] = $this->options['timeout'] ?? 60;
    }

    /**
     *
     * */
    protected function send(){
        $client = new \GuzzleHttp\Client();

        $query = $this->signature === true ? '' : '?'.$this->signature;

        $response = $client->request($this->type, $this->host.$this->path.$query, $this->options);

        $this->signature='';

        $this->response_headers = $response->getHeaders();

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
                    $temp['_url']=$this->host.$this->path.'?'.$this->query;
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
