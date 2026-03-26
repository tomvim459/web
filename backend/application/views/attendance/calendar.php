<?php $this->load->view('layouts/header'); ?>
<h3>Calendar View (<?= $month ?>)</h3>
<ul>
<li><span class="status-present">Present</span></li><li><span class="status-absent">Absent</span></li><li><span class="status-holiday">Holiday</span></li>
</ul>
<table class="table table-bordered"><tr><th>Date</th><th>Type</th></tr>
<?php foreach($records as $r): ?><tr><td><?= $r['date'] ?></td><td class="status-present">Present</td></tr><?php endforeach; ?>
<?php foreach($holidays as $h): ?><tr><td><?= $h['holiday_date'] ?></td><td class="status-holiday">Holiday (<?= $h['name'] ?>)</td></tr><?php endforeach; ?>
</table>
<?php $this->load->view('layouts/footer'); ?>
