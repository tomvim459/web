<?php $this->load->view('layouts/header'); ?>
<h3><?= isset($department) ? 'Edit' : 'Create' ?> Department</h3>
<form method="post">
<input class="form-control mb-2" name="name" value="<?= $department['name'] ?? '' ?>" placeholder="Department Name" required>
<select class="form-control mb-2" name="head_user_id"><?php foreach($heads as $h): ?><option value="<?= $h['id'] ?>"><?= $h['name'] ?></option><?php endforeach; ?></select>
<button class="btn btn-success">Save</button></form>
<?php $this->load->view('layouts/footer'); ?>
