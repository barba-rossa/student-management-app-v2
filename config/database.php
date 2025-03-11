<?php
class Database {
    private $host = 'mysql';  // Alterado para o nome do serviço no docker-compose
    private $db_name = 'student_management';
    private $username = 'root';
    private $password = 'root';  // Alterado para a senha definida no docker-compose
    private $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}