FROM ubuntu:20.04

ARG ENV_NAME
ARG DEBIAN_FRONTEND=noninteractive

LABEL maintainer="alegonzalez74@gmail.com"
LABEL name="Empty WP"
LABEL version="2.0.0"

RUN apt-get update -y \
    && apt-get install -y apt-utils apt-transport-https \
    && apt-get clean;
RUN apt-get install -y wget curl git zip nano vim netcat supervisor cron rsyslog apache2 mysql-client python python-dev python3-pip python-setuptools \
    && apt-get clean;

# Apache Modules
RUN a2enmod proxy proxy_http proxy_balancer lbmethod_byrequests headers expires rewrite remoteip ssl;

# Install PPA Repository for PHP 8.1
RUN apt-get install -y software-properties-common \
    && apt-get clean;
RUN LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php && add-apt-repository ppa:ondrej/apache2 \
    && apt-get update -y;

RUN apt-get upgrade apache2 -y;

# Install php and php modules
RUN apt-get install -y php8.1 php8.1-cli php8.1-common libapache2-mod-php8.1 \
    && apt-get clean;
RUN apt-get install -y php8.1-mysql php8.1-dom php8.1-simplexml php8.1-pdo php8.1-curl php8.1-mbstring php8.1-zip php8.1-xml php8.1-xmlrpc php8.1-redis php8.1-intl \
    && apt-get clean;
RUN apt-get install -y php8.1-bcmath
RUN apt-get install -y php8.1-gd
RUN apt-get install -y php8.1-mcrypt
RUN php -v;
RUN a2enmod php8.1;

# Install PHPDoc
RUN wget https://phpdoc.org/phpDocumentor.phar;
RUN chmod +x phpDocumentor.phar && mv phpDocumentor.phar /usr/local/bin/phpdoc;

#XDEBUG
RUN apt-get install php8.1-xdebug -y

# Install composer
RUN wget -q 'https://getcomposer.org/installer' -O - | php; \
    mv composer.phar /usr/local/bin/composer;
RUN composer config -g repo.packagist composer https://packagist.org;
RUN composer config -g github-protocols https ssh;

ADD docker/httpd-foreground /bin/httpd-foreground
ADD docker/entrypoint.sh /entrypoint.sh

RUN chmod +x /bin/httpd-foreground;
RUN chmod +x /entrypoint.sh;

RUN sed -i \
    -e 's/upload_max_filesize = [0-9]\+M/upload_max_filesize = 100M/g' \
    -e 's/post_max_size = [0-9]\+M/post_max_size = 110M/g' \
    -e 's/memory_limit = [0-9]\+M/memory_limit = 1024M/g' \
    -e 's/; max_input_vars = [0-9]\+/max_input_vars = 10000/g' \
    -e 's/max_execution_time = [0-9]\+/max_execution_time = 200/g' \
    -e 's/session.gc_maxlifetime = [0-9]\+/session.gc_maxlifetime = 21600/g' \
    -e 's/short_open_tag = Off/short_open_tag = On/g' \
    -e 's/error_reporting = E_ALL \& ~E_DEPRECATED \& ~E_STRICT/error_reporting = E_ALL \& ~E_DEPRECATED \& ~E_STRICT \& ~E_NOTICE \& ~E_WARNING/g' \
    /etc/php/8.1/apache2/php.ini;
    #-e 's/session.save_handler = files/session.save_handler = redis\nsession.save_path = "tcp:\/\/redis"/g' \
    #-e 's/;session.cookie_secure =/session.cookie_secure = 1/g' \

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf;

#ANMS
RUN echo "session.auto_start = 1" >> /etc/php/8.1/apache2/php.ini

#XDEBUG
RUN echo "xdebug.client_host = host.docker.internal" >> /etc/php/8.1/apache2/php.ini
RUN echo "xdebug.mode = debug" >> /etc/php/8.1/apache2/php.ini
RUN echo "xdebug.start_with_request = 1" >> /etc/php/8.1/apache2/php.ini
RUN echo "display_startup_errors = on" >> /etc/php/8.1/apache2/php.ini
RUN echo "display_errors = on" >> /etc/php/8.1/apache2/php.ini


RUN ln -snf /usr/share/zoneinfo/US/Central /etc/localtime && echo "US/Central" > /etc/timezone;

# vhost configs
ADD docker/sites-enabled/000-default.conf /etc/apache2/sites-enabled

# source code
COPY . /usr/local/www
RUN chown www-data:www-data /usr/local/www
RUN chown www-data:www-data -R /usr/local/www

WORKDIR /usr/local/www

EXPOSE 80

CMD ["httpd-foreground"]
