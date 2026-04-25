FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    unzip git curl libzip-dev libssl-dev

RUN docker-php-ext-install zip

# Mongo (correcto)
RUN pecl install mongodb && docker-php-ext-enable mongodb

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# 🔥 copiar primero dependencias (cache)
COPY composer.json composer.lock ./

RUN COMPOSER_MEMORY_LIMIT=-1 composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction

# luego código
COPY . .

# permisos Laravel
RUN mkdir -p storage/logs storage/framework/sessions storage/framework/views storage/framework/cache bootstrap/cache && \
    chmod -R 777 storage bootstrap/cache

# env y claves
RUN cp .env.example .env || true
RUN php artisan key:generate --force || true
RUN php artisan jwt:secret --force || true

# limpiar cache
RUN php artisan optimize:clear

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=$PORT
