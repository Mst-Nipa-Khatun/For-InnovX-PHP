<?php

namespace connection;

class Database
{
    private static $instance = null;
    private static $lock = false; // Prevent race conditions
    private $conn;
    private $host = "localhost";
    private $user = "nipa";
    private $pass = "nipa";
    private $dbname = "innovex_php";

    public function __construct()
    {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->user,
                $this->pass
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database Connection Failed: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            if (self::$lock) {
                throw new Exception("Database connection is already being initialized!");
            }
            self::$lock = true;
            self::$instance = new Database();
            self::$lock = false;
            return self::$instance;
        }
        return self::$instance;
    }


    public function getConnection()
    {
        return $this->conn;
    }

    // Prevent object cloning
    private function __clone()
    {
    }

    // Prevent unserialization
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize a singleton.");
    }


}

?>
