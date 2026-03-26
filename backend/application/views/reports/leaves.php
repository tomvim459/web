<?php $this->load->view('layouts/header'); ?>
<h3>Leave Report</h3>
<table class="table table-bordered"><tr><th>User</th><th>Dates</th><th>Status</th></tr>
<?php foreach($rows as $r): ?><tr><td><?= $r['user_id'] ?></td><td><?= $r['start_date'] ?> - <?= $r['end_date'] ?></td><td><?= $r['status'] ?></td></tr><?php endforeach; ?>
</table>
<?php $this->load->view('layouts/footer'); ?>
