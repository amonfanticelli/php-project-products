<?php

class ProductController
{
    public function __construct(private ProductGateway $gateway)
    {
    }

    public function processRequest(string $method): void
    {
        $this->processCollectionRequest($method);
    }
    private function processCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                echo json_encode($this->gateway->getAll());
                break;
        }
    }
}
