<?php

namespace App\Http\Middleware;

use App\Services\RPCServices;
use App\Events\RpcEvent;
use Illuminate\Support\Carbon;

use Closure;
use Illuminate\Support\Facades\Auth;

class sendData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $rpcService = new RPCServices;
        if(Auth::check()) {
            event(new RpcEvent([
                'url' => url()->current(),
                'date' => Carbon::now()->format('Y-m-d H:i:s'),
                'user_id'=> Auth::user()->id,
                'active_user_date'=>Auth::user()->active_date
            ], $rpcService));
        }
        $request->merge(array("user" => Auth::user()));
        return $next($request);
    }
}
