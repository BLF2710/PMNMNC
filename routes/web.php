<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('hello');
});
// });
// Route::get('/test', function () {
//     return response()->json("Hello World");
// });

// Route::get('/product', function () {
//     return view('product.index');
// });

// Route::get('/product/{id?}', function(?$id=123){
//     return view('product.detail', ['id' => $id]);
// });

// Route::get('/product/add', function () {
//     return view('product.add');
// })->name('add');


Route::prefix('product')->group(function () {
Route::get('/', function () {
    return view('product.index');
});

Route::get('/add', function () {
    return view('product.add');
})->name('add');

Route::get('/{id}', function(int $id){
    return view('product.detail', ['id' => $id]);
});
});

route::get('/sinhvien/{name?}/{mssv?}', function($name='Luong Xuan Hieu', $mssv='123456'){
    return view('sinhvien.gioithieu', ['name' => $name], ['mssv' => $mssv]);
});

route::get('/banco/{n?}', function($n=5){
    return view ('banco.ban', ['n' => $n]);
});

route::fallback(function (){
    return view('error.404');
});