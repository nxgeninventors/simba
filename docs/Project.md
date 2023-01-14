
# Step 1: Authentication

```bash
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

$url = asset('images/simba.svg');
```