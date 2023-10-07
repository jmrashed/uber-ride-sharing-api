<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RideController;
use App\Http\Controllers\API\TripController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\DriverController;
use App\Http\Controllers\API\RatingController;
use App\Http\Controllers\API\BookingController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\LocationController;
use App\Http\Controllers\API\NotificationController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('drivers', DriverController::class);
    Route::apiResource('rides', RideController::class);
    Route::apiResource('bookings', BookingController::class);
    Route::apiResource('trips', TripController::class);
    Route::apiResource('ratings', RatingController::class);
    Route::apiResource('payments', PaymentController::class);
    Route::apiResource('notifications', NotificationController::class);
    Route::apiResource('locations', LocationController::class);
});
