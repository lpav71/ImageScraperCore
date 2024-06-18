<?php

require 'vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\ImageController;

// Определяем базовый путь
$baseURI = '/';

$requestURI = str_replace($baseURI, '', $_SERVER['REQUEST_URI']);
$path = parse_url($requestURI, PHP_URL_PATH);

switch ($path) {
    case '':
        $controller = new HomeController();
        $controller->index();
        break;
    case 'images':
        $controller = new ImageController();
        $controller->index($_POST['url']);
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo "Page not found";
        break;
}
