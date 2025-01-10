<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


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

// Route cho Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('role.admin');
    });
});

// Route cho AdminDoctor
Route::middleware(['auth', 'role:admindoctor'])->group(function () {
    Route::get('/admindoctor/dashboard', function () {
        return view('role.admindoctor');
    });
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
Route::get('/admin', function () {
    return view('admin'); // Hiển thị file admin.blade.php
});





Auth::routes();

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin/dashboard', function () {
        return view('role.admin');
    });
});

Route::group(['middleware' => ['auth', 'role:admindoctor']], function () {
    Route::get('/admindoctor/dashboard', function () {
        return view('role.admindoctor');
    });
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');