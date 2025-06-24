FROM php:8.3-fpm

# Install nginx, supervisor, mariadb, dan dependensi PHP
RUN apt-get update && apt-get install -y \
    nginx supervisor mariadb-server unzip git curl libpng-dev libonig-dev libzip-dev zip libpq-dev \
    && docker-php-ext-install pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy seluruh Laravel project ke dalam container
COPY . .
COPY .env.docker .env

# Install dependency Laravel
RUN composer install

# Salin konfigurasi nginx
COPY nginx.conf /etc/nginx/sites-available/default
RUN rm -f /etc/nginx/sites-enabled/default \
    && ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# Salin konfigurasi supervisord
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Set permission
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Salin dan import SQL awal (jika ada)
COPY init.sql /init.sql

# Bootstrap database dan Laravel saat container start
COPY start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 80

CMD ["/start.sh"]
