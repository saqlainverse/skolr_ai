FROM laravelsail/php83-composer:latest

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

RUN groupadd -g 1000 sail || true \
    && useradd -u 1000 -g sail -m sail || true

COPY . /var/www/html

COPY --chown=www-data:www-data . /var/www/html

USER sail

EXPOSE 8000
CMD ["/bin/bash", "-c", "php artisan serve --host=0.0.0.0 --port=8000"]
