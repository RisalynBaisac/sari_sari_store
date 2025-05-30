<?php include 'app/views/layout/header.php'; ?>

<div class="row justify-content-center">
  <div class="col-md-4">
    <h3>Login</h3>

    <?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post" action="index.php?page=login">
      <div class="mb-3">
        <label>Username</label>
        <input name="username" class="form-control" required />
      </div>
      <div class="mb-3">
        <label>Password</label>
        <input name="password" type="password" class="form-control" required />
      </div>
      <button class="btn btn-primary w-100">Login</button>
    </form>
  </div>
</div>

<?php include 'app/views/layout/footer.php'; ?>