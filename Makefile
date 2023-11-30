setup:
	@make build
	@make up 
	@make composer-update
build:
	docker-compose build --no-cache --force-rm
stop:
	docker-compose stop
up:
	docker-compose up -d
composer-update:
	docker exec laravel-docker bash -c "composer update"
data:
	docker exec laravel-docker bash -c "php artisan migrate"
	docker exec laravel-docker bash -c "php artisan db:seed"


# docker exec -it laravel-docker bash

# chmod -R 775 /var/www/html/storage         # Cambiar permisos
# chown -R www-data:www-data /var/www/html/storage  # Cambiar propietario
# exit 

# apt-get install -y nodejs
# apt-get install -y npm
# npm install -g vite
# curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.1/install.sh | bash
# nvm install node
# nvm use node
# npm install

# npm install laravel-mix --save-dev
# composer require --dev reliese/laravel
# php artisan vendor:publish --tag=reliese-models
# php artisan code:models

