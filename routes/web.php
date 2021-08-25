<?php

use App\Http\Controllers\Customer\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LanguageController;

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

Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('CheckLogout');
Route::post('post-login', [LoginController::class, 'postLogin'])->name('login.post');
Route::get('registration', [LoginController::class, 'registration'])->name('register');
Route::post('post-registration', [LoginController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/language/{lang}', [LanguageController::class, 'changeLanguage'])->name('change-language');
Route::group(['prefix' => 'home'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/dishes', [HomeController::class, 'dish'])->name('dishes');
});
