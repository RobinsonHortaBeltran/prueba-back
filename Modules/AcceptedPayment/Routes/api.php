<?php

use Illuminate\Support\Facades\Route;
use Modules\AcceptedPayment\Http\Controllers\AcceptedPaymentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('accepted-payments', AcceptedPaymentController::class);
