<?php $this->load->view('layouts/header'); ?>
<h3>Attendance Report</h3>
<form><input type="date" name="date" value="<?= $date ?>"><button class="btn btn-sm btn-primary">Filter</button></form>
<table class="table table-bordered mt-2"><tr><th>User</th><th>Date</th><th>In</th><th>Out</th><th>Status</th></tr>
<?php foreach($rows as $r): ?><tr><td><?= $r['user_id'] ?></td><td><?= $r['date'] ?></td><td><?= $r['in_time'] ?></td><td><?= $r['out_time'] ?></td><td><?= $r['status'] ?></td></tr><?php endforeach; ?>
</table>
<?php $this->load->view('layouts/footer'); ?>
