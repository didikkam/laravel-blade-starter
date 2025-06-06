# Setup Nginx untuk Domain Local

## 📋 Langkah-langkah Setup:

### 1. Copy konfigurasi nginx
```bash
# Ubuntu/Debian
sudo cp laravel-blade-starter.local.conf /etc/nginx/sites-available/
sudo ln -s /etc/nginx/sites-available/laravel-blade-starter.local.conf /etc/nginx/sites-enabled/

# CentOS/RHEL
sudo cp laravel-blade-starter.local.conf /etc/nginx/conf.d/
```

### 2. Test konfigurasi nginx
```bash
sudo nginx -t
```

### 3. Restart nginx
```bash
sudo systemctl restart nginx
# atau
sudo service nginx restart
```

### 4. Edit file hosts
```bash
sudo nano /etc/hosts
```

Tambahkan baris ini:
```
127.0.0.1    laravel-blade-starter.local
```

### 5. Pastikan Docker container berjalan
```bash
docker-compose up -d
```

## 🚀 Akses aplikasi:

- **Docker langsung**: `http://localhost:8111`
- **Domain local**: `http://laravel-blade-starter.local`

## 🔧 Troubleshooting:

### Jika nginx error:
```bash
# Cek status nginx
sudo systemctl status nginx

# Cek log error
sudo tail -f /var/log/nginx/error.log
sudo tail -f /var/log/nginx/laravel-blade-starter.error.log
```

### Jika domain tidak bisa diakses:
1. Pastikan nginx berjalan: `sudo systemctl status nginx`
2. Pastikan hosts file sudah benar: `cat /etc/hosts | grep laravel`
3. Pastikan container berjalan: `docker-compose ps`
4. Test proxy: `curl -I http://localhost:8111`

## ✅ Hasil akhir:
- ✅ `http://laravel-blade-starter.local` → Nginx Host → Docker Container (port 8111)
- ✅ Security headers enabled
- ✅ Static file caching
- ✅ Proper logging 