FROM php:8.5.0-cli-alpine3.23

RUN set -eux; \
    apk add --no-cache --virtual .build-deps \
    autoconf \
    dpkg-dev dpkg \
    file \
    g++ \
    gcc \
    libc-dev \
    make \
    pkgconf \
    linux-headers \
    re2c;

RUN set -eux; \
    apk add --update linux-headers;

RUN set -eux; \
    pecl install xdebug-3.5.0; \
    pecl install redis-6.3.0; \
    docker-php-ext-install sockets; \
    docker-php-ext-enable xdebug sockets redis;

RUN set -x \
&& php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
&& php -r "if (hash_file('sha384', 'composer-setup.php') === 'c8b085408188070d5f52bcfe4ecfbee5f727afa458b2573b8eaaf77b3419b0bf2768dc67c86944da1544f06fa544fd47') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
&& php composer-setup.php \
&& php -r "unlink('composer-setup.php');" \
&& mv composer.phar /sbin/composer

WORKDIR /app
