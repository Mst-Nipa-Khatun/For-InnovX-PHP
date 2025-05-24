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
        $this->conn = Database::getInstance()->getConnection(); //When the class initialized, then __construct() method is executed.
    }


    public function createUser($userName, $email, $password, $education, $age, $picture)
    {

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT); //password bcrypt kore more secure kore
        $sql = "INSERT INTO Users (userName,email,password,education,age,picture,status) VALUES (:userName, :email, :password , :education, :age, :picture,1)"; //added new record
        $executableQuery = $this->conn->prepare($sql); //new variable declare kore sql prepare kore jate kore SQL injection na hoy.
        $executableQuery->bindParam(':userName', $userName);  //bindparam diye sql er stahe bind kore
        $executableQuery->bindParam(':email', $email);
        $executableQuery->bindParam(':password', $hashedPassword);
        $executableQuery->bindParam(':education', $education);
        $executableQuery->bindParam(':age', $age);
        $executableQuery->bindParam(':picture', $picture);
        return $executableQuery->execute(); //excute kore db te insert kore
    }

    public function getAllUsers()
    {
        $sql = "SELECT userName,email,password,education,age,picture FROM Users"; //select diye user table all info niye asteche
        $executableQuery = $this->conn->query($sql); //sql prepare korchi
        return $executableQuery->fetchAll(PDO::FETCH_ASSOC); //fetchall kore son antechi data gulo associatve array akare
    }


    public function findByUserId($userId)
    {
        $sql = "SELECT userName, email, password, education, age, picture FROM Users WHERE id = :userId"; //userId dhore user antechi db theeke
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT); //bindparam er maddhome userId sql e bind korchi sathe integer type daata
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); //akti kore dtaata antechi associative array akare
    }

    public function updateUserImage($userId, $newImagePath)
    {
        $sql = "UPDATE Users SET picture = :picture WHERE id = :userId"; //this command means in user table where userid is found then updated this user picture field in new picture
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':picture', $newImagePath);//picture er jayga newImage url dara replace kora hocche
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);//userId integer type
        return $stmt->execute();
    }

}

