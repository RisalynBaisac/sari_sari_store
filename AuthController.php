<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public function login() {
        session_start();

        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new User();
            $user = $userModel->getByUsername($username);

            if ($user && hash('sha256', $password) === $user['password']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                header('Location: index.php?page=dashboard');
                exit;
            } else {
                $error = "Invalid username or password";
            }
        }

        include __DIR__ . '/../views/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?page=login');
        exit;
    }
}
