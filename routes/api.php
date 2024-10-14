<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;
Route::group(['middleware' => ['web']], function () {
    Route::post('/checkout', [StripeController::class, 'checkout'])->name('checkout');

Route::get('/checkout/success', [StripeController::class, 'checkoutSuccess'])->name('checkout.success');


Route::get('/checkout/cancel', function () {
    return 'Payment canceled!';
})->name('checkout.cancel');

});