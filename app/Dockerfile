FROM php:8.2-apache

# ติดตั้งส่วนขยายที่จำเป็น
RUN docker-php-ext-install pdo pdo_mysql mysqli

# เปิด mod ที่นิยมใช้
RUN a2enmod rewrite headers

# ตั้งค่า VirtualHost ให้ AllowOverride All เผื่อใช้ .htaccess
COPY vhost.conf /etc/apache2/sites-available/000-default.conf

# คัดลอกซอร์สเข้าไปในอิมเมจ
COPY src/ /var/www/html/

# ปรับ permission แบบพอเหมาะ
RUN chown -R www-data:www-data /var/www/html
