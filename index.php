<?php

use routes\base\Router;
use utils\SessionHelpers;

include("autoload.php");

if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://lostaria.fr' . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    exit;
}

SessionHelpers::init();

$router = new Router();
$router->LoadRequestedPath();