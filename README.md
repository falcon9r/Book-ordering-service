Book ordering service
======================== 

Requirements
------------

* PHP 8.1.0 or higher;
* Composer 2.5 or higher;
* MariaDB 10.4.24-MariaDB or others
* and the [usual Laravel application requirements][3].


Installation
------------

Download Zip or using git, you can get project:

Clone the repository
```bash
   git clone https://github.com/falcon9r/Book-ordering-service.git
```

Switch to the repo folder
```bash
   cd Book-ordering-service
```

Install all the dependencies using composer
```bash
   composer install
```

Copy the example env file and make the required configuration changes in the .env file
```bash
   cp .env.example .env
```

Generate a new application key
```bash
   php artisan key:generate
```

Update the dependencies using composer
```bash
   composer update
```

Run the database migrations (Set the database connection in .env before migrating)
for more [docs][6]

```bash
  php artisan migrate --path="database/migrations/*"
```

```bash
  php artisan db:seed
```

Default User
------------------
    Email: falcon.9roc@gmail.com    
    Password: password

[6]: https://laravel.com/docs/9.x/migrations
