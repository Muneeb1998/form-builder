# Use official PHP 8.2 FPM image
FROM php:8.2-fpm

# Install system dependencies and PostgreSQL PDO
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory inside the container
WORKDIR /var/www/html

# Copy Laravel application files to the container
COPY . .

# Expose port (if needed)
EXPOSE 9000

# Set the default command to run PHP-FPM
CMD ["php-fpm"]
