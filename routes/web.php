<?php

use App\Http\Controllers\car_controller;
use App\Http\Controllers\customerController;
use App\Http\Controllers\rentPurchaseController;
use App\Http\Controllers\ArduinoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cars', [car_controller::class, 'index'])->name('cars_section');
Route::get('/add_new_car', [car_controller::class, 'new'])->name('add_new_car');
Route::post('/add_new_car', [car_controller::class, 'create'])->name('new_car');
Route::get('/delete/{id}', [car_controller::class, 'delete'])->name('delete_car');
Route::get('/cars/edit/{id}', [car_controller::class, 'edit'])->name('edit_car');
Route::put('/cars/edit/{id}', [car_controller::class, 'update'])->name('update_car');
Route::get('/cars/search', [car_controller::class, 'search'])->name('search_car');
Route::get('/cars/show/{id}', [car_controller::class, 'show'])->name('show_car');

Route::get('/displayChart', [car_controller::class, 'displayChart'])->name('display_car');
Route::get('/showAvailCars', [car_controller::class, 'showAvailCars'])->name('showAvailCars');
Route::get('/customer/index', [customerController::class, 'index'])->name('index_customer');
Route::post('/customer/add', [customerController::class, 'add'])->name('add_customer');
Route::get('/customer/list', [customerController::class, 'list'])->name('customer_list');
Route::get('/customers/show_cars/{id}', [customerController::class, 'show_cars'])->name('show_cars');
Route::get('/rentPurchase/index', [rentPurchaseController::class, 'index'])->name('index_deal');
Route::get('/rentPurchase/sale', [rentPurchaseController::class, 'sale_index'])->name('sale_index');
Route::post('/rentPurchase/sold_out', [rentPurchaseController::class, 'sold_out'])->name('sold_out');
Route::get('/rentPurchase/rent_index', [rentPurchaseController::class, 'rent_index'])->name('rent_index');
Route::match(['get', 'post'], '/rentPurchase/rent_out', [rentPurchaseController::class, 'rent_out'])->name('rent_out');
Route::get('/arduino/{command}', [ArduinoController::class, 'sendCommand']);
