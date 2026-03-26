<?php $this->load->view('layouts/header'); ?>
<div class="row justify-content-center"><div class="col-md-4">
<h3>Login</h3>
<?php if (!empty($error)): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>
<form method="post">
  <input class="form-control mb-2" type="email" name="email" placeholder="Email" required>
  <input class="form-control mb-2" type="password" name="password" placeholder="Password" required>
  <button class="btn btn-primary w-100">Login</button>
</form></div></div>
<?php $this->load->view('layouts/footer'); ?>
