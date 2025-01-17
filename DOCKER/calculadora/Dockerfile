FROM php:8.2-cli AS base

WORKDIR /app 
# si no existe la carpeta, la crea y se posiciona dentro

RUN apt update && \
    apt install -y unzip git libzip-dev &&\
    docker-php-ext-install zip
# ejecuta eso dentro de linux php

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
# COPY = (--from=composer:2) descarga composer, copia y borra la imagen 

COPY composer.json ./
# COPY = direccion-ordenador direccion-ordenador direccion-ordenador || direccion contenedor 

RUN composer install --no-dev
# docker buildx build -t calculadora:base --target base .

FROM base AS dev 

RUN pecl install xdebug && \
    docker-php-ext-enable xdebug 

COPY ./docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

COPY . .
#.. es copiarlo todo

# php -S localhost:8000 -t public

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
# docker container run -d -p 8000:8000 -v .:/app calculadora:dev

FROM base AS test

RUN composer require --dev phpunit/phpunit
COPY . .

# ./vendor/bin/phpunit --testdox tests

CMD ["./vendor/bin/phpunit","--testdox","tests"]
# docker buildx build -t calculadora:test --target test .

FROM base AS prod   

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN rm -rf docker/ test/

EXPOSE 80 

CMD ["php", "-S","0.0.0.0:80","-t","public"] 
# docker buildx build -t calculadora:prod --target prod .

# docker container run -d -p 80:80 calculadora:prod

