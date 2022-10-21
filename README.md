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

```bash
docker-comopser up
```
```bash
docker-compose exec laravel.test composer install
```
```bash
docker-compose exec laravel.test npm install
```
```bash
docker-compose exec laravel.test npm run craftable-dev
```
```bash
docker-compose exec laravel.test npm run craftable-dev
```

## Local environment Installation ##

```bash
composer install
```
```bash
npm install
```
```bash
npm run craftable-dev
```
```bash
php artisan serve
```

## Urls:

- Admin panel: /admin
- API swagger documentation: /api/documentation
