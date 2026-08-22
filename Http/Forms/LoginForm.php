<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function validate($email)
    {
        // NOTE: چون در Validator.php تابع string رو به شکل static تعریف کردم
        if (! Validator::email($email)) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        return $this->errors[$field] = $message;
    }
}
