# Laravel Blade Starter

A modern Laravel starter template with authentication using Blade templating engine. Features a clean, responsive UI with Tailwind CSS.

## Screenshot

![Login Page](./public/assets/login.png)
*Modern and responsive login interface with dark mode support*

![Dashboard](./public/assets/dashboard.png)
*Clean and intuitive dashboard layout with key metrics and navigation*

## Features

- 🔐 User Authentication (Login)
- 👥 Role-Based Access Control (RBAC)
- 🛡️ Granular Permissions System
- 🔒 Permission-Based Authorization
- 🎨 Modern UI with Tailwind CSS
- 📱 Fully Responsive Design
- 🔄 AJAX Form Submissions
- 🚀 jQuery Integration
- 👁️ Password Toggle Visibility
- ⚡ Smooth Animations and Transitions
- 🗂️ Role & Permission Management
- 🔍 Permission Caching
- 🐳 Docker Ready with Nginx + PHP-FPM

## Requirements

- PHP >= 8.2
- Required PHP Extensions:
  ```bash
  # For Ubuntu/Debian systems
  sudo apt update
  sudo apt install -y \
    php8.2 \
    php8.2-fpm \
    php8.2-cli \
    php8.2-common \
    php8.2-mysql \
    php8.2-pgsql \
    php8.2-mbstring \
    php8.2-xml \
    php8.2-curl \
    php8.2-zip \
    php8.2-bcmath \
    php8.2-intl \
    php8.2-gd
  ```
- Composer 2.x
- Node.js >= 20.x & NPM >= 10.x
- MySQL >= 8.0 or PostgreSQL >= 13

## Docker Setup (Recommended) 🐳

The project includes a complete Docker setup with:
- **Nginx** web server
- **PHP-FPM 8.2** with all required extensions
- **Node.js 20.x** for frontend assets
- **Supervisor** for process management
- **Production-ready** optimizations

### Prerequisites:
- Docker Engine & Docker Compose
- MySQL/MariaDB running on host machine
- Nginx running on host machine (for domain setup)

### Project Structure:
```
.docker/
├── Dockerfile                     # Multi-stage container with Nginx + PHP-FPM
├── docker-entrypoint.sh          # Container initialization & Laravel optimizations
├── supervisord.conf              # Process manager configuration
└── nginx-host.conf               # Internal container nginx config

docker-compose.yml                # Docker services configuration
laravel-blade-starter.local.conf  # Host nginx configuration for domain
SETUP-NGINX.md                   # Domain setup instructions
```

### Quick Start:

1. **Clone and setup environment**
```bash
git clone https://github.com/yourusername/laravel-blade-starter.git
cd laravel-blade-starter
cp .env.example .env
```

2. **Configure database connection in .env**
```env
DB_CONNECTION=mysql
DB_HOST=host.docker.internal
DB_PORT=3306
DB_DATABASE=laravel_blade
DB_USERNAME=root
DB_PASSWORD=your_password
```

3. **Start Docker container**
```bash
# Build and start container (includes composer install & npm build)
docker-compose up --build

# Container will be available at http://localhost:8111
```

4. **Setup database and generate key**
```bash
# Generate application key
docker-compose exec app php artisan key:generate

# Run migrations
docker-compose exec app php artisan migrate
```

5. **Setup custom domain (optional)**
```bash
# Copy nginx configuration
sudo cp laravel-blade-starter.local.conf /etc/nginx/sites-available/
sudo ln -s /etc/nginx/sites-available/laravel-blade-starter.local.conf /etc/nginx/sites-enabled/

# Add domain to hosts file
echo "127.0.0.1    laravel-blade-starter.local" | sudo tee -a /etc/hosts

# Test and restart nginx
sudo nginx -t && sudo systemctl restart nginx
```

### Access Points:
- **Direct Docker**: `http://localhost:8111`
- **Custom Domain**: `http://laravel-blade-starter.local` (after domain setup)

### Docker Features:
- ✅ **Automatic dependency installation** (Composer + NPM)
- ✅ **Frontend asset building** (Vite build)
- ✅ **Laravel optimizations** (config, route, view caching)
- ✅ **Production-ready** configuration
- ✅ **Hot database connection** to host
- ✅ **Supervisor process management**
- ✅ **Security headers** and optimizations

### Development Commands:
```bash
# View container logs
docker-compose logs -f

# Execute commands in container
docker-compose exec app php artisan migrate
docker-compose exec app php artisan make:controller YourController

# Rebuild container
docker-compose down && docker-compose up --build

# Stop container
docker-compose down
```

## Traditional Setup

### Installation Steps:

1. **Install dependencies**
```bash
composer install
npm install
```

2. **Environment setup**
```bash
cp .env.example .env
php artisan key:generate
```

3. **Database configuration**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

4. **Set permissions (Linux/Unix)**
```bash
sudo chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

5. **Database setup**
```bash
php artisan migrate
```

6. **Build assets**
```bash
npm run dev
```

7. **Start development server**
```bash
php artisan serve
```

Visit `http://localhost:8000`

## Development

### For development with hot-reload:
```bash
# Terminal 1: Laravel Server
php artisan serve

# Terminal 2: Vite Development Server
npm run dev
```

### With Docker:
```bash
# Development mode (no asset building)
docker-compose exec app npm run dev

# Watch for changes
docker-compose exec app npm run build
```

## Production Deployment

### Traditional:
```bash
npm run build
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Docker:
The Docker container is already production-optimized with:
- Composer install `--no-dev --optimize-autoloader`
- NPM build for production
- Laravel caching enabled
- Nginx + PHP-FPM for high performance

## Troubleshooting

### Docker Issues:
```bash
# Check container status
docker-compose ps

# View logs
docker-compose logs app

# Restart services
docker-compose restart

# Rebuild from scratch
docker-compose down -v && docker-compose up --build
```

### Domain Issues:
```bash
# Test nginx configuration
sudo nginx -t

# Check domain resolution
nslookup laravel-blade-starter.local

# View nginx logs
sudo tail -f /var/log/nginx/laravel-blade-starter.error.log
```

## Security

If you discover any security-related issues, please email your@email.com instead of using the issue tracker.

## License

The Laravel Blade Starter is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).