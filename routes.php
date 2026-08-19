<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php');
$router->delete('/note', 'notes/destroy.php');
$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note', 'notes/update.php'); // NOTE: اگر کاربر فرم (action) /note با PATCH درخواست کرد برو منطقی که در controller/notes/update.php هستش رو اجرا کن
$router->get('/notes/create', 'notes/create.php'); // NOTE: اگر کاربر صفحه (route) /notes/create رو با GET درخواست کرد برو منطقی که در controller/n otes/create.php هستش رو اجرا کن
$router->post('/notes', 'notes/store.php');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/registration', 'registration/store.php')->only('guest');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');
