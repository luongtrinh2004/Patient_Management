<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patients', compact('patients'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Patient::create($request->all());
        return redirect()->back()->with('success', 'Patient added successfully!');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'age' => 'required|integer',
        'gender' => 'required',
        'phone' => 'required',
        'address' => 'required',
    ]);

    $patient = Patient::findOrFail($id); // Tìm bệnh nhân, trả về lỗi nếu không tìm thấy
    $patient->update($request->all());
    return redirect()->back()->with('success', 'Patient updated successfully!');
}


    public function destroy($id)
    {
        Patient::destroy($id);
        return redirect()->back()->with('success', 'Patient deleted successfully!');
    }
}