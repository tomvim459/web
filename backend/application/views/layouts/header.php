<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Staff Management</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>.sidebar{min-height:100vh;background:#f8f9fa}.status-present{color:green}.status-absent{color:red}.status-holiday{color:blue}</style>
</head>
<body>
<div class="container-fluid"><div class="row">
<?php $user = $this->session->userdata('user'); ?>
<?php if ($user): ?>
<div class="col-md-2 sidebar p-3">
  <h5>Menu</h5>
  <a class="d-block" href="<?= site_url('dashboard') ?>">Dashboard</a>
  <?php if ($user['role'] === 'main_head'): ?><a class="d-block" href="<?= site_url('users') ?>">Users</a><a class="d-block" href="<?= site_url('departments') ?>">Departments</a><?php endif; ?>
  <a class="d-block" href="<?= site_url('leaves') ?>">Leaves</a>
  <a class="d-block" href="<?= site_url('attendance') ?>">Attendance</a>
  <a class="d-block" href="<?= site_url('calendar') ?>">Calendar</a>
  <a class="d-block" href="<?= site_url('holidays') ?>">Holidays</a>
  <a class="d-block" href="<?= site_url('reports/attendance') ?>">Attendance Report</a>
  <a class="d-block" href="<?= site_url('reports/leaves') ?>">Leave Report</a>
  <a class="d-block text-danger" href="<?= site_url('logout') ?>">Logout</a>
</div>
<div class="col-md-10 p-3">
<?php else: ?><div class="col-12 p-3"><?php endif; ?>
