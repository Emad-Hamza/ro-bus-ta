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
docker compose up
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

## How it works:

- Each station in a trip has a number(station_order) that represents its order in that trip.

__To create a new trip:__
1. Create a new entry in /admin/trips
2. Add stations to that trip by creating entries for each needed stations in /admin/stations-trips using the trip ID and the desired station ID, station, each entry represents a specific station's order in a specific trip.
