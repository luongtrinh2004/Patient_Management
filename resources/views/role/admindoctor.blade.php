@extends('layouts.app')

@section('title', 'Admin Doctor Dashboard')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; color: #0056b3;">Admin Doctor Dashboard</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Lịch khám bệnh</h5>
                    <a href="{{ url('/admindoctor/schedule') }}" class="btn btn-primary">Xem lịch</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Thông tin bệnh nhân</h5>
                    <a href="{{ url('/admindoctor/patients') }}" class="btn btn-primary">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection