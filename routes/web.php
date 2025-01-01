<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DashboardController;


Route::post('/customer-signup', [CustomerController::class, 'customerSignup']);
Route::post('/customer-login', [CustomerController::class, 'customerLogin']);
Route::get('/get-customer', [CustomerController::class, 'getCustomer']);

Route::post('/create-client', [ClientController::class, 'createClient']);
Route::post('/update-client', [ClientController::class, 'updateClient']);
Route::post('/delete-client', [ClientController::class, 'deleteClient']);
Route::get('/get-clients', [ClientController::class, 'getClients']);
Route::get('/client-info', [ClientController::class, 'clientInfo']);

Route::post('/create-service', [ServiceController::class, 'createService']);
Route::post('/update-service', [ServiceController::class, 'updateService']);
Route::post('/delete-service', [ServiceController::class, 'deleteService']);
Route::get('/get-services', [ServiceController::class, 'getServices']);
Route::get('/service-info', [ServiceController::class, 'serviceInfo']);

Route::post('/create-method', [PaymentMethodController::class, 'createMethod']);
Route::post('/update-method', [PaymentMethodController::class, 'updateMethod']);
Route::post('/delete-method', [PaymentMethodController::class, 'deleteMethod']);
Route::get('/get-methods', [PaymentMethodController::class, 'getMethods']);
Route::get('/method-info', [PaymentMethodController::class, 'methodInfo']);

Route::post('/create-invoice', [InvoiceController::class, 'createInvoice']);
Route::post('/update-invoice', [InvoiceController::class, 'updateInvoice']);
Route::post('/delete-invoice', [InvoiceController::class, 'deleteInvoice']);
Route::get('/get-invoices', [InvoiceController::class, 'getInvoices']);
Route::get('/invoice-info', [InvoiceController::class, 'invoiceInfo']);

Route::get('/dashboard', [DashboardController::class, 'dashboardPage']);