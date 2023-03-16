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

## Run the tests
```
./vendor/bin/phpunit tests
```

## Install on server
The following oneliner downloads the files untar them in put them in a directory
```
wget --header="Accept:application/vnd.github.v3.raw" -O - https://api.github.com/repos/jorisros/InfraPHP/tarball/main | tar xz -C ./ && mv ./jorisros-InfraPHP-* ./infra-php
```
Go into the directory of the project
```
cd infra-php
```
Then run composer for the needed dependencies
```
composer install
```
Configure the ``server.php`` and the ``sites.php``. And call 
```
./bin/deploy
```
