#!/bin/sh
set -e

# 1. Pastikan dependencies terinstall (opsional jika sudah di Dockerfile)
# composer install --no-interaction --optimize-autoloader

# 2. Hapus semua cache lama agar perubahan .env/config terbaca
echo "Clearing Laravel caches..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# 3. Generate key jika belum ada
if [ -z "$APP_KEY" ]; then
  echo "Generating app key..."
  php artisan key:generate --force
fi

# 4. Jalankan migrasi database
# --force diperlukan karena di .env kita set APP_ENV=production/local
echo "Running database migrations..."
php artisan migrate --force

# 5. Jalankan command utama (php artisan serve atau php-fpm)
echo "Starting application..."
exec "$@"