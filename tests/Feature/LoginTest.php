<?php

use Core\App;
use Core\Database;

test('a user can login with valid credentials', function () {
    require __DIR__ . '/../../bootstrap.php';

    $db = App::resolve(Database::class);

    $email = 'login-test@example.com';
    $password = 'secret123';

    $db->query('DELETE FROM users WHERE email = :email', [
        'email' => $email,
    ]);

    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ]);

    $_POST = [
        'email' => $email,
        'password' => $password,
    ];

    require __DIR__ . '/../../Http/controllers/session/store.php';

    expect($_SESSION['user']['email'] ?? null)->toBe($email);
});
