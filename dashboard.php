<?php include 'app/views/layout/header.php'; ?>

<h2>Dashboard</h2>
<table class="table table-bordered">
<thead>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Price</th>
    <th>Qty</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($products as $p): ?>
  <tr <?php if ($p['quantity'] < 5) echo 'class="table-danger" title="Low stock"'; ?>>
    <td><?= $p['id'] ?></td>
    <td><?= htmlspecialchars($p['name']) ?></td>
    <td><?= number_format($p['price'],2) ?></td>
    <td><?= $p['quantity'] ?></td>
  </tr>
  <?php endforeach; ?>
</tbody>
</table>

<?php include 'app/views/layout/footer.php'; ?>
