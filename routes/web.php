<?php

use App\Http\Controllers\App\IndexController;
use Illuminate\Support\Facades\Route;



Route::get('/', [IndexController::class, 'index'])->name('frontend.home');

//
//Route::fallback(function () {
//     return redirect('/app/login');
//});
