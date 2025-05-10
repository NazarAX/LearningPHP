FROM php:8.2-fpm

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Set working directory
WORKDIR /var/www/html

# Copy app files
COPY ./app /var/www/html
