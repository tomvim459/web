<?php $this->load->view('layouts/header'); ?>
<h3><?= isset($user) ? 'Edit' : 'Create' ?> User</h3>
<form method="post">
<input class="form-control mb-2" name="name" value="<?= $user['name'] ?? '' ?>" placeholder="Name" required>
<input class="form-control mb-2" name="email" type="email" value="<?= $user['email'] ?? '' ?>" placeholder="Email" required>
<input class="form-control mb-2" name="password" type="password" placeholder="Password <?= isset($user) ? '(optional)' : '' ?>" <?= isset($user) ? '' : 'required' ?>>
<select class="form-control mb-2" name="role" required>
<option value="employee">Employee</option><option value="department_head">Department Head</option><option value="main_head">Main Head</option>
</select>
<select class="form-control mb-2" name="department_id" required><?php foreach($departments as $d): ?><option value="<?= $d['id'] ?>"><?= $d['name'] ?></option><?php endforeach; ?></select>
<button class="btn btn-success">Save</button></form>
<?php $this->load->view('layouts/footer'); ?>
