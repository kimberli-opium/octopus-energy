FROM php:8.1.12-fpm

ENV PHP_INI_SCAN_DIR=/usr/local/etc/php/conf.d:/usr/local/etc/php/dev.conf.d

RUN docker-php-ext-install pdo_mysql

RUN pecl install xdebug-3.1.5 \
    && docker-php-ext-enable xdebug

RUN apt-get update && apt-get install git wget unzip -y

COPY --from=composer:2.4.4 /usr/bin/composer /bin/composer

WORKDIR /www
