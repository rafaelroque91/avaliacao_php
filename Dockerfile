FROM php:7.4-apache
WORKDIR /var/www/html
RUN docker-php-ext-install pdo_mysql
RUN a2enmod rewrite