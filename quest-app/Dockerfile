FROM php:8.1-alpine

COPY . /quest-app/
WORKDIR /quest-app/

CMD ["php", "artisan", "serve"]

#CMD php artisan serve --host=0.0.0.0 --port=8181
CMD php artisan serve --host=0.0.0.0

EXPOSE 8000
