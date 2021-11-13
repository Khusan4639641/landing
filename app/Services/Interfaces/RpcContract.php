<?php
namespace App\Services\Interfaces;

interface RpcContract {
    public function send($array);
    public function get($array);
}
