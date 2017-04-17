<?php
declare(strict_types = 1);
namespace App\User;

use PDO;
use App\User\User;

class UserRepository
{
    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function findAll(): array
    {
        $stmt = $this->conn->prepare('SELECT * FROM user LIMIT 10');
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);

        return $stmt->fetchAll();
    }

    public function findById(int $id): User
    {
        $stmt = $this->conn->prepare('SELECT * FROM user WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);

        return $stmt->fetch();
    }
}
