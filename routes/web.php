<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/about_us', function(){
    return view('about');
})->name('about');

Route::get('/contact_us', function(){
    return view('contact');
})->name('contact_us');

Route::get('/services', function(){
    return view('services');
})->name('services');

Route::get('doctors', function(){
    return view('doctors');
})->name('doctors');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
