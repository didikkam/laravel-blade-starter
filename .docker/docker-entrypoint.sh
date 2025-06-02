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

# Install/update PHP dependencies
composer install --no-interaction --no-scripts

# Install/update NPM dependencies
npm install

# Start PHP-FPM
exec php-fpm 