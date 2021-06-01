<?php

return [
    /*
     * Base Hebcal REST API uri
     * */
    'base_uri' => 'https://www.hebcal.com',

    /*
     * Jewish calendar REST API uri's
     * */
    'hebcal_uri' => '/hebcal/',
    'converter_uri' => '/converter/',
    'shabbat_uri' => '/shabbat/',


    /*
     * Use laravel cache
     * */
    'use_cache' => false,

    /*
     * Cache store driver
     * Check cache configuration file at config/cache.php to see posible options
     * */
    'cache_store' => 'file'
];
