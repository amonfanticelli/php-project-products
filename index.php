<?php

declare(strict_types=1);

spl_autoload_register(function ($class) {
    $base_dir = __DIR__ . '/src/';

    if ($class === 'Database') {
        $file = $base_dir . 'config/database.php';
    } else {
        $file = $base_dir . 'class/' . str_replace('\\', '/', $class) . '.php';
    }

    if (file_exists($file)) {
        require $file;
    }
});

require_once 'src/error/errorHandler.php';
set_exception_handler("ErrorHandler::handleException");


header("Content-type: application/json; charset=UTF-8");

$parts = explode("/", $_SERVER["REQUEST_URI"]);

if ($parts[1] != "products") {
    http_response_code(404);
    exit;
};

require 'vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$database = new Database($_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);

$database->getConnection();

require_once 'src/productController/ProductController.php';
$controller = new ProductController;

$controller->processRequest($_SERVER["REQUEST_METHOD"]);
