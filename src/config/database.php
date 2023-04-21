<?php
class Database
{

    public function __construct(
        private string $host,
        private string $db_name,
        private string $user,
        private string $password
    ) {
    }
    public function getConnection(): PDO
    {
        $dsn = "mysql:host={$this->host};db_name={$this->db_name};charset=utf8";

        return new PDO($dsn, $this->user, $this->password);
    }
}
