# Dockerfile for CakePHP with Nginx and PHP-FPM
FROM php:8.1-fpm

# Set working directory
WORKDIR /var/www/html

# Install required extensions and tools
# Install development tools and libraries
RUN apt-get update && apt-get install -y \
    wget \
    zip \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    libicu-dev \ 
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd mysqli pdo pdo_mysql zip intl

# Install Composer
RUN wget -O composer-setup.php --show-progress=on https://getcomposer.org/installer && \
    php composer-setup.php --quiet --install-dir=/usr/local/bin --filename=composer && \
    rm composer-setup.php

# Copy CakePHP application files into the container
COPY ./portal /var/www/html

# Install CakePHP dependencies
RUN composer install --no-plugins --no-scripts

# Adjust file permissions
RUN chown -R www-data:www-data /var/www/html
# RUN chown -R www-data:www-data /var/www/html && \
#     find /var/www/html -type d -exec chmod 755 {} \; && \
#     find /var/www/html -type f -exec chmod 755 {} \; && \
#     chmod -R 777 /var/www/html/tmp && \
#     chmod -R 777 /var/www/html/tmp/cache

# Expose port 9000 for PHP-FPM
EXPOSE 9000
# CMD specifies the command to run on container start
CMD ["php-fpm"]
