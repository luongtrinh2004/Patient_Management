<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor; // Import model Doctor
use App\Models\Appointment;

class DoctorController extends Controller
{
    /**
     * Hiển thị danh sách tất cả bác sĩ.
     */
    public function index()
    {
        $doctors = Doctor::all(); // Lấy tất cả bác sĩ từ database
        return view('doctors', compact('doctors'));
    }

    /**
     * Hiển thị danh sách bác sĩ cho admin.
     */
    public function adminIndex()
    {
        $doctors = Doctor::all();
        return view('role.adminfixdoctors', compact('doctors'));
    }

    /**
     * Thêm một bác sĩ mới.
     */
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

        return redirect()->back()->with('success', 'Bác sĩ đã được thêm thành công!');
    }

    /**
     * Cập nhật thông tin bác sĩ.
     */
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:doctors,email,' . $id,
            'specialty' => 'required|string',
        ]);

        $doctor->update([
            'name' => $request->name,
            'email' => $request->email,
            'specialty' => $request->specialty,
        ]);

        return redirect()->back()->with('success', 'Bác sĩ đã được cập nhật thành công!');
    }

    /**
     * Xóa bác sĩ.
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->back()->with('success', 'Bác sĩ đã được xóa thành công!');
    }

    /**
     * Hiển thị lịch trình khám của bác sĩ.
     */
    public function showSchedule()
    {
        $appointments = Appointment::with(['patient', 'doctor'])
        ->where('doctor_id', auth()->id()) // Chỉ lấy lịch hẹn của bác sĩ đăng nhập
        ->where('status', 'approved') // Chỉ lấy lịch hẹn đã được duyệt
        ->get();

    return view('role.schedule', compact('appointments'));
    }
}