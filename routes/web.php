<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin-manage'], function (){
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::namespace('Admin')->middleware('admin')->group(function () {
        Route::get('dashboard', function (){
            dd('وارد می‌شود');
        })->name('admin.dashboard');
    });
});

Auth::routes();

Route::get('home', function () {
   dd('کاربر ساخته شد.');
});
