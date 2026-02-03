<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showlogin()
    {
        return view('login');
    }

    public function checkLogin(Request $request){
        $account = $request->only('email', 'password');
        if(Auth::attempt($account))
            {
                return redirect('/products');
            };
        return redirect('/login')->with('error', 'Email or password is incorrect');
    }
}
