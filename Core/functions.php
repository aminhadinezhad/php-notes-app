<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return parse_url($_SERVER['REQUEST_URI'])['path'] === $value;
}

function abort($code = Response::NOT_FOUND)
{
    http_response_code($code);
    require base_path("controllers/{$code}.php");
    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('views/' . $path); // views/index.view.php
}

function login($user)
{
    $_SESSION['user'] = [
        'email' => $user['email'],
        'name' => $user['name'],
    ];
}
