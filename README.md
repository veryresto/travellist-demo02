## Setup Server
We are using DigitalOcean droplet with Ubuntu 22.04 for testing the application.

php version that is automatically install using command apt is php8.3

1. install docker
    ````
    snap install docker
    ````
2. clone app
    setup private key on ~/.ssh/id_ed25519
    ````
    cd ~
    git clone git@github.com:veryresto/travellist-demo02.git
    ````
3. create .env from .env.example
    ````
    cd ~/travellist-demo02
    cp .env.example .env
    ````
4. spin up all containers
    ````
    docker compose up -d
    ````
5. install packages on app container
    ````
    docker compose exec app composer update
    docker compose exec app composer install
    ````
6. generate key into .env APP_KEY
    ````
    docker compose exec app php artisan key:generate
    ````
7. run migration files
    ````
    docker compose exec app php artisan migrate
    ````
8. seed data
    ````
    docker compose exec app php artisan db:seed --class=PlacesSeeder
    ````