<?php
require_once __DIR__ . '/../models/Product.php';

class ProductAdminController {
    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header('Location: index.php?page=login');
            exit;
        }

        $productModel = new Product();
        $products = $productModel->all();

        include __DIR__ . '/../views/product_admin/index.php';
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
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];

            $productModel = new Product();
            $productModel->create($name, $price, $quantity);

            header('Location: index.php?page=product_admin');
            exit;
        }

        include __DIR__ . '/../views/product_admin/create.php';
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
            $productModel = new Product();
            $productModel->delete($id);
        }

        header('Location: index.php?page=product_admin');
        exit;
    }
}
