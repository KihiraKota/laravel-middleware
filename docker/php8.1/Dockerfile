FROM php:8.1

# DockerイメージからComposerをインストールする
COPY --from=composer /usr/bin/composer /usr/bin/composer

# 必要なパッケージをインストールする
RUN apt-get update
RUN apt-get install -y \
    zip \
    unzip \
    git \
    libzip-dev

# PHP拡張をインストールする
RUN docker-php-ext-install zip
