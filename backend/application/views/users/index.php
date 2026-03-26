<?php $this->load->view('layouts/header'); ?>
<h3>Users <a class="btn btn-sm btn-primary" href="<?= site_url('users/create') ?>">Add</a></h3>
<table class="table table-bordered"><tr><th>Name</th><th>Email</th><th>Role</th><th>Action</th></tr>
<?php foreach ($users as $u): ?><tr><td><?= $u['name'] ?></td><td><?= $u['email'] ?></td><td><?= $u['role'] ?></td><td><a href="<?= site_url('users/edit/'.$u['id']) ?>">Edit</a> | <a href="<?= site_url('users/delete/'.$u['id']) ?>">Delete</a></td></tr><?php endforeach; ?>
</table>
<?php $this->load->view('layouts/footer'); ?>
