FROM php:8.3-cli

RUN apt-get update && apt-get install -y unzip git curl libzip-dev libssl-dev
RUN pecl install mongodb
RUN docker-php-ext-enable mongodb
RUN docker-php-ext-install zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN mkdir -p storage/logs storage/framework/sessions storage/framework/views storage/framework/cache bootstrap/cache
RUN chmod -R 777 storage bootstrap/cache

RUN composer install --ignore-platform-reqs

RUN cp .env.example .env || echo "APP_KEY=" > .env

RUN rm -rf bootstrap/cache/*.php
RUN rm -rf storage/framework/cache/data/*

RUN php artisan key:generate --force
RUN php artisan jwt:secret --force

EXPOSE 10000
CMD rm -rf bootstrap/cache/*.php && php artisan config:clear && php artisan cache:clear && php artisan serve --host=0.0.0.0 --port=$PORT
