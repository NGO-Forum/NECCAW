<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NeccawConfirmationController;


Route::get(
    '/',
    [NeccawConfirmationController::class, 'index']
)->name('neccaw.index');

Route::get('/neccaw', [NeccawConfirmationController::class, 'form'])
    ->name('neccaw.form');

Route::post('/neccaw', [NeccawConfirmationController::class, 'store'])
    ->name('neccaw.store');

Route::view('/neccaw/thank-you', 'neccaw.thankyou')
    ->name('neccaw.thankyou');
