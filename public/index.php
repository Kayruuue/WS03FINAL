<?php
define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/vendor/autoload.php';
require '../helpers.php';

$router = new \Framework\Router();

$routes = require basePath('routes.php');   

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
