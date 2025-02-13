<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;


Route::get('/login', [FrontendController::class, 'customerLoginPage']);

Route::post('/customer-signup', [CustomerController::class, 'customerSignup']);
Route::post('/customer-login', [CustomerController::class, 'customerLogin']);
Route::get('/get-customer', [CustomerController::class, 'getCustomer']);

Route::post('/create-client', [ClientController::class, 'createClient'])->middleware('verify');
Route::post('/update-client', [ClientController::class, 'updateClient'])->middleware('verify');
Route::post('/delete-client', [ClientController::class, 'deleteClient'])->middleware('verify');
Route::get('/get-clients', [ClientController::class, 'getClients'])->middleware('verify');
Route::post('/client-info', [ClientController::class, 'clientInfo'])->middleware('verify');

Route::post('/create-service', [ServiceController::class, 'createService'])->middleware('verify');
Route::post('/update-service', [ServiceController::class, 'updateService'])->middleware('verify');
Route::post('/delete-service', [ServiceController::class, 'deleteService'])->middleware('verify');
Route::get('/get-services', [ServiceController::class, 'getServices'])->middleware('verify');
Route::post('/service-info', [ServiceController::class, 'serviceInfo'])->middleware('verify');

Route::post('/create-method', [PaymentMethodController::class, 'createMethod'])->middleware('verify');
Route::post('/update-method', [PaymentMethodController::class, 'updateMethod'])->middleware('verify');
Route::post('/delete-method', [PaymentMethodController::class, 'deleteMethod'])->middleware('verify');
Route::get('/get-methods', [PaymentMethodController::class, 'getMethods'])->middleware('verify');
Route::post('/method-info', [PaymentMethodController::class, 'methodInfo'])->middleware('verify');

Route::post('/create-invoice', [InvoiceController::class, 'createInvoice'])->middleware('verify');
Route::post('/update-invoice', [InvoiceController::class, 'updateInvoice'])->middleware('verify');
Route::post('/delete-invoice', [InvoiceController::class, 'deleteInvoice'])->middleware('verify');
Route::get('/get-invoices', [InvoiceController::class, 'getInvoices'])->middleware('verify');
Route::post('/invoice-info', [InvoiceController::class, 'invoiceInfo'])->middleware('verify');

Route::get('/dashboard', [DashboardController::class, 'dashboardPage'])->middleware('verify');
Route::get('/clients', [DashboardController::class, 'clientPage'])->middleware('verify');
Route::get('/services', [DashboardController::class, 'servicePage'])->middleware('verify');