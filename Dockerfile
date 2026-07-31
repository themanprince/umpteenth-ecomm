FROM php:8.2-apache

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy project files to the Apache server root
COPY . /var/www/html/

# debugging
RUN echo "debugging..."
RUN echo "Contents of /var/www/html:" && ls -la /var/www/html
RUN echo "Contents of icons:" && ls -la /var/www/html/icons || echo "icons folder not found"
RUN echo "searching for icon"
RUN find /var/www/html -name "feature_icon_4.svg"

# Enable Apache rewrite module
RUN a2enmod rewrite

# Allow .htaccess files to override configuration
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Change ownership of the web directory to Apache user
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 for Render
EXPOSE 80

