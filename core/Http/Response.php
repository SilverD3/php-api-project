<?php

declare(strict_types=1);

/**
 * PHP API skeleton project
 *
 * @copyright Copyright (c) Silevester D. (https://github.com/SilverD3)
 * @link      https://github.com/SilverD3/php-api-project PHP API skeleton project
 * @since     1.0 (2025)
 */

namespace Core\Http;

/**
 * Http response
 */
class Response
{
    public static function json($data = [], int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit;
    }

    public static function success($data = [], string $message = "Success"): void
    {
        self::json([
            "status" => "success",
            "message" => $message,
            "data" => $data
        ]);
    }

    public static function error(string $message = "Something went wrong", int $statusCode = 500, $errors = []): void
    {
        self::json([
            "status" => "error",
            "message" => $message,
            "errors" => $errors
        ], $statusCode);
    }
}
