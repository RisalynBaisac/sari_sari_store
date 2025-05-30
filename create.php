<?php
require_once __DIR__ . '/../models/Product.php';
$productModel = new Product();
$products = $productModel->all();
?>

<h2>Record New Sale</h2>
<form method="POST" action="index.php?page=sales_create">
    <label for="product_id">Select Product:</label>
    <select name="product_id" required>
        <option value="">-- Select Product --</option>
        <?php foreach ($products as $product): ?>
            <option value="<?= $product['id'] ?>"><?= $product['name'] ?> (₱<?= $product['price'] ?>)</option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" min="1" required><br><br>

    <button type="submit">Record Sale</button>
</form>
