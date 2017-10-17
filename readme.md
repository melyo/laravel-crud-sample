# Product CRUD

### Technology Used

- Laravel 5.5 requires PHP >= 7.0.0
- jQuery
- Bootstrap
- Scss

### Set up

- `git clone https://melyo360@bitbucket.org/melyo360/product-crud.git`
- `cd product-crud`
- `composer install`
- set up database and configure .env file
- `php artisan key:generate`
- `php artisan config:cache`
- `php artisan migrate --seed`
- set up your host file or simply run`php artisan serve`

### Routes

| Method    | URI                       | Name            |
| ---       | ---                       | ---             |
| GET       | /products                 | products.index  |
| POST      | /products                 | products.store  |
| DELETE    | /products                 | products.delete |
| GET       | /products/create          | products.create |
| GET       | /products/{product}       | products.show   |
| PUT       | /products/{product}       | products.update |
| GET       | /products/{product}/edit  | products.edit   |
