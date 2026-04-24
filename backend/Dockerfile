FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    unzip git curl libzip-dev zip \
    libssl-dev libcurl4-openssl-dev pkg-config \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN rm -f composer.lock && \
    COMPOSER_MEMORY_LIMIT=-1 composer update --no-dev --prefer-dist --no-interaction --ignore-platform-reqs && \
    composer dump-autoload --optimize && \
    mkdir -p storage/logs storage/framework/{sessions,views,cache} bootstrap/cache && \
    chmod -R 777 storage bootstrap/cache

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=$PORT
