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