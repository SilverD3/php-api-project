<?php

/**
 * Get environment var
 * 
 * @param string $name The name of the variable
 * @param mixed $default The default value
 * @return mixed The value of the env variable or the default value 
 */
function env(string $name, mixed $default = null)
{
    return !empty($_ENV[$name]) ? $_ENV[$name] : $default;
}
