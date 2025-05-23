<?php

namespace service;

use connection\Database;
use PDO;

require_once __DIR__ . '/../connection/Database.php';

class UsersService
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }


    public function createUser($userName, $email, $password, $education, $age, $picture)
    {

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO Users (userName,email,password,education,age,picture,status) VALUES (:userName, :email, :password , :education, :age, :picture,1)";
        $executableQuery = $this->conn->prepare($sql);
        $executableQuery->bindParam(':userName', $userName);
        $executableQuery->bindParam(':email', $email);
        $executableQuery->bindParam(':password', $hashedPassword);
        $executableQuery->bindParam(':education', $education);
        $executableQuery->bindParam(':age', $age);
        $executableQuery->bindParam(':picture', $picture);
        return $executableQuery->execute();
    }

    public function getAllUsers()
    {
        $sql = "SELECT userName,email,password,education,age,picture FROM Users";
        $executableQuery = $this->conn->query($sql);
        return $executableQuery->fetchAll(PDO::FETCH_ASSOC);
    }


    public function findByUserId($userId)
    {
        $sql = "SELECT userName, email, password, education, age, picture FROM Users WHERE id = :userId";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUserImage($userId, $newImagePath)
    {
        $sql = "UPDATE Users SET picture = :picture WHERE id = :userId";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':picture', $newImagePath);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        return $stmt->execute();
    }




}

