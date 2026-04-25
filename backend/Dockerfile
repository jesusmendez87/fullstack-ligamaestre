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
RUN cp .env.example .env || true

RUN composer install --ignore-platform-reqs

EXPOSE 10000
CMD php artisan serve --host=0.0.0.0 --port=$PORT
