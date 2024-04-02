# Base image
FROM php:8.1-apache


# Install required dependencies
RUN apt-get update && \
    apt-get install -y --fix-missing \
    libzip-dev \
    zip \
    unzip \
    nano \
    curl \
    cron \
    dos2unix

# Install the required version of Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#Install MySQL driver
RUN docker-php-ext-install pdo_mysql

# Install Supervisor
RUN apt-get install -y supervisor

# Create a Supervisor configuration directory
RUN mkdir -p /etc/supervisor/conf.d

# Copy Supervisor configuration file into the container directory
COPY supervisor/docker-worker.conf /etc/supervisor/conf.d/docker-worker.conf

# Set working directory
WORKDIR /var/www/html

# Copy app files
COPY . /var/www/html   
COPY apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Adjust PHP memory_limit
RUN echo "memory_limit=512M" > /usr/local/etc/php/conf.d/memory.ini


# Install dependencies
RUN composer install --prefer-dist --no-interaction

# Set file permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache 
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache 

# Enable Apache modules
RUN a2enmod rewrite

# Configure cron
RUN touch /var/log/cron.log

# Script file copied into container.
COPY ./start.sh /start.sh

# convert to UNIX style
RUN dos2unix /start.sh

# Giving executable permission to script file.
RUN chmod +x /start.sh

# Expose port 80
EXPOSE 80

# Do house-keeping
RUN php artisan config:cache && \
    php artisan route:cache 

# Start Apache server, queue worker and cron service
CMD ["/bin/bash", "-c", "service apache2 start && /start.sh && cron && supervisord -n"]
