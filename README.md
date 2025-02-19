# Quản Lý Phòng Khám Da Liễu

![Clinic Management](https://via.placeholder.com/1000x400?text=Clinic+Management+System)

## Giới thiệu

**Quản Lý Phòng Khám Da Liễu** là hệ thống giúp quản lý dịch vụ y tế, bác sĩ, bệnh nhân và lịch hẹn một cách hiệu quả. Dự án được xây dựng bằng Laravel và Bootstrap để mang lại trải nghiệm mượt mà và thân thiện với người dùng.

## Tính năng chính

-   🌟 **Quản lý dịch vụ**: Thêm, sửa, xóa các dịch vụ khám da liễu.
-   👨‍⚕️ **Quản lý bác sĩ**: Theo dõi danh sách bác sĩ và thông tin chuyên môn.
-   📅 **Quản lý lịch hẹn**: Cho phép bệnh nhân đặt lịch hẹn và admin xác nhận.
-   🔒 **Quản lý tài khoản**: Đăng ký, đăng nhập và phân quyền (Admin, Bác sĩ, Bệnh nhân).
-   📊 **Thống kê và báo cáo**: Hiển thị thông tin tổng quan về hoạt động của phòng khám.

## Công nghệ sử dụng

-   Laravel 10
-   Bootstrap 5
-   MySQL
-   JavaScript & jQuery

## Cài đặt

### 1. Clone repository

```sh
git clone https://github.com/your-username/clinic-management.git
cd clinic-management
```

### 2. Cấu hình môi trường

Sao chép file `.env.example` và cập nhật thông tin database:

```sh
cp .env.example .env
php artisan key:generate
```

### 3. Cài đặt thư viện

```sh
composer install
npm install && npm run dev
```

### 4. Chạy database migration

```sh
php artisan migrate --seed
```

### 5. Chạy dự án

```sh
php artisan serve
```

Truy cập: [http://127.0.0.1:8000](http://127.0.0.1:8000)

## Hình ảnh giao diện

### 🔹 Quản lý dịch vụ

![Service Management](https://via.placeholder.com/800x400?text=Service+Management)

### 🔹 Đặt lịch khám

![Appointment Booking](https://via.placeholder.com/800x400?text=Appointment+Booking)

### 🔹 Quản lý bác sĩ

![Doctor Management](https://via.placeholder.com/800x400?text=Doctor+Management)

## Đóng góp

Bạn có thể đóng góp bằng cách fork repo, tạo branch mới và gửi pull request.

```sh
git checkout -b feature/new-feature
```

## Giấy phép

Dự án được phát hành theo giấy phép **MIT License**.

---

💙 Cảm ơn bạn đã sử dụng hệ thống quản lý phòng khám da liễu!
