FROM phpdockerio/php:8.1-fpm
WORKDIR "/application"

RUN apt-get update && apt-get install -y \
      apt-utils \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      zip unzip \
      git && \
      docker-php-ext-install pdo_mysql && \
      docker-php-ext-install bcmath && \
      docker-php-ext-install gd && \
      docker-php-ext-install zip && \
      apt-get clean && \
      rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
RUN apt-get update; \
      apt-get -y --no-install-recommends install \
      php8.1-xdebug \
      php8.1-mysql \
      php8.1-redis \
      php8.1-ds \
      php8.1-bcmath\
      php8.1-xmlrpc \
      php8.1-xsl \
      php8.1-xmlwriter \
      php8.1-xml \
      php8.1-tokenizer \
      php8.1-mbstring \
      php8.1-dom \
      php8.1-yac \
      php8.1-dom \
      php8.1-yaml; \
      apt-get clean; \
      rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
# Install composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin \
