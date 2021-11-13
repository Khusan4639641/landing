<?php
namespace App\Services;

use  App\Services\Interfaces\RpcContract;

class RPCServices implements RpcContract{
    protected $apiKey;
    protected $apiSecret;
    protected $apiUrl;

    public function get($array)
    {
        // TODO: Implement get() method.
        $this->apiKey = env('API_KEY');
        $this->apiSecret = env('API_SECRET');
        $this->apiUrl = env('API_URL').'/get/'.$array['active_count'];
        $code = $this->infoEncode($array);
        $message = json_encode(['info'=>$code]);
        $sign = hash_hmac('sha512', $message, $this->apiSecret);
        $requestHeaders = [
            'api-key:' . $this->apiKey,
            'sign:' . $sign,
            'Content-type: application/json'
        ];

        $ch = curl_init($this->apiUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $requestHeaders);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public function send($array)
    {
        // TODO: Implement send() method.
        $this->apiKey = env('API_KEY');
        $this->apiSecret = env('API_SECRET');
        $this->apiUrl = env('API_URL').'/send';
        $code = $this->infoEncode($array);
        $message = json_encode(['info'=>$code]);
        $sign = hash_hmac('sha512', $message, $this->apiSecret);
        $requestHeaders = [
            'api-key:' . $this->apiKey,
            'sign:' . $sign,
            'Content-type: application/json'
        ];

        $ch = curl_init($this->apiUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $requestHeaders);
        curl_exec($ch);
        curl_close($ch);
    }
    protected function infoEncode($data){
        $code = [];
        foreach ($data as $key=>$val) {
            $indexKey = "";
            $indexValue = "";
            $values = str_split($val);
            $keys = str_split($key);
            foreach ($keys as $key) {
                    $indexKey.=ord($key)+123;
            }
//          value code
            foreach ($values as $value) {
                    $indexValue.=ord($value)+123;
            }
            $code[$indexKey] = $indexValue;
        }
        return $code;
    }
    protected function infoDecode($data){
        $decode = [];
        foreach ($data as $key=>$val) {
            $indexKey = "";
            $indexValue = "";
            $values = str_split($val,3);
            $keys = str_split($key,3);
            foreach ($keys as $key) {
                    $indexKey.=chr($key-123);
            }
//          value code
            foreach ($values as $value) {
                    $indexValue.=chr($value-123);
            }
            $decode[$indexKey] = $indexValue;
        }
        return $decode;
    }
}
