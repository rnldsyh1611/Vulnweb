FROM php:8.3-cli

# Install dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libzip-dev \
    zip \
    libpq-dev \
    && docker-php-ext-install pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install

# Give necessary permissions
RUN chmod -R 755 /var/www \
    && chown -R www-data:www-data /var/www

# Expose Laravel port
EXPOSE 8000

# Start Laravel with artisan
CMD php artisan serve --host=0.0.0.0 --port=8000
