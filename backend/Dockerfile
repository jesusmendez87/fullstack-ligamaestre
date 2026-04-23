# Imagen con PHP
FROM php:8.4-cli

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Directorio de trabajo
WORKDIR /app

# Copiar proyecto
COPY . .

# Instalar dependencias Laravel
RUN composer install --no-interaction --prefer-dist --no-cache


# Exponer puerto
EXPOSE 10000

# Arrancar Laravel
CMD php artisan serve --host 0.0.0.0 --port 10000
