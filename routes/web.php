<?php

use App\Http\Controllers\VendorController;

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('vendors.index'));
Route::resource('vendors', VendorController::class)->except('show');