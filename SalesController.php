<?php
require_once __DIR__ . '/../models/Sale.php';
require_once __DIR__ . '/../models/Product.php';

class SalesController {
    public function index() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }

        $productModel = new Product();
        $products = $productModel->getAll();

        include __DIR__ . '/../views/sales/index.php';
    }

    public function create() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_id = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            $productModel = new Product();
            $product = $productModel->getById($product_id);
            if (!$product) {
                die("Invalid product selected.");
            }

            $price = $product['price'];
            $total = $price * $quantity;

            $saleModel = new Sale();
            $saleModel->create($product_id, $quantity, $total);

            header('Location: index.php?page=sales');
            exit;
        }

        // fallback
        header('Location: index.php?page=sales');
    }

    public function report() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }

        $saleModel = new Sale();
        $salesReport = $saleModel->getReportData();

        include __DIR__ . '/../views/sales/report.php';
    }
}
