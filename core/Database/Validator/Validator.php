<?php

declare(strict_types=1);

/**
 * PHP API skeleton project
 *
 * @copyright Copyright (c) Silevester D. (https://github.com/SilverD3)
 * @link      https://github.com/SilverD3/php-api-project PHP API skeleton project
 * @since     1.0 (2025)
 */

namespace Core\Database\Validator;

/**
 * Validator
 */
class Validator
{
    protected array $data;
    protected array $rules;
    protected array $errors = [];

    public function __construct(array $data, array $rules)
    {
        $this->data = $data;
        $this->rules = $rules;
    }

    public function validate(): bool
    {
        foreach ($this->rules as $field => $rules) {
            $rules = explode('|', $rules);

            foreach ($rules as $rule) {
                if ($rule === 'required' && empty($this->data[$field])) {
                    $this->errors[$field][] = 'Field is required';
                }
                if ($rule === 'email' && !filter_var($this->data[$field] ?? '', FILTER_VALIDATE_EMAIL)) {
                    $this->errors[$field][] = 'Field must be a valid email';
                }
            }
        }

        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
