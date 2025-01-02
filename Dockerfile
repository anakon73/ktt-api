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
    nodejs \
    npm \
    libpq-dev \
    supervisor \
    cron

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql pgsql mbstring exif pcntl bcmath gd

# Get Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy application files
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Create supervisor config
RUN mkdir -p /etc/supervisor/conf.d/

# Добавляем задачу в cron
RUN echo "* * * * * cd /var/www && php artisan schedule:run >> /dev/null 2>&1" >> /etc/cron.d/laravel-cron
RUN chmod 0644 /etc/cron.d/laravel-cron
RUN crontab /etc/cron.d/laravel-cron

# Создаем конфиг для supervisor
RUN echo "[supervisord]\n\
    nodaemon=true\n\
    \n\
    [program:php-fpm]\n\
    command=php artisan serve --host=0.0.0.0 --port=80\n\
    autostart=true\n\
    autorestart=true\n\
    \n\
    [program:cron]\n\
    command=cron -f\n\
    autostart=true\n\
    autorestart=true" > /etc/supervisor/conf.d/supervisord.conf

# Set permissions
RUN chown -R www-data:www-data /var/www

# Expose port 80
EXPOSE 80

CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
