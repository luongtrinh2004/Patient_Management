<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class AdminController extends Controller
{
    public function showDoctors(Request $request)
{
    $search = $request->input('search');
    $editDoctor = null;

    // Nếu có yêu cầu sửa, lấy thông tin bác sĩ
    if ($request->has('edit_id')) {
        $editDoctor = Doctor::findOrFail($request->edit_id);
    }

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
            'email' => 'required|email|unique:doctors',
            'password' => 'required|string|min:6',
            'specialty' => 'required|string',
            'phone' => 'required|string',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('img'), $imageName);
            $imagePath = 'img/' . $imageName;
        }

        Doctor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'specialty' => $request->specialty,
            'phone' => $request->phone,
            'bio' => $request->bio,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.doctors.index')->with('success', 'Bác sĩ đã được thêm thành công.');
    }

    public function editDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('role.editdoctor', compact('doctor'));
    }

    public function updateDoctor(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
            'specialty' => 'required|string',
            'phone' => 'required|string',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $doctor->image;
        if ($request->hasFile('image')) {
            if ($imagePath && file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('img'), $imageName);
            $imagePath = 'img/' . $imageName;
        }

        $doctor->update([
            'name' => $request->name,
            'email' => $request->email,
            'specialty' => $request->specialty,
            'phone' => $request->phone,
            'bio' => $request->bio,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.doctors.index')->with('success', 'Thông tin bác sĩ đã được cập nhật.');
    }

    public function destroyDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);

        if ($doctor->image && file_exists(public_path($doctor->image))) {
            unlink(public_path($doctor->image));
        }

        $doctor->delete();

        return redirect()->route('admin.doctors.index')->with('success', 'Bác sĩ đã được xóa.');
    }
}