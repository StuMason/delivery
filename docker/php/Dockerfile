FROM php:7.2-fpm-alpine

RUN docker-php-ext-install pdo_mysql

COPY . /var/www/html/

RUN  chown -R www-data:www-data /var/www

COPY docker/php/entrypoint.sh /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]

CMD ["php-fpm"]