<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('recommendation-engine', function () {
    return view('recommendation-engine');
})->name('recommendation');

Route::get('form', function () {
    return view('form');
})->name('form');
