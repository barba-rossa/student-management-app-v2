<?php
require_once BASE_PATH . '/models/User.php';

class AuthController {
    
    public function login() {
        require_once BASE_PATH . '/views/auth/login.php';
    }
    
    public function register() {
        require_once BASE_PATH . '/views/auth/register.php';
    }
    
    public function doLogin() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            
            if($user->login()) {
                $_SESSION['user_id'] = $user->id;
                $_SESSION['username'] = $user->username;
                $_SESSION['email'] = $user->email;
                
                header('Location: /students/index');
                exit;
            } else {
                $_SESSION['login_error'] = 'Invalid email or password';
                header('Location: /auth/login');
                exit;
            }
        }
    }
    
    public function doRegister() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();
            $user->username = $_POST['username'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            
            if($user->register()) {
                $_SESSION['register_success'] = 'Registration successful! Please login.';
                header('Location: /auth/login');
                exit;
            } else {
                $_SESSION['register_error'] = 'Registration failed. Please try again.';
                header('Location: /auth/register');
                exit;
            }
        }
    }
    
    public function logout() {
        session_unset();
        session_destroy();
        header('Location: /auth/login');
        exit;
    }
}