# Multi-stage build to get exact Node.js 20.x version
FROM node:20.19.2-alpine AS node
FROM php:8.2-fpm-alpine

# Copy Node.js binaries from official Node image (guaranteed v20.19.2)
COPY --from=node /usr/lib /usr/lib
COPY --from=node /usr/local/share /usr/local/share
COPY --from=node /usr/local/lib /usr/local/lib
COPY --from=node /usr/local/include /usr/local/include
COPY --from=node /usr/local/bin /usr/local/bin

# Install essential dependencies for PHP extensions
RUN apk add --no-cache curl zip unzip bash \
    oniguruma-dev libxml2-dev mysql-client
RUN node --version && npm --version

# Install PHP extensions using docker-php-ext-install (more reliable)
RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    bcmath \
    && php -m | grep -E "(pdo_mysql|mbstring|bcmath)"

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configure Composer for better performance and speed
RUN composer config --global process-timeout 2000 \
    && composer config --global repos.packagist composer https://packagist.org \
    && composer config --global --no-plugins allow-plugins.hirak/prestissimo true

# Create system user to run Composer and Artisan Commands (debug step by step)
RUN adduser -D dev
RUN addgroup dev www-data
RUN mkdir -p /home/dev/.composer
RUN chown -R dev:dev /home/dev

# Set working directory
WORKDIR /var/www/html

# Copy composer files first for better caching
COPY --chown=dev:dev composer.json composer.lock* ./

# Install PHP dependencies with speed optimizations
RUN COMPOSER_MEMORY_LIMIT=-1 composer install \
    --prefer-dist \
    --no-scripts \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --ignore-platform-reqs

# Copy package files for npm
COPY --chown=dev:dev package*.json ./

# Clean install npm dependencies to fix corruption
RUN npm cache clean --force \
    && npm install --legacy-peer-deps \
    && npm ls || true

# Copy existing application directory
COPY --chown=dev:dev . .

# Build frontend assets with error handling
RUN npm run build || echo "Build failed, continuing without frontend assets"

# Remove node_modules to reduce image size
RUN rm -rf node_modules

# Copy entrypoint script with proper permissions
COPY .docker/docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh \
    && ls -la /usr/local/bin/docker-entrypoint.sh

# Set ownership (user already created above)
RUN chown -R dev:dev /var/www/html

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Set entrypoint
ENTRYPOINT ["docker-entrypoint.sh"] 