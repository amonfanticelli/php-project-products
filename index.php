<?php

declare(strict_types=1);
spl_autoload_register(
    function ($class) {
        require __DIR__ . "/src/class/$class.php";
    }
);

$parts = explode("/", $_SERVER["REQUEST_URI"]);

if ($parts[1] != "products") {
    http_response_code(404);
    exit;
};

$controller = new ProductController;

$controller->processRequest($_SERVER["REQUEST_METHOD"]);
