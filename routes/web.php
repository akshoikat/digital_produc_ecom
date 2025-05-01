<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;




use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TranjectionController as AdminTranjection;
use App\Http\Controllers\Admin\MoneyExchangeController;

Route::get('/',[HomeController::class,'index'])->name('home'); 

Route::get('exchanege', [MoneyExchangeController::class, 'index'])->name('money.exchange');



Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');


Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::resource('banners', BannerController::class);
    Route::resource('features', FeatureController::class);
    Route::resource('games', GameController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('tranjection', AdminTranjection::class);

});











//customer dashboard
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
});
