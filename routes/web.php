<?php

use App\Http\Controllers\DepositController;
use App\Http\Controllers\StatementController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\WithdrawController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('terms-and-policy', function(){
    return view('terms-and-policy');
})->name('terms-and-policy');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('deposits', DepositController::class);
    Route::resource('withdrawns', WithdrawController::class);
    Route::resource('transfers', TransferController::class);
    Route::resource('statements', StatementController::class);
});
