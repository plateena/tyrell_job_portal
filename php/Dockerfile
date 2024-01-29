# Dockerfile for CakePHP with Nginx, PHP-FPM, npm, and running npm build on container start
FROM php:8.1-fpm

# Set working directory
WORKDIR /var/www/html

# Install required extensions and tools
RUN apt-get update && \
    apt-get install -y \
    curl \
    zip \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    libicu-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd mysqli pdo pdo_mysql zip intl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Use a single RUN instruction to install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Use a single RUN instruction to install Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs && \
    rm -rf /var/lib/apt/lists/*

# Copy the CakePHP application files into the container
COPY ["./portal", "/var/www/html/"]

# Install CakePHP dependencies
RUN composer install --no-plugins --no-scripts

# Set file permissions for CakePHP directories
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Run npm build, composer install, and migrations seed on container start if not already seeded
CMD bash -c "cd /var/www/html && composer install && npm ci && npm run build && [ ! -f .seeded ] && ./bin/cake migrations seed && touch .seeded && php-fpm"
