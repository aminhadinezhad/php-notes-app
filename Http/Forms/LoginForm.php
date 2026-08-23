<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;
use Exception;

class LoginForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        // NOTE: چون در Validator.php تابع string رو به شکل static تعریف کردم
        if (! Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes); // NOTE: معادل new LoginForm($attributes) => هدف اینه بتونیم به متد های غیر استاتیک مثل failed و errors و ... دسترسی داشته باشیم

        return $instance->failed() ? $instance->throw() : $instance;

        if ($instance->failed()) {
            $instance->throw();
        }

        return $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this; // NOTE: we can continue chaining
    }
}
