FROM php:8.2-cli

LABEL version=1.0.1
LABEL app=Monitor.php

# Set the working directory to /var/www/html
WORKDIR /var/www/html/

# Copy all files to the container
COPY . .

# Create the php.ini config file
RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

EXPOSE 80
CMD ["php", "-S", "0.0.0.0:80"]
