<?php


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

// Route::get('/', [ProductController::class, "index"]);
// Route::get('/add',[ProductController::class, "create"])->name('product.add');
// Route::get('/detail/{id?}', [ProductController::class, "getDetail"]);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('hello');
});

Route::get('/login', function(){
    return view ('login');
});

Route::get('/register', function(){
    return view ('register');
});


Route::prefix('product')->group(function () {
    Route::controller(ProductController::class)->group(function()
    {
        Route::get('/', 'index');
        Route::get('/add', 'create')->name('add');
        Route::get('/detail/{id?}','get');
        Route::get('/store', 'store');
        Route::post('/checkLogin', 'checkLogin');
        Route::post('/registerRequest', 'registerRequest');
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