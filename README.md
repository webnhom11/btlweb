# btlweb
Tin tức khoa học
Cài đặt database: import file laravel_demo.sql trong thư mục database vào phpmysql
Cài đặt tại localhost
1. Clone project về máy
2. Di chuyển vào thư mục vừa clone sử dụng cmd hoặc terminal
3. Chạy cài đặt composer install
4. Copy .env.example file thành .env trong thư mục đó. 
Sử dụng lệnh copy .env.example .env nếu là Windows hoặc cp .env.example .env nếu dùng terminal, Ubuntu
5. Mở .env file và thay đổi database name (DB_DATABASE) của bạn, username (DB_USERNAME) and password (DB_PASSWORD) mà bạn đã cài đặt. 
Mặc định, username là root và password là rỗng. (This is for Xampp) 
Mặc định, username là root và password cũng là root. (This is for Lamp)
6. Sau đó chạy:

php artisan key:generate

php artisan migrate

php artisan serve
