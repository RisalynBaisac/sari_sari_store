<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Sales Report</h2>

    <?php if (!empty($salesReport)): ?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Product Name</th>
                        <th>Total Quantity Sold</th>
                        <th>Total Sales</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($salesReport as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['total_quantity']) ?></td>
                        <td>₱<?= htmlspecialchars($row['total_sales']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">No sales data found.</div>
    <?php endif; ?>

    <div class="text-center mt-4">
        <a href="index.php?page=sales" class="btn btn-primary">Back to Sales</a>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
