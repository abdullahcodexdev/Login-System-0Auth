# Auth Studio - Laravel OAuth login system
FROM php:8.2-cli

# System deps + PHP extensions Laravel needs
RUN apt-get update && apt-get install -y \
        git unzip libzip-dev libonig-dev \
    && docker-php-ext-install zip mbstring \
    && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Install PHP dependencies first (better layer caching)
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

# Copy application code
COPY . .

# Finish composer setup + permissions
RUN composer run-script post-autoload-dump --no-interaction || true \
    && mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache storage/app \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8080

# Start: clear any stale cache, then serve on the platform-provided $PORT.
# APP_KEY and other secrets are provided as environment variables by the host.
CMD php artisan optimize:clear \
    && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
