FROM php:8.2-cli AS base

WORKDIR /app

RUN apt update && \
    apt install -y unzip git libzip-dev &&\
    docker-php-ext-install zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY composer.json ./

RUN composer install --no-dev
# docker buildx build -t calculadora:base --target base .


