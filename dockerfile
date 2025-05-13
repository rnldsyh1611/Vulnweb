# Menggunakan image PHP 8.2 dengan Apache
FROM php:8.2-apache

# Install PHP extension yang diperlukan untuk Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql \
    && a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory ke /var/www
WORKDIR /var/www

# Copy file Laravel ke dalam container
COPY . /var/www

# Install dependency Laravel
RUN composer install

# Set hak akses untuk folder storage dan cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expose port 80 (default port untuk Apache)
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]
