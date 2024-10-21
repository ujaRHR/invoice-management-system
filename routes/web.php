<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Models\Client;

Route::post('/customer-signup', [UserController::class, 'customerSignup']);
Route::post('/customer-login', [UserController::class, 'customerLogin']);

Route::post('/create-client', [ClientController::class, 'createClient']);
Route::post('/update-client', [ClientController::class, 'updateClient']);
Route::post('/delete-client', [ClientController::class, 'deleteClient']);
