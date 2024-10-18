FROM php:apache

COPY ./src /var/www/html
 
RUN docker-php-ext-install mysqli
RUN chown -R www-data:www-data /var/www
