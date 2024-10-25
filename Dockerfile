FROM webdevops/php-nginx:8.0-alpine

# Installation in your Image of the minimum required for Docker to function
RUN apk add oniguruma-dev libxml2-dev
RUN docker-php-ext-install \
        bcmath \
        ctype \
        fileinfo \
        mbstring \
        pdo_mysql \
        xml

# Installation of Composer in your image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installation of NodeJS if you have compiled assets 
#RUN apk add nodejs npm

ENV WEB_DOCUMENT_ROOT /app/public
ENV APP_ENV production
WORKDIR /app
COPY . .

# Copy the .env.example file and rename it to .env
# You can modify the .env.example file to specify your site's configuration for production
RUN cp -n .env.example .env


# https://laravel.com/docs/10.x/deployment#optimizing-configuration-loading
RUN composer update
RUN composer install --no-interaction --optimize-autoloader --no-dev

RUN php artisan key:generate

RUN php artisan config:cache

RUN php artisan route:cache

RUN php artisan view:cache

# If you have compiled assets 
#RUN npm install
#RUN npm run build

RUN chown -R application:application .