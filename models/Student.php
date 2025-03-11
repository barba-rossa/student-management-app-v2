<?php
require_once BASE_PATH . '/config/database.php';

class Student {
    private $conn;
    private $table = 'students';

    public $id;
    public $student_id;
    public $name;
    public $email;
    public $created_by;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAll() {
        $query = 'SELECT s.id, s.student_id, s.name, s.email, s.created_at, u.username as creator
                  FROM ' . $this->table . ' s
                  LEFT JOIN users u ON s.created_by = u.id
                  ORDER BY s.created_at DESC';
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' 
                  SET student_id = :student_id, 
                      name = :name, 
                      email = :email,
                      created_by = :created_by';

        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->student_id = htmlspecialchars(strip_tags($this->student_id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));

        // Bind data
        $stmt->bindParam(':student_id', $this->student_id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':created_by', $this->created_by);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        
        $stmt = $this->conn->prepare($query);
        
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()) {
            return true;
        }
        
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}