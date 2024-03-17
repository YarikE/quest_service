FROM php:8.1-apache

#Installing dependencies
RUN ["apt-get", "update"]
RUN ["apt-get", "install", "-y", "libpq-dev", "git"]
RUN ["docker-php-ext-install", "pdo", "pdo_pgsql"]

#COPY . /quest-app/
WORKDIR /quest-app/

#RUN php -f composer.phar install

#Run app
#RUN chmod +x run/run.sh
#CMD ["./run/run.sh"]

EXPOSE 8000

ENTRYPOINT ls /quest-app/ && /quest-app/run/run.sh
