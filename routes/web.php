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
        Route::get('/', 'index') -> middleware(CheckTimeAccess::class);
        Route::post('/checkLogin', 'checkLogin');
        Route::post('/registerRequest', 'registerRequest');
        Route::get('/age', 'age') -> name('product.age');
        Route::post('/checkAge', 'checkAge')->middleware(CheckAge::class); 

        Route::middleware(CheckSessionAge::class)->group(function(){
            Route::controller(ProductController::class)->group(function(){
            Route::get('/add', 'create')->name('add') -> middleware(CheckTimeAccess::class);
            Route::get('/detail/{id?}','get') -> middleware(CheckTimeAccess::class);
            Route::get('/detail/{id?}','get') -> middleware(CheckTimeAccess::class);
            });
        });

    });
});


route::get('/sinhvien/{name?}/{mssv?}', function($name='Luong Xuan Hieu', $mssv='123456'){
    return view('sinhvien.gioithieu', ['name' => $name], ['mssv' => $mssv]);
});

route::get('/banco/{n?}', function($n=5){
    return view ('banco.ban', ['n' => $n]);
});

route::resource('test', TestController::class);

route::fallback(function (){
    return view('error.404');
});
