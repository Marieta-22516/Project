FROM php:8.2-apache

# Инсталираме MySQL driver за PHP
RUN docker-php-ext-install mysqli

# Активираме mod_rewrite (по желание, но е добра практика)
RUN a2enmod rewrite

# Копираме целия проект в Apache директорията
COPY . /var/www/html/

# Права (важно за Apache)
RUN chown -R www-data:www-data /var/www/html

# Работна директория
WORKDIR /var/www/html

# Отваряме порт 80
EXPOSE 80