<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckTimeAccess;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Models\Product;
class ProductController extends Controller implements HasMiddleware
{
    public function index()
    {
            $product = Product::all();
            $title = "Product.List";
            return view("admin.product.index", ['products'=>$product, 'title'=>$title]);
    }

    public function get(string $id = "123")
    {
        return view("product.detail", ['id' => $id]);
    }

    public function create()
    {
        return view("admin.product.add");
    }

    public function store(Request $request)
    { 
        // return $request->all();

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;

        $product->save();
        return redirect('/products');
    }

    // public function edit(string $id)
    // {
    //     $product = Product::find($id);
    //     return view('product.edit', ['product' => $product]);
    // }

     public function edit(string $id)
    {
        return view('admin.product.edit', ['product' => Product::find($id)]);
    }

    public function update(Request $request, string $id)
    {
        //
        $product = Product::find($id);
        $product -> name = $request -> input('name');
        $product -> price = $request -> input('price');
        $product -> stock = $request -> input('stock');

        $product -> save();

        return redirect('/products');
    }

    // public function update(Request $request, string $id)
    // {
    //     $product = Product::find($id);
    //     $product->name = $request->name;
    //     $product->stock = $request->stock;

    //     $product->save();
    //     return redirect('/product');
    // }

        public function delete(string $id)
    {
        $product = Product::find($id);
        $product -> delete();
        return redirect('/products');
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
