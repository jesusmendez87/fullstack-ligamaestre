#!/bin/bash
set -e

# Crear .env mínimo si no existe, para que Laravel pueda escribir en él
if [ ! -f /app/.env ]; then
    touch /app/.env
fi

# Solo generar claves si no vienen ya del entorno de Render
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

if [ -z "$JWT_SECRET" ]; then
    php artisan jwt:secret --force
fi

php artisan config:clear
exec php artisan serve --host=0.0.0.0 --port=${PORT:-10000}
