# ro-bus-ta #
a fleet-management system (bus-booking system) using the latest version of the Laravel Framework.

## Requirements ##


To run it in a docker container:
- Docker 20.0+

Or to run the project locally:
- PHP 8.1+
- Supported databases:
  - MySQL 5.7+
- npm 5.3+
- node 8.4+


## Docker Installation ##

1. Start and run the container
```bash
docker comopse up
```
2. Install the laravel dependencies
```bash
docker compose exec laravel.test composer install
```
3. Install the node modules
```bash
docker compose exec laravel.test npm install
```
4. Compile the assets
```bash
docker compose exec laravel.test npm run craftable-dev
```
5. Start the laravel app server
```bash
docker compose exec laravel.test npm run ./vendor/bin/sail up
``` 
Or
```bash
docker compose exec laravel.test npm run php artisan serve
```


## Local environment Installation ##

1. Install the laravel dependencies
```bash
composer install
```
2. Install the node modules
```bash
npm install
```
3. Compile the assets
```bash
npm run craftable-dev
```
4. Start the laravel app server
```bash
php artisan serve
```

## Urls:

- Admin panel: /admin
- API swagger documentation: /api/documentation
