@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; color: #0056b3;">Admin Dashboard</h1>

    <!-- Phần Log Out -->
    <div class="d-flex justify-content-end mb-5">
        <!-- Thêm margin-bottom -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-primary logout-btn">
                <i class="bi bi-box-arrow-right"></i> Log Out
            </button>
        </form>
    </div>

    <!-- Phần Quản lý -->
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