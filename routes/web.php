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
    Route::group(['prefix' => 'profile', ['middleware' => 'auth']], function () {
        Route::get('/', [HomeController::class, 'profile'])->name('profile');
        Route::put('/post-profile', [HomeController::class, 'postProfile'])->name('profile.post');
    });
    Route::group(['prefix' => 'dishes'], function () {
        Route::get('/dishes', [HomeController::class, 'dish'])->name('dishes');
        Route::get('/detail-dish/{id}', [HomeController::class, 'detailDish'])->name('dish.detail');
        Route::post('/comment-dish', [HomeController::class, 'postComment'])->name('dish.comment')->middleware('auth');
    });
});
