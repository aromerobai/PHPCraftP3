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


# docker exec -it laravel-docker bash  # Acceder al contenedor

# chmod -R 775 /var/www/html/storage         # Cambiar permisos
# chown -R www-data:www-data /var/www/html/storage  # Cambiar propietario
# exit   