FROM debian:wheezy

RUN echo "deb http://packages.dotdeb.org wheezy all" >> /etc/apt/sources.list
RUN echo "deb-src http://packages.dotdeb.org wheezy all" >> /etc/apt/sources.list

RUN echo "deb http://packages.dotdeb.org wheezy-php55 all" >> /etc/apt/sources.list
RUN echo "deb-src http://packages.dotdeb.org wheezy-php55 all" >> /etc/apt/sources.list

COPY ./config/dotdeb.gpg /opt/dotdeb.gpg
RUN apt-key add /opt/dotdeb.gpg

RUN apt-get update && apt-get install -y \
php5-mcrypt \
php5-cli \
php5-curl \
php5-mongo \
php5-xdebug \
supervisor

RUN apt-get clean -y && apt-get autoclean -y && apt-get autoremove -y &&  rm -rf /var/lib/apt/lists/*

COPY ./config/supervisord.conf /etc/supervisor/supervisord.conf

VOLUME ["/var/www"]

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/supervisord.conf"]
#CMD ["/usr/bin/php", "/var/www/bin/console", "test", "notif:broker"]