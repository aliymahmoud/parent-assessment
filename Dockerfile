FROM php:8.0-apache

RUN apt-get update && \
    apt-get install -y libzip-dev && \
    docker-php-ext-install zip pdo_mysql && \
    a2enmod rewrite

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

CMD ["apache2-foreground"]
