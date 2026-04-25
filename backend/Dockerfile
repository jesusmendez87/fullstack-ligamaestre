FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    unzip git curl libzip-dev libssl-dev && \
    rm -rf /var/lib/apt/lists/*

RUN pecl install mongodb && docker-php-ext-enable mongodb
RUN docker-php-ext-install zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN rm -f composer.lock && \
    COMPOSER_MEMORY_LIMIT=-1 composer require mongodb/laravel-mongodb:5.x-dev -W && \
    COMPOSER_MEMORY_LIMIT=-1 composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --ignore-platform-reqs

RUN mkdir -p storage/logs storage/framework/sessions storage/framework/views storage/framework/cache bootstrap/cache && \
    chmod -R 777 storage bootstrap/cache

RUN cp .env.example .env || true
RUN php artisan key:generate --force || true
RUN php artisan jwt:secret --force || true

EXPOSE 10000

CMD php artisan config:clear && php artisan serve --host=0.0.0.0 --port=$PORT
