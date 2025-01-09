<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminController;


// Trang chủ
Route::get('/', function () {
    return view('welcome');
});

// Routes cho bệnh nhân
Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/patients', [PatientController::class, 'index']);
    Route::get('/appointments', [PatientController::class, 'appointments']);
    Route::post('/appointments', [PatientController::class, 'bookAppointment']);
});

// Routes cho bác sĩ
Route::middleware(['auth', 'role:doctor'])->group(function () {
    Route::get('/doctors', [DoctorController::class, 'index']);
    Route::get('/schedule', [DoctorController::class, 'schedule']);
});

// Routes cho admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/admin/manage-users', [AdminController::class, 'manageUsers']);
    Route::get('/admin/manage-appointments', [AdminController::class, 'manageAppointments']);
});

Route::get('/', function () {
    return view('home'); // Trang Home
});



Route::get('/doctors', [DoctorController::class, 'index']);


Route::get('/about', function () {
    return view('about'); // Trang About Us
});

Route::get('/contact', function () {
    return view('contact'); // Trang Contact
});