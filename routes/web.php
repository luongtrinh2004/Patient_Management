<?php

use App\Http\Controllers\PatientController;



Route::get('/patients', [PatientController::class, 'index']);



Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
Route::put('/patients/{id}', [PatientController::class, 'update'])->name('patients.update');
Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('patients.destroy');



Route::get('/', function () {
    return view('home'); // Trang Home
});

Route::get('/doctors', function () {
    return view('doctors'); // Trang Doctors
});

Route::get('/about', function () {
    return view('about'); // Trang About Us
});

Route::get('/contact', function () {
    return view('contact'); // Trang Contact
});