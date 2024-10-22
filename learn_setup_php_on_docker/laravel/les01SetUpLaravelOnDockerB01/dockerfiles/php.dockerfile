FROM php:8.3.12-fpm

WORKDIR /var/www/html

# Copy the custom php.ini to the appropriate path
COPY ./php.ini /usr/local/etc/php/php.ini


# Install necessary system dependencies, including libcurl
RUN apt-get update && apt-get install -y \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    autoconf \
    build-essential

RUN docker-php-ext-install pdo pdo_mysql mysqli curl