<?php
class ProductGateway
{
    private $conn;
    public function __construct(Database $database)
    {
        try {
            $this->conn = $database->getConnection();
        } catch (PDOException $e) {
            echo "Error connecting to database: " . $e->getMessage();
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM product";

        $stmt = $this->conn->query($sql);

        $data = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
}
