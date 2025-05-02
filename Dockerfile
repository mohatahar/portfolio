# Utilise une image officielle Apache + PHP
FROM php:8.2-apache

# Copie les fichiers de ton portfolio dans le répertoire web d’Apache
COPY . /var/www/html/

# Donne les bons droits (optionnel selon le cas)
RUN chown -R www-data:www-data /var/www/html

# Active les modules Apache utiles (optionnel)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Expose le port 80
EXPOSE 80
