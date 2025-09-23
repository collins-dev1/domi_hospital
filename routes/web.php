<?php

use App\Http\Controllers\UserController;
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

Route::get('admin', function(){
    return view('layouts.admin_layout');
})->name('admin');

Auth::routes();

Route::get('/dashboards', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboards');

// User Routes
Route::get('appointments', [UserController::class, 'appointments'])->name('appointments');
