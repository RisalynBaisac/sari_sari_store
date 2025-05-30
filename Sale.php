<?php
class Sale {
    protected $pdo;

    public function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=pos_db', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT * FROM sales");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($product_id, $quantity, $total) {
        $stmt = $this->pdo->prepare("INSERT INTO sales (product_id, quantity, total_price, created_at) VALUES (?, ?, ?, NOW())");
        return $stmt->execute([$product_id, $quantity, $total]);
    }

    public function getReportData() {
        $stmt = $this->pdo->prepare("
            SELECT p.name, SUM(s.quantity) as total_quantity, SUM(s.total_price) as total_sales
            FROM sales s
            JOIN products p ON s.product_id = p.id
            GROUP BY p.name
            ORDER BY total_sales DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
