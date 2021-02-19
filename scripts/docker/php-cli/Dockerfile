FROM php:7.4-cli-alpine

RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
    && pecl install xdebug-3.0.0 \
    && docker-php-ext-enable xdebug \
    && apk del -f .build-deps

#RUN echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini \
#    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/xdebug.ini \

RUN echo "xdebug.mode=coverage" >> /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /usr/src/app

COPY . ./

RUN chown -Rf www-data:www-data ./

USER www-data

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');"

RUN php composer.phar install

RUN php composer.phar run coverage

CMD [ "php", "-S", "0.0.0.0:8080" ]