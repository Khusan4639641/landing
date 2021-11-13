<?php

namespace App\Http\Controllers;

use App\Services\RPCServices;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * @var User
     */
    private $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = $request->instance()->query('user');
        return view('admin',['user'=>$user]);
    }
    public function activity( $id = 1,$row = 2,RPCServices $RPCServices,Request $request){
        $user = $request->instance()->query('user');
        $posts = $RPCServices->get(['active_count'=>$id,'user_id'=>$user->id,'row'=>$row]);
        $posts = json_decode($posts);
        return view('admin',['posts'=>$posts,'user'=>$user,"id"=>$id,"row"=>$row]);
    }
}
