<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontsiteController;
use App\Http\Controllers\ArtController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route untuk frontsite
Route::get('/', [FrontsiteController::class, 'home'])->name('home');
Route::get('/contact', [FrontsiteController::class, 'contact'])->name('contact');
Route::get('/posts/{slug}', [FrontsiteController::class, 'show'])->name('ShowPost');
Route::get('/art/teater', [ArtController::class, 'teater'])->name('Teater');


// Route untuk backsite/dashboard dengan ketentuan user harus login terlebih dahulu
Route::group(['middleware' => 'auth'], function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('post', PostController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('user', UserController::class);
    // create user get setting-account
    Route::get('setting-account', [UserController::class, 'settingAccount'])->name('SettingAccount');
    // update user post setting-account
    Route::put('setting-account', [UserController::class, 'updateSettingAccount'])->name('UpdateSettingAccount');

});
