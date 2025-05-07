<?php

declare(strict_types=1);

use Core\Http\Response;

/**
 * PHP API skeleton project
 *
 * @copyright Copyright (c) Silevester D. (https://github.com/SilverD3)
 * @link      https://github.com/SilverD3/php-api-project PHP API skeleton project
 * @since     1.0 (2025)
 */

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'paths.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'functions.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'routes.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

// Load .env files
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$configure = new \Core\Configure();

// Debugging and warnings
$debugOptions = $configure->read('Debug', ['enable' => true]);
if ($debugOptions['enable'] === true) {
    ini_set('xdebug.remote_enable', true);
    ini_set('xdebug.idebug.remote_host', 'localhost');
    ini_set('xdebug.idebug.remote_port', 9003);
} else {
    error_reporting(E_ALL & ~E_DEPRECATED);
}

$globalMiddlewares = [
    \Core\Http\Middleware\CorsMiddleware::class,
    \Core\Http\Middleware\ErrorMiddleware::class,
];

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/webroot', '', $uri);

// Check if the request is for a static file
$path = __DIR__ . $uri;

// Allow static files from /webroot
if (php_sapi_name() === 'cli-server' && is_file($path)) {
    return false; // Let the built-in PHP dev server serve the static file
}

$routeFound = false;

foreach ($routes as $route) {
    if ($route['method'] === $method) {
        $pattern = preg_replace('#\{[^/]+\}#', '([^/]+)', $route["pattern"]);
        $pattern = "#^$pattern$#";

        if (preg_match($pattern, $uri, $matches)) {
            array_shift($matches);

            [$controllerClass, $methodName] = $route['handler'];
            $controller = \Core\DependencyContainer::get($controllerClass);

            $routeMiddlewares = $route['middlewares'] ?? [];

            // Merge global + route middlewares
            $middlewares = array_merge($globalMiddlewares, $routeMiddlewares);

            // Build middleware chain
            $action = function () use ($controller, $methodName, $matches) {
                call_user_func_array([$controller, $methodName], $matches);
            };

            foreach (array_reverse($middlewares) as $middlewareClass) {
                $middleware = \Core\DependencyContainer::get($middlewareClass);
                $next = $action;
                $action = function () use ($middleware, $next) {
                    $middleware->handle($next);
                };
            }

            // Execute the middleware chain
            $action();

            $routeFound = true;
            break;
        }
    }
}

if (!$routeFound) {
    Response::error(message: "Resource not found", statusCode: 404);
}
