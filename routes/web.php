<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// Trang chủ
Route::get('/', function () {
    return view('home'); // Trang Home
})->name('home');

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Routes cho bệnh nhân
Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
    Route::get('/appointments', [PatientController::class, 'appointments'])->name('patients.appointments');
    Route::post('/appointments', [PatientController::class, 'bookAppointment'])->name('patients.book');
});

// Routes cho Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('role.admin');
    })->name('admin.dashboard');

    Route::get('/admin/doctors', [AdminController::class, 'showDoctors'])->name('admin.doctors.index');
    Route::post('/admin/doctors', [AdminController::class, 'storeDoctor'])->name('admin.doctors.store');
    Route::get('/admin/doctors/{id}/edit', [AdminController::class, 'editDoctor'])->name('admin.doctors.edit');
    Route::post('/admin/doctors/{id}/update', [AdminController::class, 'updateDoctor'])->name('admin.doctors.update');
    Route::delete('/admin/doctors/{id}', [AdminController::class, 'destroyDoctor'])->name('admin.doctors.destroy');
});

// Route cho AdminDoctor
Route::middleware(['auth', 'role:admindoctor'])->group(function () {
    Route::get('/admindoctor/dashboard', function () {
        return view('role.admindoctor');
    })->name('admindoctor.dashboard');
});

// Routes chung
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('/about', function () {
    return view('about'); // Trang About Us
})->name('about');

Route::get('/contact', function () {
    return view('contact'); // Trang Contact
})->name('contact');

// Home Route sau khi đăng nhập
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');