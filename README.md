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
    cp .env.example .env
    ````
4. spin up all containers
    ````
    docker compose up -d
    ````
5. install packages on app container
    ````
    composer update && composer install
    ````
6. generate key into .env APP_KEY
    ````
    php artisan key:generate
    ````
7. run migration files
    ````
    php artisan migrate
    ````