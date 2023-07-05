<?php
/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/
// Dashboard routes
Route::group(['prefix' => 'dashboard', 'middleware' => ['role:admin']], function () {
    Route::get('/', [App\Http\Controllers\Back\DashboardController::class, 'index'])->name('dashboard.index');
});
