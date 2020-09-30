#!/bin/bash
# This is a handy script for installing the project using docker.  This will set up the
# development environment for you.

echo "Setting up the dev environment.\r\n"
docker-compose up -d --build
docker-compose run --rm da_composer install
docker-compose run --rm da_npm install
docker-compose run --rm da_npm run dev
docker-compose run --rm da_artisan migrate
docker-compose run --rm da_artisan db:seed
echo "Set up completed. Please visit http://localhost:8080/ in your browser.\r\n"
echo "Happy Coding!\r\n"
