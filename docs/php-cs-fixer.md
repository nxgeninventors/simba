In order to use `friendsofphp/php-cs-fixer in a Laravel project, you will need to first install the package using Composer. You can do this by running the following command in the root of your project:

```bash
composer require friendsofphp/php-cs-fixer
```

Once the package is installed, you can use the `php-cs-fixer` command to lint and fix your code. You can run the command to check the code with the following command:

```bash
vendor/bin/php-cs-fixer fix --dry-run --diff
```

The --dry-run option will show you the changes that would be made without actually making them. The --diff option will show you a side-by-side comparison of the changes.

You can also fix the errors with the following command:


```bash
vendor/bin/php-cs-fixer fix
```

It's also worth noting that you can create a .php_cs file in the root of your project, to configure the rules and settings that php-cs-fixer should use.


```php

<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude('vendor')
    ->exclude('node_modules')
    ->name('*.php');

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setFinder($finder)
    ->setRules([
        '@Symfony' => true,
        'array_syntax' => ['syntax' => 'short'],
        'no_unused_imports' => true,
        'ordered_imports' => true,
    ]);

```

You can also use a preset configuration by adding the following to the .php_cs file

```php

use PhpCsFixer\Config;

$config = Config::create();
$config->setPreset('laravel');

return $config;

```

Once you've set up the configuration file, you can run the php-cs-fixer command by simply typing php-cs-fixer fix in the root of your project.

You can also integrate it with your development environment, for example, you can use the package laravel-ide-helper to generate the meta file for your editor's IntelliSense. Also, you can use php-cs-fixer in your continuous integration process to check and fix the code before deploying.