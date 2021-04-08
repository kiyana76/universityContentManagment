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
    ResourceController,
    PermissionController,
    RoleController};
use App\Http\Controllers\Auth\{ForgotPasswordController,
    RegisterController,
    LoginController,
    ResetPasswordController};
use App\Http\Controllers\Guest\{HomeController,
    NoteController AS GuestNoteController,
    BookController AS GuestBookController,
    ExamController AS GuestExamController,
    QuestionController AS GuestQuestionController,};

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

//Admin Routs
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
        Route::resource('permissions', PermissionController::class)->except(['show']);
        Route::resource('roles', RoleController::class)->except(['show']);
        Route::post('resource/upload/{resource}', [ResourceController::class, 'uploadFile'])->name('admin.resource.upload');
        Route::delete('resource/upload/{file}', [ResourceController::class, 'deleteFile'])->name('admin.resource.delete');

        //captcha
        Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha']);

        //users-roles
        Route::get('all-users', [RoleController::class, 'allUsers'])->name('all-users');
        Route::get('assign-role/{user}', [RoleController::class, 'editUserRole'])->name('editUserRole');
        Route::post('assign-role/{user}', [RoleController::class, 'updateUserRole'])->name('updateUserRole');
    });
});

//Login Register Routs
Route::group(['namespace' => 'Auth'], function () {
    //register
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    //login
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    //logout
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    //reset password
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    //verify email
    Route::get('verify/{token}', [RegisterController::class, 'verifyEmail'])
        ->where(['token' => '([a-zA-Z0-9]{16})'])
        ->name('verify');
    Route::post('send/verify-email', [RegisterController::class, 'sendVerifyEmail'])->name('send.verify.email');
});

//Guest Routs
Route::group(['namespace' => 'Guest'], function () {
   Route::get('/', [HomeController::class, 'index'])->name('home');

   //Notes
    Route::get('/notes/{noteSlug}', [GuestNoteController::class, 'single'])->name('note');
    Route::get('/notes', [GuestNoteController::class, 'list'])->name('notes');

    //Book
    Route::get('/books/{bookSlug}', [GuestBookController::class, 'single'])->name('book');
    Route::get('/books', [GuestBookController::class, 'list'])->name('books');

    //Exam
    Route::get('/exams/{examSlug}', [GuestExamController::class, 'single'])->name('exam');
    Route::get('/exams', [GuestExamController::class, 'list'])->name('exams');

    //Question
    Route::get('/questions/{questionSlug}', [GuestQuestionController::class, 'single'])->name('question');
    Route::get('/questions', [GuestQuestionController::class, 'list'])->name('questions');

});
