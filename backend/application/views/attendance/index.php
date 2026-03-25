<?php $this->load->view('layouts/header'); ?>
<h3>Attendance</h3>
<a class="btn btn-success btn-sm" href="<?= site_url('attendance/check-in') ?>">Check In</a>
<a class="btn btn-danger btn-sm" href="<?= site_url('attendance/check-out') ?>">Check Out</a>
<table class="table table-bordered mt-3"><tr><th>Date</th><th>In</th><th>Out</th><th>Status</th></tr>
<?php foreach($records as $r): ?><tr><td><?= $r['date'] ?></td><td><?= $r['in_time'] ?></td><td><?= $r['out_time'] ?></td><td><?= $r['status'] ?></td></tr><?php endforeach; ?>
</table>
<?php $this->load->view('layouts/footer'); ?>
