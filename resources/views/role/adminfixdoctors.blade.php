@extends('layouts.app')

@section('title', 'Quản lý bác sĩ')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4">Quản lý Bác Sĩ</h1>

    <!-- Form Tìm Kiếm và Thêm Bác Sĩ -->
    <div class="mb-4">
        <form method="GET" action="{{ route('admin.doctors.index') }}" class="d-flex mb-3">
            <input type="text" name="search" class="form-control me-2" placeholder="Tìm kiếm bác sĩ..."
                value="{{ $search ?? '' }}">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>

        <form method="POST" action="{{ route('admin.doctors.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3 mb-2">
                    <input type="text" name="name" class="form-control" placeholder="Tên bác sĩ" required>
                </div>
                <div class="col-md-3 mb-2">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="col-md-3 mb-2">
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                </div>
                <div class="col-md-3 mb-2">
                    <input type="text" name="specialty" class="form-control" placeholder="Chuyên môn" required>
                </div>
                <div class="col-md-3 mb-2">
                    <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" required>
                </div>
                <div class="col-md-3 mb-2">
                    <input type="text" name="bio" class="form-control" placeholder="Tiểu sử">
                </div>
                <div class="col-md-3 mb-2">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-3 mb-2">
                    <button type="submit" class="btn btn-success w-100">Thêm Bác Sĩ</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Danh sách bác sĩ -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Chuyên môn</th>
                <th>Số điện thoại</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->specialty }}</td>
                <td>{{ $doctor->phone }}</td>
                <td>
                    @if($doctor->image)
                    <img src="/{{ $doctor->image }}" alt="{{ $doctor->name }}"
                        style="width: 50px; height: 50px; object-fit: cover;">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form method="POST" action="{{ route('admin.doctors.destroy', $doctor->id) }}"
                        class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa bác sĩ này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection