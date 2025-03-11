<?php
session_start();

// Define base path
define('BASE_PATH', __DIR__);

// Simple Router
$url = isset($_GET['url']) ? $_GET['url'] : '';
$url = rtrim($url, '/');
$segments = explode('/', $url);

// Default controller and action
$controller = !empty($segments[0]) ? $segments[0] : 'auth';
$action = isset($segments[1]) ? $segments[1] : 'login';
$param = isset($segments[2]) ? $segments[2] : null;

// Authentication check
$public_routes = ['auth/login', 'auth/register', 'auth/doLogin', 'auth/doRegister'];
if (!isset($_SESSION['user_id']) && !in_array($controller . '/' . $action, $public_routes)) {
    header('Location: /auth/login');
    exit;
}

// Route to controller
switch ($controller) {
    case 'auth':
        require_once BASE_PATH . '/controllers/AuthController.php';
        $controller = new AuthController();
        break;
    case 'students':
        require_once BASE_PATH . '/controllers/StudentController.php';
        $controller = new StudentController();
        break;
    default:
        require_once BASE_PATH . '/controllers/AuthController.php';
        $controller = new AuthController();
        $action = 'login';
}

// Call the appropriate method
if (method_exists($controller, $action)) {
    $controller->$action($param);
} else {
    echo "404 - Action not found";
}