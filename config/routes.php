<?php

declare(strict_types=1);

/**
 * PHP API skeleton project
 *
 * @copyright Copyright (c) Silevester D. (https://github.com/SilverD3)
 * @link      https://github.com/SilverD3/php-api-project PHP API skeleton project
 * @since     1.0 (2025)
 */

use App\Controller\ExampleController;

$routes = [
    [
        'method' => 'GET',
        'pattern' => '/',
        'handler' => [ExampleController::class, 'index'],
        'middlewares' => [],
    ],
    [
        'method' => 'GET',
        'pattern' => '/api/example',
        'handler' => [ExampleController::class, 'index'],
        'middlewares' => [],
    ],
    [
        'method' => 'POST',
        'pattern' => '/api/example',
        'handler' => [ExampleController::class, 'create'],
        'middlewares' => [],
    ],
    [
        'method' => 'PUT',
        'pattern' => '/api/example/{id}',
        'handler' => [ExampleController::class, 'update'],
        'middlewares' => [],
    ],
    [
        'method' => 'DELETE',
        'pattern' => '/api/example/{id}',
        'handler' => [ExampleController::class, 'delete'],
        'middlewares' => [],
    ],
    [
        'method' => 'GET',
        'pattern' => '/api/example/{id}',
        'handler' => [ExampleController::class, 'getById'],
        'middlewares' => [],
    ],
    [
        'method' => 'GET',
        'pattern' => '/api/example/{param1}/{param2}',
        'handler' => [ExampleController::class, 'getParams'],
        'middlewares' => [],
    ],
];
