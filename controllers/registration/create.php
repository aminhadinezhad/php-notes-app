<?php

if (isset($_SESSION['user'])) {
    header('location: /');
    exit();
}

view('registration/create.view.php', [
    'heading' => 'register',
    'errors' => []
]);
