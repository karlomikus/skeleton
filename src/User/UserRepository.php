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
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);

        return $stmt->fetchAll();
    }

    public function findById($id)
    {
        $stmt = $this->conn->prepare('SELECT * FROM user WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);

        return $stmt->fetch();
    }
}
