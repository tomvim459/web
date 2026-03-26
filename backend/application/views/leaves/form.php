<?php $this->load->view('layouts/header'); ?>
<h3>Apply Leave</h3>
<form method="post">
<input type="date" class="form-control mb-2" name="start_date" required>
<input type="date" class="form-control mb-2" name="end_date" required>
<textarea class="form-control mb-2" name="reason" placeholder="Reason" required></textarea>
<button class="btn btn-success">Submit</button>
</form>
<?php $this->load->view('layouts/footer'); ?>
