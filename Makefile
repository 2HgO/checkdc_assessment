ifeq (, $(shell which php))
$(error php not installed, please install php v8.0.0+)
endif
ifeq (, $(shell which docker))
$(error docker not installed, please install docker v24.0.0+)
endif
ifeq (, $(shell which composer))
$(error composer not installed, please install composer v2.0.0+)
endif

dev: deps
	@php artisan migrate
	@$(MAKE) -j3 app scheduler queue_worker

.PHONY: deps
deps:
	@composer install > /dev/null
	@docker-compose up -d db

.PHONY: app
app:
	@php artisan serve

.PHONY: queue_worker
queue_worker:
	@php artisan queue:work

.PHONY: scheduler
scheduler:
	@php artisan schedule:work 

.PHONY: docs
docs:
	@docker compose up docs
	
.PHONY: seed
seed: deps
	@php artisan migrate --seed
