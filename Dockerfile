FROM php:8.3-apache AS runtime
ARG APACHE_DOCUMENT_ROOT=/var/www/html/public
ENV APACHE_DOCUMENT_ROOT=${APACHE_DOCUMENT_ROOT}

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git \
        curl \
        unzip \
        libzip-dev \
        libpng-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
        libicu-dev \
        libxml2-dev \
        libonig-dev \
        libcurl4-openssl-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" \
        bcmath \
        curl \
        gd \
        intl \
        mbstring \
        pdo_mysql \
        pcntl \
        xml \
        zip \
        opcache \
    && a2enmod rewrite headers expires \
    && sed -ri -e "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" \
        /etc/apache2/sites-available/000-default.conf \
        /etc/apache2/conf-available/docker-php.conf \
    && printf '<Directory /var/www/html/public>\n    AllowOverride All\n    Require all granted\n</Directory>\n' > /etc/apache2/conf-available/innoshop.conf \
    && a2enconf innoshop \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html

COPY . .

RUN rm -rf node_modules vendor \
    && composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader \
    && [ -f .env ] || cp .env.example .env \
    && mkdir -p public/cache \
    && chown -R www-data:www-data .env storage bootstrap/cache public/cache \
    && chmod 755 .env \
    && chmod -R ug+rwx storage bootstrap/cache public/cache

EXPOSE 80

CMD ["apache2-foreground"]
