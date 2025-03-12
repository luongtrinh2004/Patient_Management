<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use App\Models\DoctorSchedule;

class AdminController extends Controller
{
    public function showDoctors(Request $request)
    {
        $search = $request->input('search');
        $editDoctor = null;

        // Nếu có yêu cầu sửa bác sĩ
        if ($request->has('edit_id')) {
            $editDoctor = Doctor::find($request->input('edit_id'));
        }

        // Lọc danh sách bác sĩ theo từ khóa tìm kiếm
        $doctors = Doctor::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('specialty', 'like', "%{$search}%");
        })->get();

        return view('role.adminfixdoctors', compact('doctors', 'search', 'editDoctor'));
    }


    public function storeDoctor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors|unique:users',
            'password' => 'required|string|min:6',
            'specialty' => 'required|string',
            'phone' => 'required|string',
            'bio' => 'nullable|string',
            'image' => 'nullable|file|max:5120|mimes:jpeg,png,jpg,gif', // Giống như dịch vụ
        ]);

        if ($request->hasFile('image')) {
            // Tạo tên file duy nhất để tránh trùng lặp
            $imageName = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $imageName);
            $filePath = 'uploads/' . $imageName; // Lưu đường dẫn vào cơ sở dữ liệu
        } else {
            $filePath = null;
        }

        // Thêm bác sĩ vào bảng doctors
        $doctor = Doctor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'specialty' => $request->specialty,
            'phone' => $request->phone,
            'bio' => $request->bio,
            'image' => $filePath,
        ]);

        // Thêm tài khoản vào bảng users
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admindoctor',
        ]);

        return redirect()->route('admin.doctors.index')
            ->with('success', 'Bác sĩ đã được thêm thành công và có thể đăng nhập.');
    }




    public function updateDoctor(Request $request, $id)
    {
        // Lấy thông tin bác sĩ cần sửa
        $doctor = Doctor::findOrFail($id);

        // Validate dữ liệu từ form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
            'specialty' => 'required|string',
            'phone' => 'required|string',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Xử lý ảnh (nếu có)
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($doctor->image && file_exists(public_path($doctor->image))) {
                unlink(public_path($doctor->image));
            }
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('img'), $imageName);
            $doctor->image = 'img/' . $imageName;
        }

        // Cập nhật thông tin bác sĩ
        $doctor->update($request->all());

        // Chuyển hướng về danh sách bác sĩ kèm thông báo
        return redirect()->route('admin.doctors.index')->with('success', 'Thông tin bác sĩ đã được cập nhật.');
    }


    public function destroyDoctor($id)
    {
        // Tìm bác sĩ với ID
        $doctor = Doctor::findOrFail($id);

        // Tìm user liên kết với bác sĩ dựa trên email
        $user = User::where('email', $doctor->email)->first();

        // Xóa bác sĩ trong bảng doctors
        $doctor->delete();

        // Xóa user trong bảng users nếu tồn tại
        if ($user) {
            $user->delete();
        }

        // Chuyển hướng kèm thông báo
        return redirect()->route('admin.doctors.index')->with('success', 'Bác sĩ và tài khoản liên kết đã được xóa thành công.');
    }

    // 📌 Hiển thị danh sách bệnh nhân đã đặt lịch
    public function showAllPatients(Request $request)
    {
        $search = $request->input('search');

        $patients = Appointment::with(['patient', 'doctor'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('patient', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");
                });
            })
            ->orderBy('appointment_date', 'ASC')
            ->get();

        return view('role.adminpatients', compact('patients', 'search'));
    }


    public function getDoctorsBySpecialty(Request $request)
    {
        $doctors = Doctor::where('specialty', $request->specialty)->get();
        return response()->json($doctors);
    }


    // 📌 Hiển thị danh sách lịch hẹn với tìm kiếm và chỉnh sửa
    public function showAppointments(Request $request)
    {
        $search = $request->input('search');
        $editAppointment = null;

        // Nếu có yêu cầu sửa lịch hẹn
        if ($request->has('edit_id')) {
            $editAppointment = Appointment::find($request->input('edit_id'));
        }

        // Lấy danh sách các chuyên khoa từ bảng bác sĩ
        $specialties = Doctor::distinct()->pluck('specialty');

        // Lấy danh sách bác sĩ để hiển thị
        $doctors = Doctor::all();

        // Truy vấn lịch hẹn với tìm kiếm
        $appointments = Appointment::with(['doctor'])
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            })
            ->orderBy('appointment_date', 'ASC')
            ->get();

        return view('role.manageappointments', compact('appointments', 'editAppointment', 'search', 'specialties', 'doctors'));
    }


    // 📌 Duyệt lịch hẹn
    public function approveAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Lịch hẹn đã được duyệt.');
    }

    // 📌 Từ chối lịch hẹn
    public function rejectAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 'rejected']);
        return redirect()->back()->with('success', 'Lịch hẹn đã bị từ chối.');
    }

    // 📌 Xóa lịch hẹn
    public function deleteAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->back()->with('success', 'Lịch hẹn đã được xóa.');
    }

    // 📌 Thêm lịch hẹn mới
    public function storeAppointment(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:appointments,email',
            'phone' => 'required|string',
            'age' => 'required|integer',
            'cccd' => 'required|string|unique:appointments,cccd',
            'appointment_date' => 'required|date',
            'description' => 'nullable|string',
            'doctor_id' => 'required|exists:doctors,id',
            'specialty' => 'required|string',
        ]);

        // Kiểm tra bác sĩ
        $doctor = Doctor::find($request->doctor_id);
        if (!$doctor) {
            return back()->with('error', 'Bác sĩ không tồn tại');
        }

        // Debug kiểm tra dữ liệu nhận được
        // dd($request->all());

        // Tạo lịch hẹn mới
        Appointment::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
            'cccd' => $request->cccd,
            'appointment_date' => $request->appointment_date,
            'description' => $request->description,
            'doctor_id' => $doctor->id,
            'specialty' => $request->specialty,
            'status' => 'approved',
        ]);

        return redirect()->route('admin.appointments.index')->with('success', 'Lịch hẹn đã được thêm.');
    }




    // 📌 Cập nhật thông tin lịch hẹn
    public function updateAppointment(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        $request->validate([
            'specialty' => 'required|string',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'age' => 'required|integer',
            'cccd' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $appointment->update($request->all());

        return redirect()->route('admin.appointments.index')->with('success', 'Lịch hẹn đã được cập nhật.');
    }

    public function getDoctorScheduleWithFutureDates($doctorId)
    {
        // Lấy lịch làm việc của bác sĩ
        $schedules = DoctorSchedule::where('doctor_id', $doctorId)->get();

        if ($schedules->isEmpty()) {
            return response()->json(['error' => 'Không có lịch làm việc'], 404);
        }

        $formattedSchedules = [];

        foreach ($schedules as $schedule) {
            $currentDate = now(); // Ngày hiện tại

            for ($i = 0; $i < 6; $i++) { // Lấy 6 tuần tiếp theo của lịch làm việc
                $nextDate = $currentDate->copy()->next($schedule->day_of_week)->addWeeks($i);
                $shiftText = $schedule->shift === 'morning' ? '08h-12h' : '14h-18h';

                $formattedSchedules[] = [
                    'id' => $schedule->id,
                    'display' => "{$schedule->day_of_week} - {$shiftText} ({$nextDate->format('d/m/Y')})",
                    'date' => $nextDate->format('Y-m-d'),
                    'shift' => $schedule->shift
                ];
            }
        }

        return response()->json($formattedSchedules);
    }

}