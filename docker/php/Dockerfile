FROM php:8.3-fpm-alpine

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN set -ex \
    	&& apk --no-cache add postgresql-dev nodejs yarn npm  \
            libjpeg-turbo-dev\
            libpng-dev\
            libwebp-dev\
            freetype-dev\
            imagemagick\
            imagemagick-dev\
            libtool\
        && docker-php-ext-configure gd --with-jpeg --with-webp --with-freetype\
    	&& docker-php-ext-install pdo gd intl

RUN apk add git

RUN adduser -S 1000 -G www-data

WORKDIR /var/www/app
