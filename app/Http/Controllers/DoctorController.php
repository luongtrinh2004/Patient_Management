<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor; // Import model Doctor

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all(); // Lấy tất cả bác sĩ từ database
        return view('doctors', compact('doctors'));
    }
}