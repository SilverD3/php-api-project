<?php

/**
 * PHP API skeleton project
 *
 * @copyright Copyright (c) Silevester D. (https://github.com/SilverD3)
 * @link      https://github.com/SilverD3/php-api-project PHP API skeleton project
 * @since     1.0 (2025)
 */

return [
    // Datasource
    'DataSource' => [
        'host' => env('DATABASE_HOST', 'localhost'),
        'username' => env('DATABASE_USER', 'root'),
        'password' => env('DATABASE_PASSWORD', ''),
        'database' => env('DATABASE_NAME', 'db_name'),
    ],

    // Debug config
    "Debug" => [
        'enable' => env('DEBUG', true)
    ],
];
