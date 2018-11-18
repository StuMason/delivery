ifndef COMPOSE_PROJECT_NAME
	COMPOSE_PROJECT_NAME=delivery
endif

ifndef UNIQUE_BUILD_ID
	UNIQUE_BUILD_ID=local
endif

# User & Group ID used in Dockerfile for correcting permissions
UID=$(shell id -u `whoami`)
GID=$(shell id -g `whoami`)

DOCKER_COMPOSE=docker-compose -p $(COMPOSE_PROJECT_NAME) -f docker-compose.yml

DOCKER_EXEC_PHP=$(DOCKER_COMPOSE) exec -T -u www-data php
DOCKER_RUN_PHP=$(DOCKER_COMPOSE) run --rm -u www-data php

DOCKER_IMAGE_NGINX=delivery-nginx:$(UNIQUE_BUILD_ID)
DOCKER_IMAGE_PHP=delivery-php:$(UNIQUE_BUILD_ID)

build: #Build nginx and php containers
	make build-php build-nginx

build-php: ## Build the php image
	docker build -t $(DOCKER_IMAGE_PHP) -f docker/php/Dockerfile .

build-nginx: ## Build the nginx image
	docker build -t $(DOCKER_IMAGE_NGINX) -f docker/nginx/Dockerfile .

install-database: ## Run database migration & seeders
	make wait-for-db migrate seed-db

migrate: ## Migrate next batch
	$(DOCKER_EXEC_PHP) php artisan migrate

migrate-seed: ## Migrate next batch
	$(DOCKER_EXEC_PHP) php artisan migrate:fresh --seed

migrate-rollback: ## Rollback last
	$(DOCKER_EXEC_PHP) php artisan migrate:rollback

migrate-fresh: ## Clean database and run all migrations
	$(DOCKER_EXEC_PHP) php artisan migrate:fresh

down: ## Remove all containers
	$(DOCKER_COMPOSE) down

down-and-remove-volumes: ## Removes volumes
	$(DOCKER_COMPOSE) down -v

tinker: ## Run artisan tinker
	$(DOCKER_RUN_PHP) php artisan tinker

seed-db: ## Seed all the Databases
	$(DOCKER_EXEC_PHP) php artisan db:seed

start: ## Start main containers
	$(DOCKER_COMPOSE) up -d nginx

stop: ## Stop containers
	$(DOCKER_COMPOSE) stop

test: ## Run PHPUnit tests
	APP_ENV="test" make wait-for-db migrate-fresh run-unit

run-unit: ## run phpunit alone
	$(DOCKER_EXEC_PHP) ./vendor/bin/phpunit --stop-on-failure

puf: ## run phpunit with --filter, like so: TEST=nameOfTestMethodOrClass make puf
	$(DOCKER_EXEC_PHP) ./vendor/bin/phpunit --filter $(TEST)

clear-cache: ## Clear cache
	$(DOCKER_EXEC_PHP) php artisan cache:clear

watch-logs: ## Tail the docker logs
	$(DOCKER_COMPOSE) logs -f

wait-for-db: ## Run the script/wait-for-db.sh script
	$(DOCKER_COMPOSE) exec -T db /tmp/wait.sh

tail:
	tail -n 300 -f storage/logs/laravel.log

.SILENT: help
help: ## Show this help message
	set -x
	echo "Usage: make [target] ..."
	echo ""
	echo "Available targets:"
	grep ':.* ##\ ' ${MAKEFILE_LIST} | awk '{gsub(":[^#]*##","\t"); print}' | column -t -c 2 -s $$'\t' | sort

default: ## Run the make start command
	make start

ps:
	$(DOCKER_COMPOSE) ps