#!/bin/bash
set -e

# Crear .env y volcar todas las variables de entorno de Render en él
printenv | grep -v "^_\|^HOME\|^PATH\|^HOSTNAME\|^TERM" > /app/.env

# Generar claves solo si no vienen de Render
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

if [ -z "$JWT_SECRET" ]; then
    php artisan jwt:secret --force
fi

php artisan config:clear
exec php artisan serve --host=0.0.0.0 --port=${PORT:-10000}
