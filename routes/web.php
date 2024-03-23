<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('admin.dashboard.dashboard');
})->name('frontend.home');


Route::fallback(function () {
     return redirect('/app');
});
