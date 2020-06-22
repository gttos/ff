.PHONY: build deps composer-install composer-update composer reload test run-tests start stop destroy doco rebuild start-local ping-mysql composer-require composer-require-module

current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

build: deps start

deps: composer-install

# 🐘 Composer
composer-env-file:
	@if [ ! -f .env.local ]; then echo '' > .env.local; fi

composer-install: CMD=install
composer-update: CMD=update
composer-require: CMD=require
composer-require: INTERACTIVE=-ti --interactive
composer-require-module: CMD=require $(module)
composer-require-module: INTERACTIVE=-ti --interactive
composer composer-install composer-update composer-require composer-require-module: composer-env-file
	@docker run --rm $(INTERACTIVE) --volume $(current-dir):/app --user $(id -u):$(id -g) \
		clevyr/prestissimo $(CMD) \
			--ignore-platform-reqs \
			--no-ansi

reload: composer-env-file
	@docker-compose exec php-fpm kill -USR2 1
	@docker-compose exec nginx nginx -s reload

test: composer-env-file
	@docker exec gtto-ff-php make run-tests

run-tests: composer-env-file
	mkdir -p build/test_results/phpunit
	./vendor/bin/phpunit --exclude-group='disabled' --log-junit build/test_results/phpunit/junit.xml tests
	./vendor/bin/behat -p mooc_backend --format=progress -v

# 🐳 Docker Compose
start: CMD=up -d
stop: CMD=stop
destroy: CMD=down

# Usage: `make doco CMD="ps --services"`
# Usage: `make doco CMD="build --parallel --pull --force-rm --no-cache"`
doco start stop destroy: composer-env-file
	@docker-compose $(CMD)

rebuild: composer-env-file
	docker-compose build --pull --force-rm --no-cache
	make deps
	make start

prepare-local:
	curl -sS https://get.symfony.com/cli/installer | bash

start-local:
	symfony serve --dir=apps/mooc/backend/public --port=8030 -d --no-tls --force-php-discovery
	symfony serve --dir=apps/backoffice/frontend/public --port=8032 -d --no-tls --force-php-discovery
	symfony serve --dir=apps/backoffice/backend/public --port=8034 -d --no-tls --force-php-discovery

stop-local:
	symfony server:stop --dir=apps/mooc/backend/public
	symfony server:stop --dir=apps/backoffice/frontend/public
	symfony server:stop --dir=apps/backoffice/backend/public
	
ping-mysql:
	@docker exec gtto-ff-mooc-mysql mysqladmin --user=root --password= --host "127.0.0.1" ping --silent

