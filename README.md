# Laravel Avanser Call Tracking Package

This is a laravel package to connect to the Avanser call tracking platform.

http://www.avanser.com.au/

## Installation

### Composer

```shell
composer require wheredidgogogo/avanser
```

## Laravel

### Add Provider
In your `config/app.php` add the following `Wheredidgogogo\Avanser\AvanserServiceProvider::class,` to the providers array:
```php
'providers' => [
    ...
    Wheredidgogogo\Avanser\AvanserServiceProvider::class,
    ...
],

'alias => [
    ...
    'Avanser' => Wheredidgogogo\Avanser\AvanserFacade::class,
    ...
],
```

### Publish Configuration
```shell
php artisan vendor:publish
```

This will genetate a config file `config/avanser.php` where you will need to enter your Avanser API credentials.

## Use

```shell

$results = \Avanser::getCallData();

```

An array of values can be sent with the query:


```shell

date_from, date_to, last_id, limit, evaluations, features, wav, web, detailed, localtime

```
