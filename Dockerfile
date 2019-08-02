FROM php:7.3-fpm AS build

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/composer

RUN apt-get update && apt-get install --no-install-recommends --no-install-suggests -y \
    git \
    unzip \
    zip \
    && rm -rf /var/lib/apt/lists/*

# Copy the Composer PHAR from the Composer image into our image
COPY --from=composer:1.8 /usr/bin/composer /usr/bin/composer

ENV PATH="/composer/vendor/bin:/var/www/app/vendor/bin:$PATH"

# Install composer packages
WORKDIR /var/www/app
COPY --chown=www-data:www-data ./composer.json ./
RUN composer config github-oauth.github.com 7bac08d6e7edd3d2e33fc3673e9d1eebf819cef9
RUN composer global require hirak/prestissimo
RUN composer install --no-scripts --no-autoloader --ansi --no-interaction

COPY .docker/config/entrypoint.sh /usr/bin/entrypoint.sh
RUN chmod 775 /usr/bin/entrypoint.sh
ENTRYPOINT ["/usr/bin/entrypoint.sh"]

CMD ["echo", "Please supply a comand to run"]
