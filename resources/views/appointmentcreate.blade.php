@extends('layouts.app')

@section('title', 'Đặt lịch khám')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4">Đặt Lịch Khám</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('appointments.store') }}">
        @csrf
        <div class="row mb-3">
            <label for="doctor_id" class="col-sm-2 col-form-label">Chọn bác sĩ</label>
            <div class="col-sm-10">
                <select name="doctor_id" id="doctor_id" class="form-control" required>
                    <option value="">-- Chọn bác sĩ --</option>
                    @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Tên bệnh nhân</label>
            <div class="col-sm-10">
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="phone" class="col-sm-2 col-form-label">Số điện thoại</label>
            <div class="col-sm-10">
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="age" class="col-sm-2 col-form-label">Tuổi</label>
            <div class="col-sm-10">
                <input type="number" name="age" id="age" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="cccd" class="col-sm-2 col-form-label">CCCD</label>
            <div class="col-sm-10">
                <input type="text" name="cccd" id="cccd" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="appointment_date" class="col-sm-2 col-form-label">Ngày hẹn</label>
            <div class="col-sm-10">
                <input type="date" name="appointment_date" id="appointment_date" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">Mô tả</label>
            <div class="col-sm-10">
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Đặt lịch</button>
    </form>
</div>
@endsection