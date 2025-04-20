#!/bin/sh
set -e

if [ "${1#-}" != "$1" ]; then
	set -- php-fpm "$@"
fi

if [ "$1" = 'php-fpm' ]; then
	if [ ! -d 'vendor/' ]; then
		composer install --prefer-dist --no-progress --no-interaction
	fi
fi

setfacl -R -m u:www-data:rwX -m u:"$(whoami)":rwX storage bootstrap/cache
setfacl -dR -m u:www-data:rwX -m u:"$(whoami)":rwX storage bootstrap/cache

exec docker-php-entrypoint "$@"
