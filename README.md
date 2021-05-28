## Laravel Hebcal Api Package
Simple API implementation of [Hebcal.com](https://www.hebcal.com/) Jewish holiday calendars for Laravel

This package implements:
- Jewish calendar REST API

## Installation

`composer require ivy47/hebcal-api`

or add it to your composer.json and run `composer update ivy47/hebcal-api`

## Publish Config File
The `vendor:publish` commmand will publish a file named hebcal.php within your laravel project config folder config/hebcal.php.

`php artisan vendor:publish --provider="Ivy47\HebcalApi\HebcalServiceProvider"`

Published Config File Contents
```
'base_uri' => 'https://www.hebcal.com',
'hebcal_uri' => '/hebcal/',

'use_cache' => false,
'cache_store' => 'file'
```

To enable hebcal api requests cache - change `use_cache` value to true. Also, you can set the cache store driver. For more details check Laravel [driver-prerequisites](https://laravel.com/docs/8.x/cache#driver-prerequisites) documentation 

## Usage

### Use HebcalApi Facade
To get the holidays use the `HebcalApi` method `getHolidays($params)`
```php
use Ivy47\HebcalApi\Facades\HebcalApiFacade as HebcalApi;

$params = [
            'v' => 1,
            'cfg' => 'json',
            'maj' => 'on',
            'min' => 'on',
            'mod' => 'on',
            'nx' => 'on',
            'month' => 'x',
            'ss' => 'on',
            'mf' => 'on',
            'c' => 'on',
            ...
            ];

$hebcalCalendar = HebcalApi::getHolidays($params);
```

To see more details about params check Hebcal.com [Jewish calendar REST API documentation](https://www.hebcal.com/home/195/jewish-calendar-rest-api)

## API Resources

This package provides Laravel API Resources of Hebcal ready to use 

To get api resource of HebcalCalendar use `getResource()` method

```php
/** @var \Ivy47\HebcalApi\Http\Resources\HebcalCalendar\HebcalCalendarResource $hebcalCalendarResource */
$hebcalCalendarResource = $hebcalCalendar->getResource();
```

But if you need raw (json) or decoded response data use:
```php
$json = $hebcalCalendar->getJson();
$decoded = $hebcalCalendar->getDecoded();
```

## Useful Links

- [Hebcal](https://www.hebcal.com/)
- [Laravel Cache](https://laravel.com/docs/8.x/cache)
- [Laravel API Resources](https://laravel.com/docs/8.x/eloquent-resources)


