# InfraPHP
Project for site management on LEMP environments

Requirements
- PHP 8.1
- Composer

## Development
Clone the project and go into the directory
```
git@github.com:jorisros/InfraPHP.git && cd InfraPHP
```
Inside the project run composer install
```
composer install
```
Make a deployment
```
./bin/deploy ./server.php ./sites.php
```
And now there will be an nginx file configured that contains the sites that are configured in ``sites.php``
