@extends('layouts.app')

@section('title', 'Lịch trình khám bệnh')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4">Lịch trình Khám Bệnh</h1>

    @if($appointments->isEmpty())
    <div class="alert alert-info text-center">Hiện tại không có lịch trình khám bệnh nào.</div>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Bệnh Nhân</th>
                <th>Thời Gian</th>
                <th>Ghi Chú</th>
                <th>Trạng Thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $appointment->patient->name }}</td>
                <td>{{ $appointment->date }}</td>
                <td>{{ $appointment->note }}</td>
                <td>
                    @if($appointment->status === 'completed')
                    <span class="badge bg-success">Hoàn thành</span>
                    @elseif($appointment->status === 'pending')
                    <span class="badge bg-warning">Đang chờ</span>
                    @else
                    <span class="badge bg-danger">Đã hủy</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection