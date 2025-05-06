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
        'pattern' => '#^/api/example$#',
        'handler' => [ExampleController::class, 'index'],
        'middlewares' => [],
    ],
    [
        'method' => 'GET',
        'pattern' => '#^/api/example/index$#',
        'handler' => [ExampleController::class, 'index'],
        'middlewares' => [],
    ],
    [
        'method' => 'GET',
        'pattern' => '#^/$#',
        'handler' => [ExampleController::class, 'index'],
        'middlewares' => [],
    ],
];
