<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authorize;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    public function auth(Authorize $request){
        $user = User::where('email',$request->input('email'))->first();

        if (!$request->input('password')){
            throw ValidationException::withMessages([
                'password'=>['пароль это обязательно!']
            ]);
        }
        $pass = Hash::check($request->input('password'),$user->password);
        if (!$pass){
            throw ValidationException::withMessages([
                'password'=>['Неверные пароль!']
            ]);
        }
         Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')]);
        $user = User::find(Auth::user()->id);
        $user->active_date = Carbon::now();
        $user->save();
        return response()->redirectTo("/admin");
    }
    public function logout(){
        Auth::logout();
        return response()->redirectTo('/');
    }
}
