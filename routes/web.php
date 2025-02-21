<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('home');
});

Route::get('recommendation-engine', function () {
    return view('recommendation-engine');
})->name('recommendation');

Route::get('fraud-detection', function () {
    return view('fraud-detection');
})->name('fraud');

Route::get('form', function () {
    return view('personal-data.form');
})->name('form');

Route::get('experience', function () {
    return view('experience');
})->name('experience');

Route::get('/personal-data', [FormController::class, 'index'])->name('personal-data.index');
Route::post('/personal-data', [FormController::class, 'store'])->name('personal-data.store');