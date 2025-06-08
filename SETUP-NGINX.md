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

- **Domain local**: `http://laravel-blade-starter.local`
- **Container IP**: `172.20.0.10` (hanya untuk debugging)

## ⚙️ Konfigurasi Baru:

- ✅ **Nginx di host** (bukan di container)
- ✅ **PHP-FPM di container** dengan IP static `172.20.0.10:9000`
- ✅ **Tanpa port forwarding** - komunikasi langsung via FastCGI
- ✅ **Network custom** dengan subnet `172.20.0.0/24`

## 🔧 Troubleshooting:

### Jika nginx error:
```bash
# Cek status nginx
sudo systemctl status nginx

# Cek log error
sudo tail -f /var/log/nginx/error.log
sudo tail -f /var/log/nginx/laravel-blade-starter.error.log

# Test koneksi ke PHP-FPM
telnet 172.20.0.10 9000
```

### Jika domain tidak bisa diakses:
1. Pastikan nginx berjalan: `sudo systemctl status nginx`
2. Pastikan hosts file sudah benar: `cat /etc/hosts | grep laravel`
3. Pastikan container berjalan: `docker-compose ps`
4. Cek IP container: `docker inspect laravel_app | grep IPAddress`
5. Test PHP-FPM: `docker-compose exec app php-fpm -t`

### Debug network:
```bash
# Cek network Docker
docker network ls
docker network inspect docker-app

# Ping container dari host
ping 172.20.0.10

# Cek port PHP-FPM
docker-compose exec app netstat -tlnp | grep 9000
```

## ✅ Hasil akhir:
- ✅ `http://laravel-blade-starter.local` → Nginx Host → FastCGI → Container PHP-FPM (172.20.0.10:9000)
- ✅ Security headers enabled
- ✅ Static file serving dari nginx host
- ✅ Proper logging
- ✅ No port forwarding required 