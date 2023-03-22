
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


php artisan make:controller Api/MeetingNotesController --api
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

# Laravel Pint

# ADD scss support

```bash
yarn add sass -D
```

```js
# update vite.config.s

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});

```

```php

# Update layout file 
@vite(['resources/css/app.scss', 'resources/js/app.js'])

```


# Add New User

```php

# use terminal
php artisan tinker

use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => "Santhosh",
    'email' => "sandy@nxgeninventors.com",
    'password' => Hash::make("sandy@123"),
]);

```

-- https://stackoverflow.com/questions/37735055/laravel-database-schema-nullable-foreign