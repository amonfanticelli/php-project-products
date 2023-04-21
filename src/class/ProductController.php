<?php

class ProductController
{

    public function processRequest(string $method): void
    {
        $this->processCollectionRequest($method);
    }
    private function processCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                echo json_encode([
                    "id" => 124,

                ]);
                break;
        }
    }
}
