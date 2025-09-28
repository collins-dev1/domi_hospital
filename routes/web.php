<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Models\doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/about_us', function(){
    $doctors = doctor::all();
    return view('about', compact('doctors'));
})->name('about');

Route::get('/contact_us', function(){
    return view('contact');
})->name('contact_us');

Route::get('/services', function(){
    return view('services');
})->name('services');

Route::get('doctors', function(){
    $doctors = doctor::all();
    $countdoctor = doctor::count();
    return view('doctors', compact('doctors', 'countdoctor'));
})->name('doctors');

Route::get('/pediatrics', function(){
    return view('services.pediatrics');
})->name('pediatrics');

Route::get('/geriatrics', function(){
    return view('services.geriatrics');
})->name('geriatrics');

Route::get('/eye_clinic', function(){
    return view('services.eye_clinic');
})->name('eye_clinic');

Route::get('/lab', function(){
    return view('services.lab');
})->name('lab');

Route::get('/ultrasound', function(){
    return view('services.ultrasound');
})->name('ultrasound');

Auth::routes();

Route::get('/dashboards', [App\Http\Controllers\HomeController::class, 'redirect'])->name('dashboards');

// User Middleware Group
Route::middleware([UserMiddleware::class])->group(function(){
// User Routes
Route::get('appointments', [UserController::class, 'appointments'])->name('appointments');
Route::post('add_appointment', [UserController::class, 'add_appointment'])->name('add_appointment');
Route::get('delete_appointment/{id}', [UserController::class, 'delete_appointment'])->name('delete_appointment');
Route::get('edit_appointment/{id}', [UserController::class, 'edit_appointment'])->name('edit_appointment');
Route::post('update_appointment/{id}', [UserController::class, 'update_appointment'])->name('update_appointment');
Route::get('health_card', [UserController::class, 'health_card'])->name('health_card');
Route::post('create_health_card', [UserController::class, 'create_health_card'])->name('create_health_card');
Route::get('edit_card/{id}', [UserController::class, 'edit_card'])->name('edit_card');
Route::post('update_card/{id}', [UserController::class, 'update_card'])->name('update_card');
Route::get('delete_cards/{id}', [UserController::class, 'delete_cards'])->name('delete_cards');
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
Route::get('health_cards', [AdminController::class, 'health_cards'])->name('health_cards');
Route::get('delete_card/{id}', [AdminController::class, 'delete_card'])->name('delete_card');
Route::get('approve_card/{id}', [AdminController::class, 'approve_card'])->name('approve_card');
Route::get('add_doctor', [AdminController::class, 'add_doctor'])->name('add_doctor');
Route::post('create_doctor', [AdminController::class, 'create_doctor'])->name('create_doctor');
Route::get('manage_doctors', [AdminController::class, 'manage_doctors'])->name('manage_doctors');
Route::get('edit_doctors/{id}', [AdminController::class, 'edit_doctors'])->name('edit_doctors');
Route::post('update_doctor/{id}', [AdminController::class, 'update_doctor'])->name('update_doctor');
Route::get('delete_doctor/{id}', [AdminController::class, 'delete_doctor'])->name('delete_doctor');
});
