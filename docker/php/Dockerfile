# 基盤となるimageを取得
FROM php:7.3-fpm

# Host(PC)のファイルをコンテナ内へCOPY
COPY ./docker/php/php.ini /usr/local/etc/php/
COPY ./server /work

# Host(PC)のファイルをコンテナ内へCOPY
RUN apt-get update && apt-get -y upgrade
RUN apt-get install -y zlib1g-dev \ 
    libzip-dev \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmagickwand-dev --no-install-recommends \
    zip \
    unzip

#by using npm install
RUN curl -SL https://deb.nodesource.com/setup_15.x | bash   
RUN apt-get install -y nodejs
RUN apt-get install -y jq

#Composer install
COPY --from=composer /usr/bin/composer /usr/bin/composer

#環境変数を設定
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

#/workへ移動
WORKDIR /work
