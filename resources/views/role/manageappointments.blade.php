@extends('layouts.app')

@section('title', 'Quản lý lịch hẹn')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4">Quản lý Lịch Hẹn</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên Bác Sĩ</th>
                <th>Tên Bệnh Nhân</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th>Tuổi</th>
                <th>CCCD</th>
                <th>Ngày Hẹn</th>
                <th>Mô Tả</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ optional($appointment->doctor)->name ?? 'Không xác định' }}</td>
                <td>{{ $appointment->name }}</td>
                <td>{{ $appointment->email }}</td>
                <td>{{ $appointment->phone }}</td>
                <td>{{ $appointment->age }}</td>
                <td>{{ $appointment->cccd }}</td>
                <td>{{ $appointment->appointment_date }}</td>
                <td>{{ $appointment->description }}</td>
                <td>
                    @if($appointment->status === 'pending')
                    <span class="badge bg-warning">Chờ duyệt</span>
                    @elseif($appointment->status === 'approved')
                    <span class="badge bg-success">Đã duyệt</span>
                    @else
                    <span class="badge bg-danger">Đã từ chối</span>
                    @endif
                </td>
                <td>
                    <form method="POST" action="{{ route('admin.appointments.approve', $appointment->id) }}"
                        class="d-inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success btn-sm">Duyệt</button>
                    </form>
                    <form method="POST" action="{{ route('admin.appointments.reject', $appointment->id) }}"
                        class="d-inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger btn-sm">Từ chối</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection