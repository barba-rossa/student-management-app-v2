<?php
require_once BASE_PATH . '/models/Student.php';

class StudentController {
    
    public function index() {
        $student = new Student();
        $students = $student->getAll();
        
        require_once BASE_PATH . '/views/students/index.php';
    }
    
    public function create() {
        require_once BASE_PATH . '/views/students/create.php';
    }
    
    public function store() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $student = new Student();
            $student->student_id = $_POST['student_id'];
            $student->name = $_POST['name'];
            $student->email = $_POST['email'];
            $student->created_by = $_SESSION['user_id'];
            
            if($student->create()) {
                $_SESSION['success'] = 'Student created successfully';
                header('Location: /students/index');
                exit;
            } else {
                $_SESSION['error'] = 'Failed to create student';
                header('Location: /students/create');
                exit;
            }
        }
    }
    
    public function delete($id) {
        $student = new Student();
        $student->id = $id;
        
        if($student->delete()) {
            $_SESSION['success'] = 'Student deleted successfully';
        } else {
            $_SESSION['error'] = 'Failed to delete student';
        }
        
        header('Location: /students/index');
        exit;
    }
}