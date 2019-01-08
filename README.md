# project-pets-store
Bài tập lớn môn PHP

Đề tài: Website bán thú cưng

Nhóm 1:
Nguyễn Thị Thanh Hoài
Hoàng Thị Liên
Nguyễn Thị Cúc

Phân công công việc:
- Nguyễn Thị Thanh Hoài: Quản lý Product categories, Product, Login, Logout, Register, ChangePassword cho cả Admin và User, một phần Cart, Order trang Client.
- Hoàng Thị Liên: Quản lý Dog categories, Dog, Comment trang , Users, Post, SiteConfig, Orders trong trang Admin.
- Nguyễn Thị Cúc: Tìm kiếm giao diện, chỉnh sửa giao diện, đổ dữ liệu trang Client, một phần Cart
- Xây dựng cơ sở dữ liệu: cả nhóm cùng góp ý xây dựng.

Cách chạy project:
- Mở cmd, trỏ (cd) đến thư mục chứa project hoặc mở project, chuột phải và chọn open in terminal.
- Chạy lệnh composer update.
- Import database:
+ Nếu đã có database: Import file sql trong folder db bằng cách vào phpmyadmin, tạo 1 database, vào database chọn import, chọn file. Lưu ý: tên database cùng tên với file sql được chọn, nếu không phải vào project sửa tên database trong file .env. Trong database đã có dữ liệu mẫu để mọi người dùng thử.
+ Nếu chưa có database thì chạy lần lượt câu lệnh: 
	php artisan migrate
	composer dump-autoload
	php artisan db:seed
- Tiếp theo chạy php artisan serve để chạy chương trình.
- Project có 2 quyền là admin và user. 
+ Để sử dụng các quyền của amdin dùng tài khoản có:
	Username: admin@gmail.com
	Password: 12345678
+ Để sử dụng các quyền của người dùng:
	Username: user@gmail.com
	Password: 12345678
