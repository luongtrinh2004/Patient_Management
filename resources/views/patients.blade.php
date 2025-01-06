@extends('layouts.app')

@section('title', 'Danh Sách Bệnh Nhân')

@section('content')
<h1 class="mb-4">Danh Sách Bệnh Nhân</h1>

<!-- Hiển thị thông báo -->
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- Form thêm mới -->
<div class="card mb-4">
    <div class="card-header">Thêm Bệnh Nhân</div>
    <div class="card-body">
        <form action="{{ route('patients.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="name">Tên</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Tên" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="age">Tuổi</label>
                    <input type="number" name="age" id="age" class="form-control" placeholder="Tuổi" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="gender">Giới tính</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Số điện thoại"
                        required>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Địa chỉ" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</div>

<!-- Bảng danh sách -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Tên</th>
            <th>Tuổi</th>
            <th>Giới tính</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($patients as $key => $patient)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $patient->name }}</td>
            <td>{{ $patient->age }}</td>
            <td>{{ $patient->gender }}</td>
            <td>{{ $patient->phone }}</td>
            <td>{{ $patient->address }}</td>
            <td>
                <!-- Nút sửa -->
                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                    data-bs-target="#editModal{{ $patient->id }}">
                    Sửa
                </button>

                <!-- Form xóa -->
                <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                </form>
            </td>
        </tr>

        <!-- Modal Sửa -->
        <div class="modal fade" id="editModal{{ $patient->id }}" tabindex="-1" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Sửa Thông Tin Bệnh Nhân</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên</label>
                                <input type="text" name="name" class="form-control" value="{{ $patient->name }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Tuổi</label>
                                <input type="number" name="age" class="form-control" value="{{ $patient->age }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Giới tính</label>
                                <select name="gender" class="form-select" required>
                                    <option value="Nam" {{ $patient->gender == 'Nam' ? 'selected' : '' }}>Nam</option>
                                    <option value="Nữ" {{ $patient->gender == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="text" name="phone" class="form-control" value="{{ $patient->phone }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input type="text" name="address" class="form-control" value="{{ $patient->address }}"
                                    required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
@endsection