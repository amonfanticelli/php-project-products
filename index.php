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


header("Content-type: application/json; charset=UTF-8");

$parts = explode("/", $_SERVER["REQUEST_URI"]);

if ($parts[1] != "products") {
    http_response_code(404);
    exit;
};

$database = new Database("localhost", "product_db", "myuser", "mysql");

$database->getConnection();

$controller = new ProductController;

$controller->processRequest($_SERVER["REQUEST_METHOD"]);
require_once $_SERVER['DOCUMENT_ROOT'] . '/common/configs/config_templates.inc.php';
