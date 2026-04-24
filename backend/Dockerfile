FROM php:8.3-cli

RUN apt-get update && apt-get install -y unzip git curl libzip-dev zip libssl-dev pkg-config && \
    pecl install mongodb && docker-php-ext-enable mongodb && docker-php-ext-install zip && \
    rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN rm composer.lock; composer install --no-dev --ignore-platform-reqs || composer update --no-dev --ignore-platform-reqs

RUN mkdir -p storage/logs storage/framework/{sessions,views,cache} bootstrap/cache && chmod -R 777 storage bootstrap/cache

EXPOSE 10000
CMD php artisan serve --host=0.0.0.0 --port=$PORT
