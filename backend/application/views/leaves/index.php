<?php $this->load->view('layouts/header'); ?>
<h3>Leaves <a class="btn btn-sm btn-primary" href="<?= site_url('leaves/apply') ?>">Apply</a></h3>
<table class="table table-striped"><tr><th>User</th><th>From</th><th>To</th><th>Reason</th><th>Status</th><th>Action</th></tr>
<?php foreach ($leaves as $l): ?><tr><td><?= $l['user_id'] ?></td><td><?= $l['start_date'] ?></td><td><?= $l['end_date'] ?></td><td><?= $l['reason'] ?></td><td><?= $l['status'] ?></td><td><?php if(in_array($user['role'],['main_head','department_head'])): ?><a href="<?= site_url('leaves/approve/'.$l['id']) ?>">Approve</a> | <a href="<?= site_url('leaves/reject/'.$l['id']) ?>">Reject</a><?php endif; ?></td></tr><?php endforeach; ?>
</table>
<?php $this->load->view('layouts/footer'); ?>
