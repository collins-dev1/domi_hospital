<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Models\award;
use App\Models\departments;
use App\Models\doctor;
use App\Models\patient_served;
use App\Models\years_of_experience;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $countdoctor = doctor::count();
    $years = years_of_experience::first();
    $award = award::first();
    $served = patient_served::first();
    return view('index', compact('countdoctor', 'years', 'award', 'served'));
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
    $years = years_of_experience::first();
    $department = departments::first();
    return view('doctors', compact('doctors', 'countdoctor', 'years', 'department'));
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

Route::get('/blood_banking', function(){
    return view('services.blood_banking');
})->name('blood_banking');

Route::get('/immunization', function(){
    return view('services.immunization');
})->name('immunization');

Route::get('/antenatal_clinic', function(){
    return view('services.antenatal_clinic');
})->name('antenatal_clinic');

Route::get('/free_hiv_and_pregnancy_test', function(){
    return view('services.free_hiv_and_pregnancy_test');
})->name('free_hiv_and_pregnancy_test');

Route::get('/24_hours_emergency_clinic', function(){
    return view('services.24_hours_emergency_clinic');
})->name('24_hours_emergency_clinic');

Route::get('/drug_dispensary', function(){
    return view('services.drug_dispensary');
})->name('drug_dispensary');

Route::get('/consultations', function(){
    return view('services.consultations');
})->name('consultations');

Auth::routes();
Route::post('create_info', [AdminController::class, 'create_info'])->name('create_info');

Route::get('/dashboards', [App\Http\Controllers\HomeController::class, 'redirect'])->name('dashboards');

// User Middleware Group
Route::middleware([UserMiddleware::class])->group(function(){
// User Routes
Route::get('appointments', [UserController::class, 'appointments'])->name('appointments');
Route::post('add_appointment', [UserController::class, 'add_appointment'])->name('add_appointment');
Route::get('delete_appointments/{id}', [UserController::class, 'delete_appointments'])->name('delete_appointments');
Route::get('edit_appointment/{id}', [UserController::class, 'edit_appointment'])->name('edit_appointment');
Route::post('update_appointment/{id}', [UserController::class, 'update_appointment'])->name('update_appointment');
Route::get('health_card', [UserController::class, 'health_card'])->name('health_card');
Route::post('create_health_card', [UserController::class, 'create_health_card'])->name('create_health_card');
Route::get('edit_card/{id}', [UserController::class, 'edit_card'])->name('edit_card');
Route::post('update_card/{id}', [UserController::class, 'update_card'])->name('update_card');
Route::get('delete_cards/{id}', [UserController::class, 'delete_cards'])->name('delete_cards');
Route::get('payment_option', [UserController::class, 'payment_option'])->name('payment_option');
Route::get('user_profile', [UserController::class, 'user_profile'])->name('user_profile');
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
Route::get('contact_information', [AdminController::class, 'contact_information'])->name('contact_information');
Route::get('delete_info/{id}', [AdminController::class, 'delete_info'])->name('delete_info');
Route::get('years', [AdminController::class, 'years'])->name('years');
Route::post('create_years', [AdminController::class, 'create_years'])->name('create_years');
Route::get('delete_years/{id}', [AdminController::class, 'delete_years'])->name('delete_years');
Route::get('award', [AdminController::class, 'award'])->name('award');
Route::post('create_award', [AdminController::class, 'create_award'])->name('create_award');
Route::get('delete_award/{id}', [AdminController::class, 'delete_award'])->name('delete_award');
Route::get('department', [AdminController::class, 'department'])->name('department');
Route::post('create_department', [AdminController::class, 'create_department'])->name('create_department');
Route::get('delete_department/{id}', [AdminController::class, 'delete_department'])->name('delete_department');
Route::get('served', [AdminController::class, 'served'])->name('served');
Route::post('create_served', [AdminController::class, 'create_served'])->name('create_served');
Route::get('delete_served/{id}', [AdminController::class, 'delete_served'])->name('delete_served');
Route::get('admin_profile', [AdminController::class, 'admin_profile'])->name('admin_profile');
Route::post('update_pic/{id}', [AdminController::class, 'update_pic'])->name('update_pic');
Route::post('delete_pics', [AdminController::class, 'delete_pics'])->name('delete_pics');
});
