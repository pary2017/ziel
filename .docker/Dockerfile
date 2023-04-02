FROM php:8.2.0-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libzip-dev \
    zip \
    unzip

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

# Get latest Composer
ENV COMPOSER_ALLOW_SUPERUSER=1
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .
RUN composer install

# xdebug
EXPOSE 9003