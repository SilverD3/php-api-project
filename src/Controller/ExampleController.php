<?php

declare(strict_types=1);

/**
 * PHP API skeleton project
 *
 * @copyright Copyright (c) Silevester D. (https://github.com/SilverD3)
 * @link      https://github.com/SilverD3/php-api-project PHP API skeleton project
 * @since     1.0 (2025)
 */

namespace App\Controller;

use Core\Http\Response;

class ExampleController
{

    public function index(): void
    {
        Response::success([], message: "Everything is fine");
    }
}
