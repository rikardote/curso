<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\UnitController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\SupplierController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AdminController::class)->group(function () {
   Route::get('/admin/logout','destroy')->name('admin.logout');
   Route::get('/admin/profile','Profile')->name('admin.profile');
   Route::get('/edit/profile','EditProfile')->name('edit.profile');
   Route::post('/store/profile','StoreProfile')->name('store.profile');
   Route::get('/change/password','ChangePassword')->name('change.password');
   Route::post('/store/password','UpdatePassword')->name('update.password');
});

Route::controller(SupplierController::class)->group(function () {
    Route::get('/supplier/all','SupplierAll')->name('supplier.all');
    Route::get('/supplier/add','SupplierAdd')->name('supplier.add');
    Route::get('/supplier/edit/{id}','SupplierEdit')->name('supplier.edit');
    Route::get('/supplier/delete/{id}','SupplierDelete')->name('supplier.delete');
    Route::post('/supplier/store','SupplierStore')->name('supplier.store');
    Route::post('/supplier/update','SupplierUpdate')->name('supplier.update');
 });

 Route::controller(CustomerController::class)->group(function () {
    Route::get('/customer/all','CustomerAll')->name('customer.all');
    Route::get('/customer/add','CustomerAdd')->name('customer.add');
    Route::get('/customer/edit/{id}','CustomerEdit')->name('customer.edit');
    Route::get('/customer/delete/{id}','CustomerDelete')->name('customer.delete');
    Route::post('/customer/store','CustomerStore')->name('customer.store');
    Route::post('/customer/update','CustomerUpdate')->name('customer.update');
 });

 Route::controller(UnitController::class)->group(function () {
    Route::get('/unit/all','UnitAll')->name('unit.all');
    Route::get('/unit/add','UnitAdd')->name('unit.add');
    Route::post('/unit/store','UnitStore')->name('unit.store');
    Route::get('/unit/edit/{id}','UnitEdit')->name('unit.edit');
    Route::get('/unit/delete/{id}','UnitDelete')->name('unit.delete');
    Route::post('/unit/update','UnitUpdate')->name('unit.update');

 });
 Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/all','CategoryAll')->name('category.all');
    Route::get('/category/add','CategoryAdd')->name('category.add');
    Route::post('/category/store','CategoryStore')->name('category.store');
    Route::get('/category/edit/{id}','CategoryEdit')->name('category.edit');
    Route::get('/category/delete/{id}','CategoryDelete')->name('category.delete');
    Route::post('/category/update','CategoryUpdate')->name('category.update');

 });
 Route::controller(ProductController::class)->group(function () {
    Route::get('/product/all','ProductAll')->name('product.all');
    Route::get('/product/add','ProductAdd')->name('product.add');
    Route::post('/product/store','ProductStore')->name('product.store');
    Route::get('/product/edit/{id}','ProductEdit')->name('product.edit');
    Route::get('/product/delete/{id}','ProductDelete')->name('product.delete');
    Route::post('/product/update','ProductUpdate')->name('product.update');

 });

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
