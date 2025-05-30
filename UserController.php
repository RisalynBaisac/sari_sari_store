<?php
// app/controllers/UserController.php
require_once __DIR__ . '/../models/User.php';

class UserController {
    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header('Location: index.php?page=login');
            exit;
        }
        $userModel = new User();
        $users = $userModel->getAll();
        include __DIR__ . '/../views/user/index.php';  // make sure this file exists
    }

    public function create() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header('Location: index.php?page=login');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $userModel = new User();
            if ($userModel->getByUsername($username)) {
                $error = "Username already exists";
                include __DIR__ . '/../views/user/create.php';
                return;
            }
            $userModel->create($username, $password, $role);
            header('Location: index.php?page=user');
            exit;
        }
        include __DIR__ . '/../views/user/create.php';
    }

    public function delete() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header('Location: index.php?page=login');
            exit;
        }
        $id = $_GET['id'] ?? null;
        if ($id) {
            $userModel = new User();
            $userModel->delete($id);
        }
        header('Location: index.php?page=user');
        exit;
    }
}
