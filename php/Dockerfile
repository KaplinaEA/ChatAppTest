FROM mlocati/php-extension-installer:2 AS php_extension_installer_upstream
FROM composer/composer:2-bin AS composer_upstream
FROM php:8.4-fpm as php_upstream


FROM php_upstream AS php_base

WORKDIR /var/www/chat-app

RUN apt-get update && \
    apt-get install -y git acl && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=php_extension_installer_upstream --link /usr/bin/install-php-extensions /usr/local/bin/
COPY --from=composer_upstream --link /composer /usr/bin/composer

RUN set -eux; \
    install-php-extensions \
      pdo  \
      pdo_mysql \
    ;

RUN set -eux; \
	install-php-extensions xdebug-3.4.2; \
	echo "xdebug.mode=debug,develop,profile" >> $PHP_INI_DIR/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.start_with_request=yes" >> $PHP_INI_DIR/conf.d/docker-php-ext-xdebug.ini && \
	echo "xdebug.client_host=host.docker.internal" >> $PHP_INI_DIR/conf.d/docker-php-ext-xdebug.ini;

COPY --link php/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
COPY --link chat-app .

ENTRYPOINT ["docker-entrypoint"]

CMD [ "php-fpm" ]


