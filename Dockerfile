FROM php:8.1-apache

# Instalar dependências e pdo_mysql
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo_mysql

# Habilitar mod_rewrite para o Apache
RUN a2enmod rewrite

# Configurar o diretório de trabalho
WORKDIR /var/www/html

# Configurar Apache para usar o .htaccess
RUN echo '<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/htaccess.conf \
    && a2enconf htaccess

# Definir permissões
RUN chown -R www-data:www-data /var/www/html

# Comando para iniciar o Apache
CMD ["apache2-foreground"]