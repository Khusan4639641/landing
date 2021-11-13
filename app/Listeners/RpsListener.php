<?php

namespace App\Listeners;

use App\Events\RpcEvent;
use App\Services\RPCServices;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RpsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * Handle the event.
     *
     * @param  RpcEvent  $event
     * @return void
     */
    public function handle(RpcEvent $event)
    {
        echo $event->rpcContract->send($event->sendData);
    }
}
