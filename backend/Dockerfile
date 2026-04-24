FROM php:8.3-cli

# Dependencias del sistema + MongoDB driver
RUN apt-get update && apt-get install -y \
    unzip git curl libzip-dev zip \
    libssl-dev libcurl4-openssl-dev pkg-config \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb \
    && docker-php-ext-install zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copiar composer files
COPY composer.json composer.lock ./

# Instalar dependencias (incluye mongodb/laravel-mongodb)
RUN COMPOSER_MEMORY_LIMIT=-1 composer install \
    --no-dev \
    --no-scripts \
    --no-autoloader \
    --prefer-dist

# Copiar código
COPY . .

# Optimizar
RUN composer dump-autoload --optimize

# Permisos
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000
