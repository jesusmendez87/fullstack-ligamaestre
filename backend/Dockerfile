FROM php:8.3-cli

# 1. Instalar dependencias de sistema y MongoDB
RUN apt-get update && apt-get install -y \
    unzip git curl libzip-dev zip \
    libssl-dev libcurl4-openssl-dev pkg-config \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb \
    && docker-php-ext-install zip

# 2. Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# 3. Copiar archivos de composer PRIMERO
COPY composer.json composer.lock ./

# 4. Instalar dependencias (Sin scripts para que no falle si falta algo)
RUN COMPOSER_MEMORY_LIMIT=-1 composer install \
    --no-dev \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# 5. COPIAR EL RESTO DEL CÓDIGO (Esto es vital antes del dump-autoload)
COPY . .

# 6. AHORA generar el autoloader real
RUN composer dump-autoload --optimize --no-dev

# 7. Permisos
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

EXPOSE 10000

# Usar la variable de entorno PORT de Render
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-10000}
