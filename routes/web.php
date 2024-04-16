<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BazarController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\SurveyController;

use App\Http\Controllers\NoticeController;

Auth::routes(['register' => false]);
Route::get('/pdf/{id}', [App\Http\Controllers\ApplicantController::class, 'pdf'])->name('pdf');
Route::put('/status/{id}', [App\Http\Controllers\ApplicantController::class, 'status'])->name('status');

Route::get('/records', [App\Http\Controllers\HomeController::class, 'records'])->name('records');
Route::get('/apply', [App\Http\Controllers\HomeController::class, 'index'])->name('apply');
Route::post('/userRegistration', [App\Http\Controllers\HomeController::class, 'userRegistration'])->name('userRegistration');
Route::post('/userLogin', [App\Http\Controllers\HomeController::class, 'userLogin'])->name('userLogin');
Route::post('/findBazar', [App\Http\Controllers\HomeController::class, 'findBazar'])->name('findBazar');
Route::resource('applicant',ApplicantController::class)->names('applicant');

Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'pay'])->name('pay');
Route::post('/success', [App\Http\Controllers\PaymentController::class, 'success'])->name('success');
Route::post('/faild', [App\Http\Controllers\PaymentController::class, 'faild'])->name('faild');
Route::post('/cancel', [App\Http\Controllers\PaymentController::class, 'cancel'])->name('cancel');

Route::controller(AdminController::class)->group(function(){
    Route::get('/admin','adminLogin')->name('adminLogin');
});
Route::middleware('isAdmin')->prefix('admin')->group(function () {
    Route::resource('notice',NoticeController::class)->names('notice');
    Route::controller(AdminController::class)->group(function(){
        // Route::get('/','adminLogin')->name('adminLogin');
        Route::get('/dashboard','dashboard')->name('dashboard');
    });
    Route::get('/application/{id}', [App\Http\Controllers\ApplicantController::class, 'application'])->name('application');
    Route::get('/applicationList', [App\Http\Controllers\ApplicantController::class, 'applicationList'])->name('applicationList');
    Route::post('/statusChange', [App\Http\Controllers\ApplicantController::class, 'statusChange'])->name('statusChange');
    Route::resource('role',RoleController::class)->names('role');
    Route::resource('bazar',BazarController::class)->names('bazar');
    Route::resource('adminUser',AdminUserController::class)->names('adminUser');
    Route::resource('survey',SurveyController::class)->names('survey');
});
Route::get('/notices/{id}', [App\Http\Controllers\NoticeController::class, 'details'])->name('home.notice.details');
Route::get('/notices', [App\Http\Controllers\NoticeController::class, 'list'])->name('home.notice');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');