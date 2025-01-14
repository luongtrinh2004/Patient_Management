<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Patient;


class AdminController extends Controller
{
    public function showAppointments()
    {
        // Lấy tất cả lịch hẹn cùng thông tin bác sĩ và bệnh nhân
        $appointments = Appointment::with(['doctor'])->get();
        return view('role.manageappointments', compact('appointments'));
    }

    public function approveAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 'approved']); // Duyệt lịch hẹn
        return redirect()->back()->with('success', 'Lịch hẹn đã được duyệt.');
    }

    public function rejectAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 'rejected']); // Từ chối lịch hẹn
        return redirect()->back()->with('success', 'Lịch hẹn đã bị từ chối.');
    }

    public function deleteAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->back()->with('success', 'Lịch hẹn đã được xóa.');
    }
}

class DoctorController extends Controller
{
    public function showSchedule()
    {
        $doctorId = auth()->id(); // Lấy ID của bác sĩ đang đăng nhập

        // Chỉ hiển thị các lịch hẹn đã được duyệt
        $appointments = Appointment::where('doctor_id', $doctorId)
            ->where('status', 'approved')
            ->get();

        return view('role.schedule', compact('appointments'));
    }
}

class AppointmentController extends Controller
{
    public function create()
    {
        $doctors = Doctor::all(); // Lấy tất cả bác sĩ để hiển thị
        return view('appointmentcreate', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'age' => 'required|integer|min:1',
            'cccd' => 'required|string|max:20',
            'appointment_date' => 'required|date|after:today',
            'description' => 'nullable|string|max:500',
        ]);

        Appointment::create([
            'doctor_id' => $request->doctor_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
            'cccd' => $request->cccd,
            'appointment_date' => $request->appointment_date,
            'description' => $request->description,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Đặt lịch thành công. Vui lòng chờ phê duyệt.');
    }
}

// Update view "manageappointments.blade.php"
// Add delete button:


// Update web.php