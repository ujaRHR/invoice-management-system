<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaymentMethodController;


Route::post('/customer-signup', [UserController::class, 'customerSignup']);
Route::post('/customer-login', [UserController::class, 'customerLogin']);

Route::post('/create-client', [ClientController::class, 'createClient']);
Route::post('/update-client', [ClientController::class, 'updateClient']);
Route::post('/delete-client', [ClientController::class, 'deleteClient']);
Route::get('/get-clients', [ClientController::class, 'getClients']);

Route::post('/create-service', [ServiceController::class, 'createService']);
Route::post('/update-service', [ServiceController::class, 'updateService']);
Route::post('/delete-service', [ServiceController::class, 'deleteService']);
Route::get('/get-services', [ServiceController::class, 'getServices']);

Route::post('/create-method', [PaymentMethodController::class, 'createMethod']);
Route::post('/update-method', [PaymentMethodController::class, 'updateMethod']);
Route::post('/delete-method', [PaymentMethodController::class, 'deleteMethod']);
Route::get('/get-methods', [PaymentMethodController::class, 'getMethods']);
