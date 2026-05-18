<?php
$router->get('/', 'controllers/home.php');
$router->get('/listings', 'controllers/listings/index.php');
$router->get('/listings/create', 'controllers/listings/create.php');
$router->post('/listings', 'controllers/listings/create.php');
$router->get('/listings/{id}', 'controllers/listings/show.php');
$router->get('/listing', 'controllers/listings/show.php');
