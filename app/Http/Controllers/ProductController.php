<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckTimeAccess;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class ProductController extends Controller implements HasMiddleware
{
    public function index()
    {
        $title = "Product List";
        return view("product.index", ['title' => $title,
            'products'=>[
                    ['id'=>1, 'name'=>'Orange', 'price'=>100],
                    ['id'=>2, 'name'=>'Apple', 'price'=>200],
                    ['id'=>3, 'name'=>'3nana', 'price'=>300],
            ]  
        ]); 
    }

    public function get(string $id = "123")
    {
        return view("product.detail", ['id' => $id]);
    }

    public function create()
    {
        return view("product.add");
    }

    public function store(Request $request)
    { 
        return $request->all();
    }

    public function login(){
        return view("login");
    }

    public function checkLogin(Request $request)
    {
        if($request->input('username') == 'baodq' && $request->input('pass') == '123456')
        {
            return "Dang nhap thanh cong";
        }
        else
        {
            return "Dang nhap that bai";
        }
    }


    public function register()
    {
        return view("register");
    }

    public function registerRequest(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3',
            'password' => 'required|min:6|confirmed',
        ]);

        return response()->json([
            'message' => 'Dang ky thanh cong',
            'data' => [
                'username' => $request->username,
            ]
        ]);
    }

    public static function middleware ()
    {
        return [
            CheckTimeAccess::class,
        ];
    }

    public function age(){
        return view ('product.age');
    }

    public function checkAge(Request $request)
    {
        session([
            'age_verified' => true,
            'age' => $request->age
        ]);
        return redirect('/product');
    }
}
