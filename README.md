# Troylab Test
## Installation
- Create troylab DB
```sh
git clone git@github.com:magdy2612/troylab-test.git
cp .env.example .env
```
- Set .env config vars
```sh
composer install
php artisan key:generate
sudo chmod -R 777 storage/*
php artisan migrate
php artisan db:seed
```
- To run the factory
```
php artisan tinker
factory('App\School', 20)->create()
factory('App\Student', 20)->create()
```
- To run re-order students
```
php artisan students:re-order
```

#### You Can Find Postman Collection into the root of project