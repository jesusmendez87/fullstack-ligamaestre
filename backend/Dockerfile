FROM php:8.3-cli

RUN apt-get update && apt-get install -y unzip git curl libzip-dev libssl-dev && \
    pecl install mongodb && \
    docker-php-ext-enable mongodb && \
    docker-php-ext-install zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN mkdir -p storage/logs storage/framework/sessions storage/framework/views storage/framework/cache bootstrap/cache
RUN chmod -R 777 storage bootstrap/cache

RUN composer install --ignore-platform-reqs --no-scripts 2>&1 || true
RUN composer dump-autoload

RUN cp .env.example .env 2>/dev/null || echo "APP_KEY=" > .env

EXPOSE 10000
CMD php artisan config:clear && php artisan serve --host=0.0.0.0 --port=$PORT
