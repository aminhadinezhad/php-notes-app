<?php

namespace Core;

use Core\Database;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)->query("SELECT * FROM users WHERE email = :email", [
            'email' => $_POST['email']
        ])->find();

        if ($user) {
            if (password_verify($_POST['password'], $user['password'])) {
                $this->login([
                    'email' => $user['email'],
                    'name' => $user['name'],
                    'id' => $user['id']
                ]);

                return true;
            }
        }

        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'name' => $user['name'],
            'id' => $user['id'],
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}
