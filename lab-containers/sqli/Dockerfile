# Usa una imagen base de PHP con Apache
FROM php:7.4-apache

# Instala la extensión mysqli
RUN docker-php-ext-install mysqli

# Copia el código de la aplicación a /var/www/html/
COPY ./volume /var/www/html/

# Otorga los permisos necesarios a los archivos copiados
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html
