FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    default-mysql-client \
    nginx \
    supervisor

# Install Node.js 20.x (same as host)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configure Composer for better performance
RUN composer config --global process-timeout 2000
RUN composer config --global repos.packagist composer https://packagist.org

# Configure NPM for better reliability
RUN npm config set fetch-retry-maxtimeout 300000
RUN npm config set fetch-retry-mintimeout 10000
RUN npm config set fetch-retries 5
RUN npm config set registry https://registry.npmjs.org/

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u 1000 -d /home/dev dev
RUN mkdir -p /home/dev/.composer && \
    chown -R dev:dev /home/dev

# Set working directory
WORKDIR /var/www/html

# Copy composer files first for better caching
COPY --chown=dev:dev composer.json composer.lock* ./

# Install PHP dependencies with optimizations
RUN COMPOSER_MEMORY_LIMIT=-1 composer install \
    --prefer-dist \
    --no-scripts \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

# Copy package files for npm
COPY --chown=dev:dev package*.json ./

# Install npm dependencies with retry mechanism and proper timeout
RUN npm install --fetch-timeout=300000 --fetch-retry-maxtimeout=300000 || \
    (sleep 5 && npm install --fetch-timeout=300000) || \
    (sleep 10 && npm install --fetch-timeout=300000)

# Copy existing application directory
COPY --chown=dev:dev . .

# Build frontend assets
RUN npm run build

# Remove node_modules to reduce image size
RUN rm -rf node_modules

# Copy nginx configuration
COPY .docker/nginx-host.conf /etc/nginx/sites-available/default
RUN rm -f /etc/nginx/sites-enabled/default
RUN ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/

# Copy supervisor configuration
COPY .docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy entrypoint script
COPY .docker/docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Expose port 80
EXPOSE 80

# Set entrypoint
ENTRYPOINT ["docker-entrypoint.sh"] 