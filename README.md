## Laravel Hebcal Api Package
Simple API implementation of [Hebcal.com](https://www.hebcal.com/) Jewish holiday calendars for Laravel

This package implements:
- Jewish calendar REST API
- Hebrew Date Converter REST API
- Shabbat times REST API
- Zmanim (halachic times) API

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
'converter_uri' => '/converter/',
'shabbat_uri' => '/shabbat/',

'use_cache' => false,
'cache_store' => 'file'
```

To enable hebcal api requests cache - change `use_cache` value to true. Also, you can set the cache store driver. For more details check Laravel [driver-prerequisites](https://laravel.com/docs/8.x/cache#driver-prerequisites) documentation 

## Usage

### Jewish calendar
Use HebcalApi Facade. To get the holidays use the `HebcalApi` method `getHolidays($params)`
```php
use Ivy47\HebcalApi\Facades\HebcalApiFacade as HebcalApi;

$params = [
            'v' => 1,
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

$hebcalCalendarResponse = HebcalApi::getHolidays($params);
```

To see more details about params check [Jewish calendar REST API documentation](https://www.hebcal.com/home/195/jewish-calendar-rest-api)

### Hebrew Date Converter
To convert date use `HebcalApi` method `convertDate($params)`
```php
use Ivy47\HebcalApi\Facades\HebcalApiFacade as HebcalApi;

$params = [
            'gy' => 2011,
            'gm' => 6,
            'gd' => 2,
            'g2h' => 1,
            ...
            ];

$hebrewDateResponse = HebcalApi::convertDate($params);
```

To see more details about params check [Hebrew Date Converter REST API](https://www.hebcal.com/home/219/hebrew-date-converter-rest-api)

### Shabbat times
To get just this week’s Shabbat times and Torah Portion use `HebcalApi` method `getShabbatTimes($params)`
```php
use Ivy47\HebcalApi\Facades\HebcalApiFacade as HebcalApi;

$params = [
            'geonameid' => '3448439',
            'M' => 'on'
            ...
            ];

$shabbatResponse = HebcalApi::getShabbatTimes($params);
```

To see more details about params check [Shabbat times REST API](https://www.hebcal.com/home/197/shabbat-times-rest-api)

### Zmanim (halachic times)
To calculate zmanim (halachic times) for a given location use `HebcalApi` method `getZmanim($params)`
```php
use Ivy47\HebcalApi\Facades\HebcalApiFacade as HebcalApi;

$params = [
            'geonameid' => '3448439',
            'date' => '2021-03-23'
            ...
            ];

$zmanimResponse = HebcalApi::getZmanim($params);
```

To see more details about params check [Zmanim (halachic times) API](https://www.hebcal.com/home/1663/zmanim-halachic-times-api)

## Important

`cfg` param default value is '**json**' and can't be changed

## API Resources

This package provides Laravel API Resources of Hebcal ready to use 

To get the api resource use `getResource()` method, on any HebcalResponse

```php
// HebcalCalendarResponse example

/** @var \Ivy47\HebcalApi\Http\Resources\HebcalCalendar\HebcalCalendarResource $hebcalCalendarResource */
$hebcalCalendarResource = $hebcalCalendarResponse->getResource();
```

But if you need raw (body) or decoded response data use:
```php
$body = $hebcalCalendarResponse->getBody();
$decoded = $hebcalCalendarResponse->getDecoded();
```

or use the original response:
```php
$response = $hebcalCalendarResponse->getResponse();
```

## Useful Links

- [Hebcal](https://www.hebcal.com/)
- [Jewish calendar REST API documentation](https://www.hebcal.com/home/195/jewish-calendar-rest-api)
- [Hebrew Date Converter REST API](https://www.hebcal.com/home/219/hebrew-date-converter-rest-api)
- [Shabbat times REST API](https://www.hebcal.com/home/197/shabbat-times-rest-api)
- [Zmanim (halachic times) API](https://www.hebcal.com/home/1663/zmanim-halachic-times-api)
- [Laravel Cache](https://laravel.com/docs/8.x/cache)
- [Laravel API Resources](https://laravel.com/docs/8.x/eloquent-resources)


