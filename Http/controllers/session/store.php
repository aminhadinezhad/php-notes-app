<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$form = new LoginForm();

$form->validate($_POST['email']);

$auth = new Authenticator();

if ($auth->attempt($_POST['email'], $_POST['password'])) {
    redirect('/');
}

$form->error('email', 'No matching account found for that email address and password');

Session::flash('errors', $form->errors());
Session::flash('old', [
    'email' => $_POST['email']
]);

return redirect('/login');
