<?php
class Database
{
    private mysqli $conn;
    public function __construct(
        private string $host,
        private string $db_name,
        private string $user,
        private string $password
    ) {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);

        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
}
