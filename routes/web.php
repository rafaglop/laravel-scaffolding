<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GigyaController;
use App\Http\Controllers\CustomerController;


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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
|************************************************
|    Rutas clientes
|************************************************
*/


Route::prefix('customer')->middleware(['auth'])->group(function () {

    Route::get('dashboard', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('pincode', [CustomerController::class, 'usePincode'])->name('customer.pincode.use');
});

/*
|************************************************
|    Gigya
|************************************************
*/

Route::post('gigya/user-verification', [GigyaController::class, 'userVerification'])->name('gigya.user-verification');
