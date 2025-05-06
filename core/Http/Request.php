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
 * Http Request
 */
class Request
{
    /**
     * Gets query param or all query params
     * @param string|null $key query name
     * @param mixed $default Default value
     * @return mixed The value of the query param or an array of all the query params
     */
    public static function getQuery(?string $key = null, $default = null): mixed
    {
        if ($key === null) {
            return $_GET;
        }

        return $_GET[$key] ?? $default;
    }

    /**
     * Gets submitted data or the whole request body
     * @param mixed $key Field name
     * @param mixed $default Default value
     * @return mixed The value of the field name or an array representing the request body
     */
    public static function getData(?string $key = null, $default = null): mixed
    {
        if ($key === null) {
            return $_POST;
        }

        return $_POST[$key] ?? $default;
    }

    public static function json(?string $key = null, $default = null)
    {
        static $json = null;

        if ($json === null) {
            $raw = file_get_contents('php://input');
            $json = json_decode($raw, true) ?? [];
        }

        if ($key === null) {
            return $json;
        }

        return $json[$key] ?? $default;
    }

    public static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }
}
