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

use Core\Http\Request;
use Core\Http\Response;

class ExampleController
{

    public function index(): void
    {
        Response::success([], message: "Everything is fine");
    }

    public function getParams(string $param1, string $param2): void
    {
        Response::success(["param1" => $param1, "param2" => $param2], message: "Everything is fine");
    }

    public function getById(string $id): void
    {
        Response::success(["id" => $id, "name" => "John Doe", "john.doe@company.com"], message: "Everything is fine");
    }

    public function create(): void
    {
        Response::success(["id" => 1] + Request::json(), message: "Data created successfully");
    }
    public function update(string $id): void
    {
        Response::success(Request::json(), message: "Data with ID '$id' update successfully");
    }

    public function delete(string $id): void
    {
        Response::success([], message: "Data with ID '$id' deleted successfully");
    }
}
