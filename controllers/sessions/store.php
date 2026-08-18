<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];

// NOTE: چون تو Validator.php تابع string رو به شکل static تعریف کردم
if (! Validator::email($_POST['email'])) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (! Validator::string($_POST['password'])) {
    $errors['password'] = 'Please provide a valid password.';
}

if (! empty($errors)) {
    return view("sessions/create.view.php", [
        'errors' => $errors
    ]);
}

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $_POST['email']
])->find();

if (! $user) {
    return view("sessions/create.view.php", [
        'errors' => [
            'email' => 'No matching found for that email address'
        ]
    ]);
}

if (password_verify($_POST['password'], $user['password'])) {
    login([
        'email' => $user['email'],
        'name' => $user['name'],
    ]);

    header('location: /');
    exit();
}

return view("sessions/create.view.php", [
    'errors' => [
        'password' => 'No matching found for that password'
    ]
]);
