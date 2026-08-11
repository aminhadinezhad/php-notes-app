<?php

use Core\App;
// use Core\Database;

// $config = require base_path('config.php');
// $db = new Database($config['database'], $config['database']['user'], $config['database']['password'])

$db = App::container()->resolve('Core\Database');
dd($db);

$currentUserId = 1;

$note = $db->query(
    'SELECT * FROM notes WHERE id = :id',
    [
        'id' => $_POST['id']
    ]
)->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('DELETE FROM notes WHERE id = :id', [
    'id' => $_POST['id'],
]);

header('location: /notes');
exit();
