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

if (! Validator::password($_POST['password'], 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}

if (! empty($errors)) {
    return view("registration/create.view.php", [
        'errors' => $errors
    ]);
}

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $_POST['email']
])->find();

if ($user) {
    header('location: /');
    exit();
} else {
    $db->query("INSERT INTO users (email, name, password) VALUES (:email, :name, :password)", [
        'email' => $_POST['email'],
        'name' => $_POST['name'],
        'password' => $_POST['password']
    ]);

    $_SESSION['user'] = [
        'email' => $_POST['email'],
        'name' => $_POST['name']
    ];

    header('location: /');
    exit();
}
