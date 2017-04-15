<?php
namespace App\User;

use PDO;

class UserRepository
{
    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function findAll()
    {
        $stmt = $this->conn->prepare('SELECT * FROM user LIMIT 10');
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findBy()
    {
    }
}
