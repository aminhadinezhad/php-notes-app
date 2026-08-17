<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/destroy.php');

$router->get('/note/edit', 'controllers/notes/edit.php');
$router->patch('/note', 'controllers/notes/update.php'); // NOTE: اگر کاربر فرم (action) /note با PATCH درخواست کرد برو منطقی که در controller/notes/update.php هستش رو اجرا کن
$router->get('/notes/create', 'controllers/notes/create.php'); // NOTE: اگر کاربر صفحه (route) /notes/create رو با GET درخواست کرد برو منطقی که در controller/notes/create.php هستش رو اجرا کن
$router->post('/notes', 'controllers/notes/store.php');

$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php');
