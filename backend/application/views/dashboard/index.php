<?php $this->load->view('layouts/header'); ?>
<h2>Dashboard (<?= ucfirst(str_replace('_', ' ', $user['role'])) ?>)</h2>
<div class="row g-3">
  <div class="col-md-3"><div class="card"><div class="card-body"><h6>Total Employees</h6><h3><?= $total_employees ?></h3></div></div></div>
  <div class="col-md-3"><div class="card"><div class="card-body"><h6>Present</h6><h3 class="text-success"><?= $present ?></h3></div></div></div>
  <div class="col-md-3"><div class="card"><div class="card-body"><h6>Absent</h6><h3 class="text-danger"><?= $absent ?></h3></div></div></div>
  <div class="col-md-3"><div class="card"><div class="card-body"><h6>Pending Leaves</h6><h3 class="text-warning"><?= $pending_leave ?></h3></div></div></div>
</div>
<?php $this->load->view('layouts/footer'); ?>
