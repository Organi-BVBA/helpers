## Installation

You can install the package via composer:

```bash
composer require organi/helpers
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Organi\Helpers\HelpersServiceProvider" --tag="helpers-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Organi\Helpers\HelpersServiceProvider" --tag="helpers-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Testing

```bash
composer test
```
