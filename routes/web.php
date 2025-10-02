<?php

use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\ClientReservationController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/cliente/login', [ClientAuthController::class, 'showLoginForm'])->name('client.login');
Route::post('/cliente/login', [ClientAuthController::class, 'login'])->name('client.login.attempt');
Route::post('/cliente/logout', [ClientAuthController::class, 'logout'])->name('client.logout');

Route::middleware('auth:clients')->name('client.')->prefix('cliente')->group(function () {
    Route::get('/reservas', [ClientReservationController::class, 'index'])->name('reservations.index');
    Route::post('/reservas', [ClientReservationController::class, 'store'])->name('reservations.store');
});

Route::view('/admin/login', 'admin.login');
