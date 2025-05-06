<?php

declare(strict_types=1);

/**
 * PHP API skeleton project
 *
 * @copyright Copyright (c) Silevester D. (https://github.com/SilverD3)
 * @link      https://github.com/SilverD3/php-api-project PHP API skeleton project
 * @since     1.0 (2025)
 */

namespace Core\Http\Middleware;

/**
 * CorsMiddleware
 */
class CorsMiddleware implements MiddlewareInterface
{
    public function handle(callable $next)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS");
        header("Access-Control-Allow-Headers: Accept-Language, Content-Type, Authorization");

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            return;
        }

        $next();
    }
}
