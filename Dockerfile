FROM php:8.2-fpm

# Install system dependencies (Linux libraries)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# Install PHP extensions required by Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get the latest Composer from the official image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www