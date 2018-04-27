# btlweb
Tin tức khoa học

Cài đặt tại localhost
1. Clone project về máy
2. Di chuyển vào thư mục vừa clone sử dụng cmd hoặc terminal
3. Chạy cài đặt composer install
4. Import file tintuc2.sql trong thư mục database lên CSDL
5. Copy .env.example file thành .env trong thư mục đó. 
Sử dụng lệnh copy .env.example .env nếu là Windows hoặc cp .env.example .env nếu dùng terminal, Ubuntu
6. Mở .env file và thay đổi database name (DB_DATABASE)(tintuc2) của bạn, username (DB_USERNAME) and password (DB_PASSWORD) mà bạn đã cài đặt. 
Mặc định, username là root và password là rỗng. (This is for Xampp) 
Mặc định, username là root và password cũng là root. (This is for Lamp)
7. Sau đó chạy: 

  composer require guzzlehttp/guzzle
  
  php artisan key:generate
  
  php artisan migrate
  
  php artisan serve
  
8. 
Trang chủ  ./btlweb/public/trangchu
  
Trang Admin ./bltweb/public/public/admin/dangnhap

user: tuandht97@gmail.com

pass: 123456 

Sau khi đăng nhập có thể tự thêm tài khoản admin
