FROM php:7.4-apache

# Install MySQL client and other dependencies
RUN apt-get update && apt-get install -y \
    default-mysql-client \
    dnsutils \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy application files
COPY src/ /var/www/html/
# Copy images
COPY images/ /var/www/html/images/

# Create flag file
RUN echo "CTF{Secret_Flag_On_Server}" > /flag.txt

# Set permissions
RUN chown -R www-data:www-data /var/www/html/
RUN chmod 755 /var/www/html/
RUN chmod 644 /flag.txt

# Configure Apache
RUN a2enmod rewrite

EXPOSE 80
