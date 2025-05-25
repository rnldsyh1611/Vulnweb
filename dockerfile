FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    unzip git curl libpng-dev libonig-dev libzip-dev zip libpq-dev \
    && docker-php-ext-install pdo_mysql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install

RUN chmod -R 755 /var/www/html \
    && chown -R www-data:www-data /var/www/html

# Supaya apache tidak warning servername
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

EXPOSE 80

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

