<?php

use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Manager\CategoryTableController;
use App\Http\Controllers\Manager\DishController;
use App\Http\Controllers\Manager\OrderController;
use App\Http\Controllers\Manager\TableController;
use App\Http\Controllers\Manager\UserController;

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
    Route::get('timeform', [ReservationController::class, 'timeForm'])->name('time.get')->middleware('auth');
    Route::post('post-time', [ReservationController::class, 'postTime'])->name('time.post')->middleware('auth');
    Route::group(['prefix' => 'reservation', 'middleware' => 'CheckReservation'], function () {
        Route::get('list-table', [ReservationController::class, 'getTables'])->name('tables.get');
        Route::get('/detail-table/{id}', [ReservationController::class, 'detailTable'])->name('table.detail');
        Route::get('/cart', [ReservationController::class, 'getCart'])->name('cart.get');
        Route::get('/add-table', [ReservationController::class, 'addCartTable'])->name('cart.table.add');
        Route::get('/add-dish', [ReservationController::class, 'addCartDish'])->name('cart.dish.add')
            ->middleware('CheckTable');
        Route::get('remove-cart-dish/{id}', [ReservationController::class, 'removeCartDish'])
            ->name('cart.dish.remove');
        Route::get('update-cart-dish/{rowId}/{qty}', [ReservationController::class, 'updateCartDish'])
            ->name('cart.dish.update');
        Route::get('remove-cart-table/{id}', [ReservationController::class, 'removeCartTable'])
            ->name('cart.table.remove');
        Route::get('checkout', [ReservationController::class, 'checkoutGet'])->name('checkout.get');
        Route::get('complete', [ReservationController::class, 'complete'])->name('complete.get');
    });
});

Route::group([
    'prefix' => 'manager',
    'middleware' => 'CheckRole:' . config('restaurant.role_user.manager') . ',' . config('restaurant.role_user.admin')
], function () {
    Route::resource('categories', CategoryTableController::class);
    Route::resource('tables', TableController::class);
    Route::resource('dishes', DishController::class);
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        Route::get('accept-order/{id}', [OrderController::class, 'acceptOrder'])->name('orders.accept');
        Route::get('delete-order/{id}', [OrderController::class, 'deleteOrder'])->name('orders.delete');
        Route::get('/accept-orders', [OrderController::class, 'getAcceptOrders'])->name('orders.accept.get');
        Route::get('/bill/{id}', [OrderController::class, 'getBill'])->name('bill.get');
        Route::post('/post-bill/{id}', [OrderController::class, 'postBill'])->name('bill.post');
        Route::get('get-time', [OrderController::class, 'getTime'])->name('order.add.time.get');
        Route::post('post-time', [OrderController::class, 'postTime'])->name('order.add.time.post');
        Route::get('add-order', [OrderController::class, 'addOrder'])->name('order.add');
        Route::post('post-add-order', [OrderController::class, 'postAddOrder'])->name('order.add.post');
        Route::get('get-edit-time/{id}', [OrderController::class, 'getEditTime'])->name('order.edit.time.get');
        Route::post('post-edit-time', [OrderController::class, 'postEditTime'])->name('order.edit.time.post');
        Route::get('edit-time/{id}', [OrderController::class, 'editOrder'])->name('order.edit');
        Route::post('post-edit-order/{id}', [OrderController::class, 'postEditOrder'])->name('order.edit.post');
    });
    Route::group([
        'prefix' => 'users',
        'middleware' => 'CheckRole:' . config('restaurant.role_user.admin')
    ], function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('block/{id}', [UserController::class, 'blockUser'])->name('users.block');
        Route::get('unblock/{id}', [UserController::class, 'unBlockUser'])->name('users.unblock');
    });
});
