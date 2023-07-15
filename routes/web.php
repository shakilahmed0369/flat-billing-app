<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\FlatBillingController;
use App\Http\Controllers\Admin\FlatController;
use App\Http\Controllers\ProfileController;
use App\Models\FlatBilling;
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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('dashboard', [AdminDashboardController::class, 'index']);

    // flat routes
    Route::resource('flat', FlatController::class);

    // flat billing routes
    Route::post('get-flats', [FlatBillingController::class, 'getFlats'])->name('get-flats');
    Route::get('estimate-unit', [FlatBillingController::class, 'CalculateEstimateUnit'])->name('estimate-unit');
    Route::resource('flat-billings', FlatBillingController::class);

});
