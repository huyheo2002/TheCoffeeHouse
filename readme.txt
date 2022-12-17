================================ĐẦU TIÊN===============================
- Điều đầu tiên hãy chạy file sql "thecoffeehouse.sql" nằm trong assets/sql/ để lấy dữ liệu DB mới nhất!
- Khi thêm,sửa,xóa,... (thao tác) làm thay đổi dữ liệu trên DB, vui lòng xuất file sql tổng quát là thecoffeehouse và đặt vào đúng đường dẫn như trên (assets/sql/)

=================================Test===================================
- Các mật khẩu cho tài khoản test là "1"


=================================Nội dung chính bản cập nhật mới============================
- Đã update chức năng phân quyền cho tài khoản: người dùng->layout bình thường; admin,nhân viên->dashboard
- Danh mục "Quản lý nâng cao" trong file "Slidbar.php" chỉ mở khóa tương ứng với tài khoản có "authority_id=1" (là admin)
- Nút "đăng xuất" trong "header.php" ở file "header.php" đã có hiệu lực


