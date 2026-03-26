<?php $this->load->view('layouts/header'); ?>
<h3>Holidays <a class="btn btn-sm btn-primary" href="<?= site_url('holidays/create') ?>">Add</a></h3>
<table class="table table-bordered"><tr><th>Name</th><th>Date</th><th>Action</th></tr>
<?php foreach($holidays as $h): ?><tr><td><?= $h['name'] ?></td><td><?= $h['holiday_date'] ?></td><td><a href="<?= site_url('holidays/edit/'.$h['id']) ?>">Edit</a> | <a href="<?= site_url('holidays/delete/'.$h['id']) ?>">Delete</a></td></tr><?php endforeach; ?>
</table>
<?php $this->load->view('layouts/footer'); ?>
