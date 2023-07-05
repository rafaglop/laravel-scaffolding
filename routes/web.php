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

// Public routes
Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('home');

// Dashboard routes
include_once('dashboard.php');
