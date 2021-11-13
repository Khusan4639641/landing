<?php

namespace App\Http\Controllers;
use App\Events\RpcEvent;
use App\Services\Interfaces\RpcContract;
use App\Services\RPCServices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Posts;
use Illuminate\Support\Facades\Auth;
use App\User;

class LandingController extends Controller
{

    public function __construct()
    {

    }
    public function index()
    {
        $posts = Posts::all();
        return view('welcome',['posts'=>$posts]);
    }
    public function post($id)
    {
        $post = Posts::find($id);
        return view('post',['post'=>$post]);
    }
}
