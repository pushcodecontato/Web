FROM php:7.2-apache
WORKDIR /app
COPY . /var/www/html/
RUN apt-get update && apt-get install -y \
    libssl-dev \
    zlib1g-dev \
    && docker-php-ext-install mysqli pdo_mysql json pdo
