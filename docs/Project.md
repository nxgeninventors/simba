
# Step 1: Authentication

```bash

# https://bootcamp.laravel.com/blade/installation

composer require laravel/breeze --dev

# If you would like Breeze to include "dark mode" 

php artisan breeze:install --dark

php artisan migrate


# node_modules installation
yarn

# run node dev build
yarn dev
```

# ADMIN PASSWORD

```
admin@admin.com / admin123
```

# Git local branch delete

```
git branch --delete feature/logo
```

# LOGO 

```php

# The asset function generates a URL for an asset using the current scheme of the request (HTTP or HTTPS):

# create `images` dir under public folder

# https://laravel.com/docs/9.x/helpers#method-asset

$url = asset('images/simba.svg');
```

# Step 3: Adding Project, Income & Expense

```
php artisan make:migration create_countries_table
php artisan make:migration create_project_categories_table
php artisan make:migration create_clients_table
php artisan make:migration create_client_contacts_table
php artisan make:migration create_project_managers_table
php artisan make:migration create_project_members_table
php artisan make:migration create_expense_statuses_table

php artisan make:model Project -a 
php artisan make:model Income -a
php artisan make:model Expense -a
php artisan make:model MeetingNote -a
```

## Populate countries data from sql

```php
# create new folder in `resources/sql`

# now update following code in `database/seeders/DatabaseSeeder.php`

use Illuminate\Support\Facades\DB;

$file_path = resource_path('sql/countries.sql');

DB::unprepared(
    file_get_contents($file_path)
);

```