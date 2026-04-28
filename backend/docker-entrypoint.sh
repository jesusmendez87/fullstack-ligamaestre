#!/bin/bash
set -e

# Escribir solo las variables relevantes de Laravel en .env
cat > /app/.env <<EOF
APP_NAME=${APP_NAME:-Laravel}
APP_ENV=${APP_ENV:-production}
APP_KEY=${APP_KEY:-}
APP_DEBUG=${APP_DEBUG:-false}
APP_URL=${APP_URL:-http://localhost}

JWT_SECRET=${JWT_SECRET:-}

DB_CONNECTION=${DB_CONNECTION:-mongodb}
DB_HOST=${DB_HOST:-}
DB_PORT=${DB_PORT:-27017}
DB_DATABASE=${DB_DATABASE:-}
DB_USERNAME=${DB_USERNAME:-}
DB_PASSWORD=${DB_PASSWORD:-}

MONGO_URI=${MONGO_URI:-}

CACHE_DRIVER=${CACHE_DRIVER:-file}
SESSION_DRIVER=${SESSION_DRIVER:-file}
QUEUE_CONNECTION=${QUEUE_CONNECTION:-sync}
EOF

# Generar claves solo si no vienen de Render
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

if [ -z "$JWT_SECRET" ]; then
    php artisan jwt:secret --force
fi

php artisan config:clear
exec php artisan serve --host=0.0.0.0 --port=${PORT:-10000}
