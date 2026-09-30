# Stage 1: Build compilation container environment for JavaScript & CSS asset pipelines
FROM node:20-alpine AS asset-builder
WORKDIR /app

# Copy dependency configuration manifests to download node modules cache layers
COPY package*.json ./
RUN npm ci

# Copy full application structure to allow Vite compilers to compile stylesheets
COPY . .
RUN npm run build
# Stage 2: Build high-performance production-ready virtual Apache server framework
FROM php:8.3-apache

# Install mandatory system libraries and MariaDB database connector requirements
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

# Inject latest official production Composer executable from source binaries
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set active operational working directory context paths
WORKDIR /var/www/html

# Copy full repository layer directly inside our isolated cloud web root
COPY . .

# Run production composer dependencies downloader to secure vendor packages
RUN composer install --no-interaction --optimize-autoloader --no-dev
# 📍 THE FIX: Extract pre-compiled frontend assets directly out of Stage 1 compiler
COPY --from=asset-builder /app/public/build ./public/build

# Configure internal virtual host mappings to resolve straight to the public directory
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Lock down absolute file reading permissions properties across application frameworks
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Expose standard production communication ports gateway channel nodes
EXPOSE 80

# Production safe initiation hook executing zero automated database wipe loops
CMD ["apache2-foreground"]
