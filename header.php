<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>POS System</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php?page=dashboard">My POS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <?php if (isset($_SESSION['user_id'])): ?>
    <div class="collapse navbar-collapse" id="navbarsExample07">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php?page=dashboard">Dashboard</a></li>

        <?php if ($_SESSION['role'] === 'admin'): ?>
        <li class="nav-item"><a class="nav-link" href="index.php?page=user">Users</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?page=product_admin">Products</a></li>
        <?php endif; ?>

        <li class="nav-item"><a class="nav-link" href="index.php?page=sales">Sales</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?page=sales_report">Sales Report</a></li>
      </ul>

      <span class="navbar-text me-3">
        Logged in as <strong><?= htmlspecialchars($_SESSION['username']) ?></strong> (<?= htmlspecialchars($_SESSION['role']) ?>)
      </span>
      <a href="index.php?page=logout" class="btn btn-outline-light btn-sm">Logout</a>
    </div>
    <?php endif; ?>
  </div>
</nav>
<div class="container mt-4">
