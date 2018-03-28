# btlweb
Tin tức khoa học
Chuẩn bị:
Cài đặt database: import file laravel_demo.sql trong thư mục database vào phpmyadmin
****. Cài đặt PHP 7.1 với Ubuntu
 GÕ  1. apt-get install python-software-properties
     2. add-apt-repository ppa:ondrej/php
     3. apt-get update
     4. apt install php7.1 php7.1-xml php7.1-mbstring php7.1-mysql php7.1-json php7.1-curl php7.1-cli php7.1-common php7.1-mcrypt php7.1-gd libapache2-mod-php7.1 php7.1-zip
*** Tải composer tại getcomposer.org với windows
*** Tải composer trên Ubuntu
  GÕ  1. curl -sS https://getcomposer.org/installer | php
      2. mv composer.phar /usr/bin/composer
*** Tải git với windows
*** Tải git với Ubuntu
  GÕ: apt-get install git
  
Tiến hành: 
1. Vào thư mục xampp/hdocs với windows và var/html với ubuntu
2. Clone code về 
3. Di chuyển vào thư mục vừa clone
3. Chạy lệnh composer install ( cmd với windows và terminal với ubuntu)
4. Copy .env.example file thành .env trong thư mục đó. 
Sử dụng lệnh copy .env.example .env nếu là Windows hoặc cp .env.example .env nếu dùng terminal, Ubuntu
5. Mở .env file và thay đổi database name (DB_DATABASE) của bạn, username (DB_USERNAME) and password (DB_PASSWORD) mà bạn đã cài đặt. 
Mặc định, username là root và password là rỗng. (This is for Xampp) 
Mặc định, username là root và password cũng là root. (This is for Lamp) (Do người dùng đặt khi cài đặt phpmyadmin)

6. Sau đó chạy:
php artisan key:generate

php artisan migrate

php artisan ser

Sau khi chạy truy cập vào địa chỉ để test
  Với windows: http://localhost/ten_project/public
  Với Ubuntu: http://127.0.0.1:8000 ( mặc định khi chạy xong lệnh php artisan ser )
 
Để thử xem có chạy được project sau khi clone đã kết nối với CSDL thì có thể vào các địa chỉ sau
  Với windows: http://localhost/ten_project/public/admin/theloai/danhsach
  Với Ubuntu: http://127.0.0.1:8000/admin/theloai/danhsach
