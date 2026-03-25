<?php $this->load->view('layouts/header'); ?>
<h3>Departments <a class="btn btn-sm btn-primary" href="<?= site_url('departments/create') ?>">Add</a></h3>
<table class="table table-bordered"><tr><th>Name</th><th>Head User ID</th><th>Action</th></tr>
<?php foreach ($departments as $d): ?><tr><td><?= $d['name'] ?></td><td><?= $d['head_user_id'] ?></td><td><a href="<?= site_url('departments/edit/'.$d['id']) ?>">Edit</a> | <a href="<?= site_url('departments/delete/'.$d['id']) ?>">Delete</a></td></tr><?php endforeach; ?>
</table>
<?php $this->load->view('layouts/footer'); ?>
