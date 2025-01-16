@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container-fluid p-0">
    <!-- Ảnh liên hệ chiếm toàn bộ chiều rộng -->
    <div class="text-center mb-4">
        <img src="{{ asset('img/contact.webp') }}" alt="Contact Us" class="img-fluid w-100"
            style="height: 500px; object-fit: cover; border-radius: 0;">
    </div>
</div>

<!-- Thông tin liên hệ -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h2 class="mb-3">Liên hệ với chúng tôi</h2>
            <p class="lead">Bạn có câu hỏi hoặc cần hỗ trợ? Hãy để lại tin nhắn, chúng tôi sẽ phản hồi sớm nhất.</p>
        </div>
    </div>

    <!-- Form hỗ trợ bệnh nhân -->
    <div class="container py-4">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-3">Gửi Yêu Cầu Hỗ Trợ</h4>
            <form action="{{ route('support.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Họ và tên</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Tuổi</label>
                    <input type="number" name="age" id="age" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Nội dung cần hỗ trợ</label>
                    <textarea name="message" id="message" rows="4" class="form-control" required></textarea>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Gửi yêu cầu</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Địa chỉ & Liên hệ -->
    <div class="row text-center mt-5">
        <div class="col-md-4">
            <h5><i class="bi bi-geo-alt"></i> Địa chỉ</h5>
            <p>Tầng 1, 2, 3 - Số 167 Hoàng Ngân, Hà Nội</p>
        </div>
        <div class="col-md-4">
            <h5><i class="bi bi-telephone"></i> Điện thoại</h5>
            <p>02422226699</p>
        </div>
        <div class="col-md-4">
            <h5><i class="bi bi-envelope"></i> Email</h5>
            <p>support@phenikaamec.com</p>
        </div>
    </div>
</div>
@endsection