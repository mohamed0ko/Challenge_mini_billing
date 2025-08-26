<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;


//customer

Route::get('/customer', [CustomerController::class, 'index'])->name('Customer.index');
Route::get('/create-customer', [CustomerController::class, 'create'])->name('Customers.create');
Route::post('/store-customer', [CustomerController::class, 'store'])->name('Customers.store');
Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('Customers.edit');
Route::put('/update-customer/{id}', [CustomerController::class, 'update'])->name('Customers.update');
Route::delete('/customer/{id}', [CustomerController::class, 'destroy'])->name('Customers.destroy');

//invoice

Route::get('/invoice', [InvoiceController::class, 'index'])->name('Invoices.index');
Route::get('/create-invoice', [InvoiceController::class, 'create'])->name('Invoices.create');
Route::post('/store-invoice', [InvoiceController::class, 'store'])->name('Invoices.store');
Route::get('/invoice/{id}/edit', [InvoiceController::class, 'edit'])->name('Invoices.edit');
Route::put('/update-invoice/{id}', [InvoiceController::class, 'update'])->name('Invoices.update');
Route::delete('/invoice/{id}', [InvoiceController::class, 'destroy'])->name('Invoices.destroy');
