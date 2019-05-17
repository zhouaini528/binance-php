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
    
    protected $timeout=10;
    
    protected $proxy=false;
    
    public function __construct(array $data)
    {
        $this->key=$data['key'] ?? '';
        $this->secret=$data['secret'] ?? '';
        $this->host=$data['host'] ?? 'https://api.binance.com';
    }
    
    /**
     * 认证
     * */
    protected function auth(){
        $this->nonce();
        
        $this->signature();
        
        $this->headers();
    }
    
    /**
     * 过期时间
     * */
    protected function nonce(){
        $this->nonce='';
    }
    
    /**
     * 签名
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
     * 默认头部信息
     * */
    protected function headers(){
        $this->headers=[
            'X-MBX-APIKEY'=>$this->key,
        ];
    }
    
    /**
     * 代理端口设置
     * @param bool|array
     * false   默认
     * true   设置本地代理
     * array  手动设置代理
     * */
    function proxy($proxy=false){
        $this->proxy=$proxy;
    }
    
    /**
     * 发送http
     * */
    protected function send(){
        $client = new \GuzzleHttp\Client();
        
        $data=[
            'headers'=>$this->headers,
            'timeout'=>$this->timeout
        ];
        
        //是否有代理设置
        if(is_array($this->proxy)){
            $data=array_merge($data,['proxy'=>$this->proxy]);
        }else{
            if($this->proxy) $data['proxy']=[
                'http'  => 'http://127.0.0.1:12333',
                'https' => 'http://127.0.0.1:12333',
                'no'    =>  ['.cn']
            ];
        }
        
        $response = $client->request($this->type, $this->host.$this->path.'?'.$this->signature, $data);
        
        $this->signature='';
        
        return $response->getBody()->getContents();
    }
    
    /*
     * 执行流程
     * */
    protected function exec(){
        $this->auth();
        
        //可以记录日志
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
            
            //TODO  该流程可以记录各种日志
            throw new Exception(json_encode($temp));
        }
    }
}