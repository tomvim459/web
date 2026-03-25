<?php $this->load->view('layouts/header'); ?>
<h3><?= isset($holiday) ? 'Edit' : 'Add' ?> Holiday</h3>
<form method="post"><input class="form-control mb-2" name="name" value="<?= $holiday['name'] ?? '' ?>" placeholder="Holiday Name" required>
<input type="date" class="form-control mb-2" name="holiday_date" value="<?= $holiday['holiday_date'] ?? '' ?>" required><button class="btn btn-success">Save</button></form>
<?php $this->load->view('layouts/footer'); ?>
