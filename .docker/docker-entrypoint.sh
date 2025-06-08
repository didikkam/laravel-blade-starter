#!/bin/bash

# Create storage directories if they don't exist
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/framework/cache
mkdir -p storage/logs
mkdir -p bootstrap/cache

# Set permissions and ownership
chown -R www-data:www-data storage
chown -R www-data:www-data bootstrap/cache
chmod -R 775 storage
chmod -R 775 bootstrap/cache

rm -rf .docker

# Laravel optimizations for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start PHP-FPM
exec php-fpm -F 