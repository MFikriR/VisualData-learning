FROM php:8.4-apache

# --- MENGARAHKAN APACHE KE FOLDER PUBLIC LARAVEL ---
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf

RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

# --- GANTI PORT APACHE UNTUK RENDER ---
RUN sed -i 's/80/10000/g' \
    /etc/apache2/ports.conf \
    /etc/apache2/sites-available/000-default.conf

# Install dependencies + Node.js
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl gnupg \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo pdo_mysql

# Enable rewrite
RUN a2enmod rewrite

# Working directory
WORKDIR /var/www/html

# Copy project
COPY . .

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader

# Build Vite / Tailwind
RUN rm -rf node_modules
RUN npm install
RUN npm run build

# Laravel permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Render port
EXPOSE 10000

CMD ["apache2-foreground"]