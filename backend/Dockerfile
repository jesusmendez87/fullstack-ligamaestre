FROM php:8.3-cli

RUN apt-get update && apt-get install -y unzip git curl libzip-dev libssl-dev
RUN pecl install mongodb
RUN docker-php-ext-enable mongodb
RUN docker-php-ext-install zip
RUN rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .


RUN mkdir -p storage/logs storage/framework/sessions storage/framework/views storage/framework/cache bootstrap/cache
RUN chmod -R 777 storage bootstrap/cache

RUN rm -f composer.lock && \
    composer install --ignore-platform-reqs --no-scripts


RUN cp .env.example .env || true
RUN php artisan key:generate --force || true
RUN php artisan jwt:secret --force || true

# ELIMINAR CUALQUIER CACHE
RUN rm -rf bootstrap/cache/config.php
RUN rm -rf bootstrap/cache/packages.php
RUN rm -rf bootstrap/cache/services.php

EXPOSE 10000
CMD php artisan optimize:clear && php artisan serve --host=0.0.0.0 --port=$PORT
