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

   

    public function adminIndex()
{
    $doctors = Doctor::all();
    return view('role.adminfixdoctors', compact('doctors'));

}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:doctors',
        'password' => 'required|string|min:8',
        'specialty' => 'required|string',
    ]);

    Doctor::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'specialty' => $request->specialty,
    ]);

    return redirect()->back()->with('success', 'Bác sĩ được thêm thành công!');
}

public function update(Request $request, $id)
{
    $doctor = Doctor::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email',
        'specialty' => 'required|string',
    ]);

    $doctor->update($request->all());
    return redirect()->back()->with('success', 'Bác sĩ được cập nhật thành công!');
}

public function destroy($id)
{
    $doctor = Doctor::findOrFail($id);
    $doctor->delete();

    return redirect()->back()->with('success', 'Bác sĩ được xóa thành công!');
}

public function showSchedule()
{
    $appointments = Appointment::where('doctor_id', auth()->id())
        ->with('patient')
        ->orderBy('appointment_date', 'asc')
        ->get();

    return view('role.schedule', compact('appointments'));
}



}