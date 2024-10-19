<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::post('/customer-signup', [UserController::class, 'customerSignup']);
Route::post('/customer-login', [UserController::class, 'customerLogin']);
