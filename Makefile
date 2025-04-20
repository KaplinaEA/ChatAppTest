start:
	docker compose up -d --build #поднять контейнера
	docker compose exec php php artisan migrate #накатить миграции
test:
	docker compose exec php php artisan test
add-data:
	docker compose exec php php artisan migrate:fresh --seed
