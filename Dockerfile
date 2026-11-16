FROM php:8.3-cli-alpine

# Install system packages & PHP extensions
RUN apk add --no-cache \
    nodejs \
    npm \
    sqlite-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo_sqlite zip pcntl

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy application files
COPY . .

ENV COMPOSER_ALLOW_SUPERUSER=1
ENV PORT=10000

# Install dependencies and compile assets
RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN npm install
RUN npm run build

# Ensure writable storage & database
RUN chmod -R 777 storage bootstrap/cache database

EXPOSE 10000

# Start Laravel production server
CMD ["sh", "-c", "php artisan storage:link --force && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"]
