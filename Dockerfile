FROM php:8.2-cli

# Set the working directory to /var/www/html
WORKDIR /var/www/html/

# Copy all files from the github repo to the container
COPY . .

# Remove unnecessary files
RUN rm Dockerfile README.md 

# Create the php.ini config file
RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

EXPOSE 80
CMD ["php", "-S", "0.0.0.0:80"]


