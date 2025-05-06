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

use Core\Http\Response;

/**
 * Error middleware
 */
class ErrorMiddleware implements MiddlewareInterface
{
    public function handle(callable $next)
    {
        try {
            $next();
        } catch (\Throwable $e) {
            Response::error($e->getMessage(), 500);
        }
    }
}
