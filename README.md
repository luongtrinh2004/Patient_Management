# 🏥 Quản Lý Phòng Khám Da Liễu

![Clinic Management System](img/readme.png)

## 🚀 Giới thiệu

**Quản Lý Phòng Khám Da Liễu** là hệ thống giúp quản lý các hoạt động của phòng khám, bao gồm bác sĩ, bệnh nhân, lịch hẹn, dịch vụ y tế, hồ sơ bệnh nhân, thanh toán và hỗ trợ. Dự án sử dụng **Laravel** và **Bootstrap**, đảm bảo giao diện thân thiện và trải nghiệm mượt mà.

---

## ✨ Tính năng chính

💪 **Quản lý bác sĩ**: Theo dõi danh sách bác sĩ, chuyên môn và hồ sơ cá nhân.  
👨‍⚕️ **Quản lý bệnh nhân**: Theo dõi danh sách bệnh nhân đăng ký khám bệnh.  
💊 **Quản lý dịch vụ**: Thêm, sửa, xóa các dịch vụ khám da liễu.  
📅 **Quản lý lịch hẹn**: Cho phép bệnh nhân đặt lịch, sau khi đặt thì lịch sẽ hiện ở 2 phía Bác Sĩ và Admin. Admin có quền xem và chỉnh sửa.  
📝 **Quản lý hồ sơ bệnh nhân**: Lưu trữ và quản lý thông tin y tế của từng bệnh nhân.  
💳 **Quản lý hóa đơn & thanh toán**: Tạo và theo dõi hóa đơn, xử lý thanh toán.  
📢 **Hỗ trợ bệnh nhân tích hợp ChatBot AI**: Nhân Viên phản hồi và hỗ trợ bệnh nhân nhanh chóng. Cùng với đó hệ thống Chatbot AI có thể phản hồi ngay lập tức .  
📊 **Thống kê & Báo cáo**: Hiển thị tổng quan về hoạt động phòng khám, doanh thu.  
🔒 **Phân quyền tài khoản**: Hệ thống đăng nhập với vai trò **Admin, Bác sĩ**.

---

## 🛠 Công nghệ sử dụng

| Công nghệ  | Phiên bản |
| ---------- | --------- |
| Laravel    | 10.x      |
| Bootstrap  | 5.x       |
| MySQL      | 8.x       |
| JavaScript | ES6+      |
| jQuery     | 3.x       |

---

## 🛠 Cài đặt & Khởi chạy

### 📌 1. Clone repository

```sh
git clone https://github.com/luongtrinh2004/Patient_Management.git
cd ...
```

### 📌 2. Cấu hình môi trường

```sh
cp .env.example .env
php artisan key:generate
```

🎡 Cập nhật file `.env` với thông tin database của bạn.

### 📌 3. Cài đặt các dependencies

```sh
composer install
npm install && npm run dev
```

### 📌 4. Chạy database migration và seed dữ liệu mẫu

```sh
php artisan migrate --seed
```

### 📌 5. Chạy ứng dụng

```sh
php artisan serve
```

Mở trình duyệt và truy cập: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 📸 Hình ảnh giao diện

### 🔹 Trang quản lý Admin

![Admin Dashboard](img/adminreadme.png)

### 🔹 Quản lý dịch vụ

![Service Management](quanlydichvureadme.png)

### 🔹 Đặt lịch khám

![Appointment Booking](img/quanlylichhenreadme.png)

### 🔹 Quản lý bác sĩ

![Doctor Management](img/quanlybacsireadme.png)

### 🔹 Hóa đơn & Thanh toán

em đang phát triển ạ
![Billing & Payments](https://via.placeholder.com/800x400?text=Billing+&+Payments)

### 🔹 Hỗ trợ bệnh nhân

![Patient Support](img/quanlyhotroreadme.png)

---

## 🤝 Đóng góp

💡 Nếu bạn muốn đóng góp, hãy làm theo các bước sau:

1. **Fork** repository này.
2. Tạo một **branch mới** để thêm tính năng hoặc sửa lỗi.
    ```sh
    git checkout -b feature/new-feature
    ```
3. Commit thay đổi của bạn.
    ```sh
    git commit -m "Thêm tính năng XYZ"
    ```
4. Push code lên GitHub.
    ```sh
    git push origin feature/new-feature
    ```
5. Mở một **Pull Request** để đóng góp code của bạn.

---

## 📜 Giấy phép

Dự án này được phát hành theo giấy phép **MIT License**.

---

💙 **Cảm ơn bạn đã sử dụng hệ thống quản lý phòng khám da liễu!** 🏥
