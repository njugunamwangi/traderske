<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SiteController;
use App\Livewire\CreateOffer;
use App\Livewire\Offer;
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

Route::view('/history', 'history')->name('history');
Route::get('/offers', Offer::class)->name('offers');
Route::get('/create-offer', CreateOffer::class)->name('create-offer');
Route::get('/fund-account', [SiteController::class, 'fund_account'])->name('fund-account');

Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
