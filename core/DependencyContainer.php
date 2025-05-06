<?php

declare(strict_types=1);

/**
 * PHP API skeleton project
 *
 * @copyright Copyright (c) Silevester D. (https://github.com/SilverD3)
 * @link      https://github.com/SilverD3/php-api-project PHP API skeleton project
 * @since     1.0 (2025)
 */

namespace Core;

/**
 * Dependency container
 */
class DependencyContainer
{
    protected static array $instances = [];

    public static function get(string $class)
    {
        // If already created, return it
        if (isset(self::$instances[$class])) {
            return self::$instances[$class];
        }

        // Otherwise, create a new instance
        $reflector = new \ReflectionClass($class);

        // If no constructor, just instantiate
        if (!$constructor = $reflector->getConstructor()) {
            $object = new $class();
        } else {
            $params = [];
            foreach ($constructor->getParameters() as $param) {
                $paramClass = $param->getType()?->getName();
                if ($paramClass && class_exists($paramClass)) {
                    $params[] = self::get($paramClass); // recursive resolution
                } else {
                    // Cannot resolve parameter automatically
                    $params[] = null;
                }
            }
            $object = $reflector->newInstanceArgs($params);
        }

        self::$instances[$class] = $object;
        return $object;
    }
}
