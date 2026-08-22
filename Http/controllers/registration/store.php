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

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $_POST['email']
])->find();

if ($user) {
    $errors['email'] = 'There is a user with that email address!';

    return view("registration/create.view.php", [
        'errors' => $errors
    ]);
}

if (Validator::string($_POST['password'], 1, 5)) {
    $errors['password'] = 'Please provide a password of at least five characters.';
}

if (! empty($errors)) {
    return view("registration/create.view.php", [
        'errors' => $errors
    ]);
} else {
    $db->query("INSERT INTO users (email, name, password) VALUES (:email, :name, :password)", [
        'email' => $_POST['email'],
        'name' => $_POST['name'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
    ]);

    header('location: /login');
    exit();
}
