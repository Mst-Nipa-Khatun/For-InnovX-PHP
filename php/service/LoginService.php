<?php

namespace service;

use connection\Database;
use PDO;

require_once __DIR__ . '/../connection/Database.php';

class LoginService
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }


    public function login($userName, $password)
    {
        $sql = "SELECT userName, password FROM Users WHERE userName = :userName AND status = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':userName', $userName);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return [
                "success" => true,
                "message" => "Login successful",
                "user" => [
                    "userName" => $user['userName']
                ]
            ];
        } else {
            return [
                "success" => false,
                "message" => "Invalid username or password"
            ];
        }
    }
}

