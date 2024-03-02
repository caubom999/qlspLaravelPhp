<?php

use App\Http\Controllers\Admin\Users\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\UploadController;


Route::get('admin/users/login',[LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store',[LoginController::class, 'store']);

Route::get('register',[\App\Http\Controllers\Admin\RegisterController::class,'register'])->name('register');
Route::post('register',[\App\Http\Controllers\Admin\RegisterController::class,'Acregister']);

//Route::post('upload/services', [UploadController::class, 'store']);

//Route::get('upload',[\App\Http\Controllers\Admin\TestController::class,'index']);
//Route::post('uploads/service',[\App\Http\Controllers\Admin\TestController::class,'store']);
//Route::prefix('admins')->group(function (){
//    Route::post('upload/services', [UploadController::class, 'store']);
//});

//check neu chua dang nhap thi phai dang nhap moi vao dc trang admin
Route::middleware(['auth'])->group(function()
    {
        Route::prefix('admin')->group(function (){

            Route::get('/',[MainController::class,'index'])->name('admin');
            Route::get('main',[MainController::class,'index']);


            Route::prefix('menus')->group(function (){
                Route::get('add', [MenuController::class,'create']);
                Route::post('add', [MenuController::class,'store']);
                Route::get('list',[MenuController::class,'listview']);
                Route::DELETE('destroy',[MenuController::class,'destroy']);
                Route::get('edit/{menu}',[MenuController::class,'show']);
                Route::post('edit/{menu}',[MenuController::class,'update']);
            });

            Route::prefix('products')->group(function (){
                Route::get('add/prd',[\App\Http\Controllers\Admin\ProductsController::class, 'create'])->name('add');
                Route::post('add/prd',[\App\Http\Controllers\Admin\ProductsController::class,'store']);
                Route::get('list',[\App\Http\Controllers\Admin\ProductsController::class,'index'])->name('list');
                Route::get('edit/{product}',[\App\Http\Controllers\Admin\ProductsController::class,'show']);
                Route::post('edit/{product}',[\App\Http\Controllers\Admin\ProductsController::class,'update']);
                Route::DELETE('destroy',[\App\Http\Controllers\Admin\ProductsController::class,'destroy']);

            });

            //upload
                 Route::post('upload/services', [UploadController::class, 'store']);
        });



    }
);

