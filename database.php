<?php
class Database {
    private $host = '127.0.0.1';         // Use 127.0.0.1 instead of localhost
    private $db_name = 'pos_db';         // Change to your actual database name
    private $username = 'root';           // Default XAMPP username
    private $password = '';               // Default XAMPP password is empty
    public $conn;

    public function connect() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
