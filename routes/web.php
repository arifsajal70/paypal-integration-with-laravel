<?php

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

Route::get('/', function () { return view('payment'); });

Route::post('submit-payment','PaypalPaymentController@payment')->name('payWithPaypal');
Route::get('payment-success','PaypalPaymentController@success')->name('paymentSuccess');
Route::get('payment-cancel','PaypalPaymentController@cancel')->name('paymentCanceled');
