<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('app.index');
})->name('frontend.home');


Route::fallback(function () {
     return redirect('/app');
});
