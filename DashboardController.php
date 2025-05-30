<?php
// app/controllers/DashboardController.php
require_once __DIR__ . '/../models/Product.php';

class DashboardController {
    public function index() {
        // Start session only if not started yet
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }

        $productModel = new Product();
        $products = $productModel->all();

        // Use _DIR_ to correctly include the view
        include __DIR__ . '/../views/dashboard.php';
    }
}