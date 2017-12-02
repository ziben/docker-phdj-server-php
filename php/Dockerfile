FROM php:5-fpm-alpine

RUN sed -ri -e 's!http://dl-cdn.alpinelinux.org!https://mirrors.aliyun.com!g' /etc/apk/repositories

RUN apk update && \
    apk --no-cache add $PHPIZE_DEPS openssl-dev ca-certificates tzdata &&\
    ln -sf /usr/share/zoneinfo/Asia/Shanghai /etc/localtime && \
    echo "Asia/Shanghai" > /etc/timezone

RUN docker-php-ext-install mysqli \
    && pecl install redis-3.1.4 \
    && docker-php-ext-enable redis \
    && pecl install mongodb-1.3.3 \
    && docker-php-ext-enable mongodb 

RUN curl -fsSL 'https://github.com/tideways/php-profiler-extension/archive/v4.1.4.tar.gz' -o tideways.tar.gz \
    && mkdir -p /tmp/tideways \
    && tar -xf tideways.tar.gz -C /tmp/tideways --strip-components=1 \
    && rm tideways.tar.gz \
    && docker-php-ext-configure /tmp/tideways \
    && docker-php-ext-install /tmp/tideways \
    && rm -r /tmp/tideways
     
COPY timezone.ini /usr/local/etc/php/conf.d/
COPY tideways.ini /usr/local/etc/php/conf.d/
COPY phpinfo.php /var/www/html/
