<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('frontend.home');


Route::get('/painel-cliente', function () {
    return to_route('filament.app.auth.login');
})->name('login');
