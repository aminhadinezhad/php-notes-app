<?php

namespace Core;

class Validator
{
    public static function string($value, $min, $max)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) < $max;
    }

    // NOTE: فرمت ایمیل رو چک میکنه
    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function password($value, $min, $max)
    {
        return strlen($value) >= $min && strlen($value) <= $max;
    }
}
