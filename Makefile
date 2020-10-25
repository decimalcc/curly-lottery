SHELL := /bin/bash

.PHONY: help

help:
	@IFS=$$'\n' ; \
    help_lines=(`fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//' | sed -e 's/##/:/'`); \
    printf "%-30s %s\n" "target" "help" ; \
    printf "%-30s %s\n" "------" "----" ; \
    for help_line in $${help_lines[@]}; do \
        IFS=$$':' ; \
        help_split=($$help_line) ; \
        help_command=`echo $${help_split[0]} | sed -e 's/^ *//' -e 's/ *$$//'` ; \
        help_info=`echo $${help_split[2]} | sed -e 's/^ *//' -e 's/ *$$//'` ; \
        printf '\033[36m'; \
        printf "%-30s %s" $$help_command ; \
        printf '\033[0m'; \
        printf "%s\n" $$help_info; \
    done

setup: ## Setup the system
	@printf "\n# Slotegrator test task hosts\n" >> /etc/hosts
	@printf "127.0.0.1 slotegrator.local\n" >> /etc/hosts
	@cp .env.example .env
	@docker-compose up -d
	@docker-compose exec php php composer install
	@docker-compose exec php php artisan migrate
	@printf '\033[0;32mThe system was successfully setup\n'

start: ## Start the system
	@docker-compose up -d
	@printf '\033[0;32mThe system started successfully\n'

stop: ## Stop the system containers
	@docker-compose stop
	@printf '\033[0;32mThe system stopped successfully\n'

restart: ## Restart the system containers
	@docker-compose restart
	@printf '\033[0;32mThe system restarted successfully\n'

remove: ## Remove the system containers
	@docker-compose rm -s
	@printf '\033[0;32mThe system containers removed successfully\n'

bash: ## The application container bash
	@printf '\033[0;32mStarting system bash...\033[0m\n'
	@docker-compose exec php bash

list: ## List of the system containers
	@docker-compose ps
