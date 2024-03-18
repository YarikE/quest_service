FROM php:8.1-apache

#Installing dependencies
RUN ["apt-get", "update"]
RUN ["apt-get", "install", "-y", "libpq-dev", "git", "curl", "libpng-dev", "libonig-dev", "libxml2-dev", "zip", "unzip"]
RUN ["docker-php-ext-install", "pdo", "pdo_pgsql"]

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

#COPY . /quest-app/
WORKDIR /quest-app/

#RUN php -f composer.phar install

#Run app
#RUN chmod +x run/run.sh
#CMD ["./run/run.sh"]

EXPOSE 8000

ENTRYPOINT /quest-app/run/run.sh
