@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; color: #0056b3;">Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Quản lý bác sĩ</h5>
                    <a href="{{ url('/admin/doctors') }}" class="btn btn-primary">Xem chi tiết</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Quản lý bệnh nhân</h5>
                    <a href="{{ url('/admin/patients') }}" class="btn btn-primary">Xem chi tiết</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Quản lý lịch hẹn</h5>
                    <a href="{{ url('/admin/appointments') }}" class="btn btn-primary">Xem chi tiết</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Cài đặt website</h5>
                    <a href="{{ url('/admin/settings') }}" class="btn btn-primary">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection