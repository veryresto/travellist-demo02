## References
1. [Ensure linux server has non-root user](https://www.digitalocean.com/community/tutorials/initial-server-setup-with-ubuntu)
2. [Give non-root user access to docker command](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-22-04)
3. [Setup laravel using docker compose](https://www.digitalocean.com/community/tutorials/how-to-install-and-set-up-laravel-with-docker-compose-on-ubuntu-22-04)
## Setup Server
We are using DigitalOcean droplet with Ubuntu 22.04 for testing the application.

php version that is automatically install using command apt is php8.3

1. as root user, add non-root user
    ````
    adduser --disabled-password --gecos "" sammy
    ````
    ````
    usermod -aG sudo sammy
    ````
    ````
    rsync --archive --chown=sammy:sammy ~/.ssh /home/sammy
    ````
2. login as non-root user, then install docker
    ````
    sudo apt update
    sudo apt install apt-transport-https ca-certificates curl software-properties-common
    curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg
    echo "deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
    sudo apt update
    sudo apt install -y docker-ce
    ````
    allow current non-root user to execute docker command. 
    ````
    sudo usermod -aG docker ${USER}
    ````
    Need to relogin as current non-root user to another session after executing this command.
3. clone app
    ````
    cd ~
    git clone https://github.com/veryresto/travellist-demo02.git
    ````
4. create .env from .env.example
    ````
    cd ~/travellist-demo02
    cp .env.example .env
    ````
5. spin up all containers
    ````
    docker compose up -d
    ````
6. install packages on app container
    ````
    docker compose exec app composer update
    docker compose exec app composer install
    ````
7. generate key into .env APP_KEY
    ````
    docker compose exec app php artisan key:generate
    ````
8. run migration files and seed data
    ````
    docker compose exec app php artisan migrate
    ````
    ````
    docker compose exec app php artisan db:seed --class=PlacesSeeder
    ````

    
