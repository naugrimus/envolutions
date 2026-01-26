FROM php:8.4-fpm

# System deps
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql zip

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Permissions
RUN mkdir -p /app \
    && chown -R www-data:www-data /app

WORKDIR /app