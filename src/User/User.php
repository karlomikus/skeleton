<?php
namespace App\User;

class User
{
    public $id;
    public $email;
    public $password;
    public $name;
    public $last_name;

    public function __construct(array $data = [])
    {
        if (!empty($data)) {
            $this->id = (int) $data['id'] ?? null;
            $this->name = $data['name'] ?? null;
            $this->last_name = $data['last_name'] ?? null;
            $this->email = $data['email'] ?? null;
            $this->password = $data['password'] ?? null;
        }
    }
}
