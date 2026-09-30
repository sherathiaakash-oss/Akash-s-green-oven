# Use the official high-performance PHP-Apache production engine image
FROM php:8.3-apache

# Install mandatory system extensions required for Laravel & MariaDB drivers
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && a2enmod rewrite

# Install official Composer package manager inside the container
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the operational directory inside the virtual server environment
WORKDIR /var/www/html

# Copy your exact unchanged project folder structure straight inside the container
COPY . .

# Run Composer dependencies downloader to secure vendor packages cleanly in production
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Configure Apache's server configuration to point directly to your standard public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Establish safe directory reading permissions configurations
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Expose the standard web connection port entry gate
EXPOSE 80

# 📍 AUTOMATED STARTUP ENGAGEMENT CODES WRAPPER:
# Automatically runs database migrations and seeds your pizzeria menus on every system boot loop.
CMD php artisan migrate:fresh --seed --force && apache2-foreground
