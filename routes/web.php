<?php

use App\Http\Controllers\LotteryController;
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

// Redirect to lottery
Route::get('/', function () {
    return redirect('lottery');
});

// Lottery
Route::get('lottery', [LotteryController::class, 'index'])
    ->middleware(['auth:sanctum', 'verified'])
    ->name('lottery');
