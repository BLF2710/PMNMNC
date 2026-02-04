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
use App\Http\Controllers\TestController;
use App\Http\Middleware\CheckSessionAge;
use App\Http\Middleware\CheckTimeAccess;
use App\Http\Middleware\CheckAge;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('hello');
});

Route::get('/login', [AuthController::class, 'showlogin']);
Route::post('/checklogin', [AuthController::class, 'checkLogin'])->name('checkLogin');



Route::get('/register', function(){
    return view ('register');
});

Route::prefix('products') -> group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'create');
        Route::post('/store', 'store');
        Route::get('/edit/{id?}', 'edit');
        Route::post('/update/{id?}', 'update');
        Route::post('/delete/{id?}', 'delete');
    });
});


route::get('/sinhvien/{name?}/{mssv?}', function($name='Luong Xuan Hieu', $mssv='123456'){
    return view('sinhvien.gioithieu', ['name' => $name], ['mssv' => $mssv]);
});

route::get('/banco/{n?}', function($n=5){
    return view ('banco.ban', ['n' => $n]);
});



route::get('/admin', function ()
{
    return view('layout.admin');
});


route::fallback(function (){
    return view('error.404');
});
