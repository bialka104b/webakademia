FROM php:8.0-apache
RUN apt-get update \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y \
        openssh-client \
        curl \
        mariadb-client \
        libpq-dev \ 
        #libpq-dev  - postgres
    && apt-get clean \
    && rm -r /var/lib/apt/lists/*
RUN apt-get update
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install pdo_pgsql