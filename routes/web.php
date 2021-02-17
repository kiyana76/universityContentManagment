<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminAuthController;
use \App\Http\Controllers\Admin\{DashboardController, GlobalGroupController, GlobalFieldController};

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

    Route::middleware('admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('groups', GlobalGroupController::class)->except(['show']);
        Route::resource('fields', GlobalFieldController::class)->except(['show']);
    });
});

Auth::routes();

Route::get('home', function () {
   dd('کاربر ساخته شد.');
});
