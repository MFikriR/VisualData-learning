FROM php:8.4-apache

# Install dependencies, PHP extensions, dan Node.js untuk Tailwind
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl gnupg \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo pdo_mysql

# Enable Apache mod rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project
COPY . .

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader


# MASAK CSS TAILWIND DAN JS
RUN rm -rf node_modules
RUN npm install
RUN npm run build

# Permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]