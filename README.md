# BookSpace – Quản lý sách bằng CakePHP
Nhóm 5 – DA23TTD
Học phần: Phát triển ứng dụng web với mã nguồn mở

## Môi trường
PHP 8.0.30; CakePHP 4.6.5; Composer 2.10.3;
MySQL/MariaDB trên XAMPP.

## Cài đặt
1. Tải mã nguồn, mở Shell tại thư mục dự án.
2. Chạy composer install theo composer.lock.
3. Bật MySQL; tạo online_shop và nhập SQL của dự án.
4. Sao chép config/app_local.example.php thành
   config/app_local.php nếu chưa có.
5. Cấu hình Datasources.default và Security.salt riêng.
6. Tạo tài khoản và chạy máy chủ bằng các lệnh dưới đây.

## Tạo tài khoản
php bin\cake.php create_user admin admin "Quản trị viên"
php bin\cake.php create_user nhanvien staff "Nhân viên"
Lưu riêng mật khẩu sinh trên Shell; không công khai mật khẩu.

## Chạy
php bin\cake.php server -H localhost -p 8765
Mở http://localhost:8765/dang-nhap

## Chức năng
CRUD; chi tiết; tìm kiếm; phân trang; kiểm tra dữ liệu;
đăng nhập, đăng xuất và phân quyền admin, staff.

## Phạm vi và giấy phép
Demo quản lý nội bộ trên localhost, chưa có mua hàng.
Giữ thông tin giấy phép của CakePHP và các thư viện sử dụng.
