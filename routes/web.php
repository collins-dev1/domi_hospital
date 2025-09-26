<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
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

Route::get('/dashboards', [App\Http\Controllers\HomeController::class, 'redirect'])->name('dashboards');

// User Middleware Group
Route::middleware([UserMiddleware::class])->group(function(){
// User Routes
Route::get('appointments', [UserController::class, 'appointments'])->name('appointments');
Route::post('add_appointment', [UserController::class, 'add_appointment'])->name('add_appointment');
});

// Admin Middleware Group
Route::middleware([AdminMiddleware::class])->group(function(){
// Admin Routes
Route::get('patients', [AdminController::class, 'patients'])->name('patients');
Route::get('ban/{id}', [AdminController::class, 'ban'])->name('ban');
Route::get('unban/{id}', [AdminController::class, 'unban'])->name('unban');
Route::get('delete_patient/{id}', [AdminController::class, 'delete_patient'])->name('delete_patient');
Route::get('manage_appointments', [AdminController::class, 'manage_appointments'])->name('manage_appointments');
Route::get('delete_appointment/{id}', [AdminController::class, 'delete_appointment'])->name('delete_appointment');
Route::get('approve_appointment/{id}', [AdminController::class, 'approve_appointment'])->name('approve_appointment');
Route::get('cancel_appointment/{id}', [AdminController::class, 'cancel_appointment'])->name('cancel_appointment');
});
