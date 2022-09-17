<?php

use routes\base\Router;
use utils\SessionHelpers;

/*if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://lostaria.fr' . $_SERVER['REQUEST_URI']; // Domain : $_SERVER['HTTP_HOST']
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    exit;
}*/

include("autoload.php");

SessionHelpers::init();

$router = new Router();
$router->LoadRequestedPath();