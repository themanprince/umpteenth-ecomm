FROM php:8.2-apache

# Copy project files to the Apache server root
COPY . /var/www/html/

# Enable Apache rewrite module
RUN a2enmod rewrite

# Allow .htaccess files to override configuration
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Change ownership of the web directory to Apache user
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 for Render
EXPOSE 80

