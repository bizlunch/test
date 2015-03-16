FROM ebuildy/docker-nginx-php

RUN apt-get update && apt-get install -y \
php5-mcrypt

COPY ./config/nginx.conf /etc/nginx/nginx.conf