

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::post('/store-customer', [CustomerController::class, 'store'])->name('api.customer.store');
