<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUpController;


Route::post('/customer-signup', [SignUpController::class, 'customerSignup']);
