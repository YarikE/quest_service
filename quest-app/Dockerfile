FROM php:8.1-apache

#Installing dependencies
RUN ["apt-get", "update"]
RUN ["apt-get", "install", "-y", "libpq-dev"]
RUN ["docker-php-ext-install", "pdo", "pdo_pgsql"]

COPY . /quest-app/
WORKDIR /quest-app/

#Run app
RUN chmod +x run/run.sh
CMD ["./run/run.sh"]

EXPOSE 8000

#CMD while true; do sleep 1000; done
