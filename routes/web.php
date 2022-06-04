<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

// Home
Route::get('/',[DashboardController::class, 'getHomePage'])->name('getHome');
Route::get('/register-page',[DashboardController::class, 'getRegisterPage'])->name('getRegister');
Route::get('/login-page',[DashboardController::class, 'getLoginPage'])->name('getLogin');
Route::get('/product-detail/{id}',[DashboardController::class, 'getProductPage'])->name('getProduct');

// USER
Route::group(['middleware'=>'RoleUser'], function(){
    Route::get('/user/product-detail/{id}',[TransactionController::class, 'getOrderPage'])->name('getOrder');
    Route::post('/user/product-detail/{id}',[TransactionController::class,'storeTransaction'])->name('storeTransaction');

    Route::get('/user/faktur',[TransactionController::class,'getTransaction'])->name('getFaktur');
});

// ADMIN
Route::group(['middleware'=>'RoleAdmin'], function(){
    Route::get('/admin/manage',[AdminController::class,'getManagePage'])->name('getManage');

    Route::get('/admin/create',[AdminController::class,'getCreatePage'])->name('getCreate');
    Route::post('/admin/create',[BarangController::class,'addBarang'])->name('addBarang');

    Route::get('/admin/edit/{id}',[BarangController::class, 'getUpdateBarang'])->name('getUpdate');
    Route::patch('/admin/edit/{id}',[BarangController::class,'updateBarang'])->name('updateBarang');

    Route::delete('/admin/delete/{id}',[BarangController::class, 'deleteBarang'])->name('deleteBarang');

    Route::get('/admin/manage/pesanan',[AdminController::class,'adminTransaction'])->name('manageTransaction');
    Route::patch('/admin/manage/pesanan/{id}',[AdminController::class,'updateTransaction'])->name('updateTransaction');
});
