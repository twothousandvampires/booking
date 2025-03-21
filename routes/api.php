<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('resources', ResourceController::class);

Route::apiResource('bookings', BookingController::class);
Route::get('resources/{id}/bookings', [BookingController::class, 'getBookingsByResourceId']);



