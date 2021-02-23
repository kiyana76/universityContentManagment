<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\{BookController,
    CaptchaServiceController,
    DashboardController,
    ExamController,
    GlobalGroupController,
    GlobalFieldController,
    NoteController,
    QuestionController,
    ResourceController};

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
        Route::resource('notes', NoteController::class)->except(['show']);
        Route::resource('questions', QuestionController::class)->except(['show']);
        Route::resource('books', BookController::class)->except(['show']);
        Route::resource('exams', ExamController::class)->except(['show']);
        Route::post('resource/upload/{resource}', [ResourceController::class, 'uploadFile'])->name('admin.resource.upload');
        Route::delete('resource/upload/{file}', [ResourceController::class, 'deleteFile'])->name('admin.resource.delete');

        //captcha
        Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha']);
    });
});

Auth::routes();

Route::get('home', function () {
   dd('کاربر ساخته شد.');
});
