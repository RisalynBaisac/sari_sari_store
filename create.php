<?php include __DIR__ . '/../layout/header.php'; ?>

<h2>Add Product</h2>
<form method="POST" action="">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" name="price" id="price" step="0.01" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Product</button>
</form>

<?php include __DIR__ . '/../layout/footer.php'; ?>