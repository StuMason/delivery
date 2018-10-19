#!/bin/sh
set -e

mkdir -p /var/www/html/storage/logs
mkdir -p /var/www/.composer
chmod -R a+rw /var/www/html/storage

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
    set -- php-fpm "$@"
fi

exec "$@"