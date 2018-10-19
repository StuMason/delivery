#!/usr/bin/env sh
set -e

# This subs in the correct hostname for the PHP container on startup - this is so we can use
# the same nginx config for both docker-compose (hostname is php) and AWS Fargate (hostname is 127.0.0.1)
envsubst '${PHP_CONTAINER_HOST}' < /etc/nginx/conf.d/default.conf.template > /etc/nginx/conf.d/default.conf

exec "$@"