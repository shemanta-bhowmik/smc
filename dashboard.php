<?php
	// session
	session_start();
	if (!isset($_SESSION['user_id'])) {
		header('location: index.php');
		exit();
	}

	// include: header.php
	if (file_exists('includes/header-dashboard.php')) {
		require('includes/header-dashboard.php');
	}

	// include: database
	if (file_exists('includes/config.php')) {
		require('includes/config.php');
	}

	// user info
	$email 		= $_SESSION['email'];
	$sql 		= $conn->prepare("SELECT name, email FROM students WHERE email=?");
	$sql->bind_param('s', $email);
	$sql->execute();
	$user 		= $sql->get_result()->fetch_assoc();
	$user_name	= $user['name'] ?? '';
	$user_email	= $user['email'] ?? '';

	// get total students
	$total_students = 0;
	$res			= $conn->query("SELECT COUNT(*) AS total FROM students");
	if ($row = $res->fetch_assoc()) {
		$total_students = $row['total'];
	}

?>

<!-- Dashboard Page -->
<!--#include file="header.html"-->
<div class="row mb-4">
  <div class="col">
	<h2 class="fw-bold">Welcome to Dashboard</h2>
	<p class="text-muted mb-0">Name: <?= htmlspecialchars($user_name) ?>!</p>
	<p class="text-muted">Email: <a href="mailto:<?= htmlspecialchars($user_email) ?>"><?= htmlspecialchars($user_email) ?></a></p>
  </div>
</div>
<div class="row g-4 mb-4">
  <div class="col-md-4">
	<div class="card shadow-sm rounded-4 border-0">
	  <div class="card-body text-center">
		<i class="bi bi-people-fill text-primary mb-2" style="font-size: 2rem"></i>
		<h5 class="card-title mb-0">Total Students</h5>
		<h2 class="fw-bold text-primary"><?= $total_students; ?></h2>
	  </div>
	</div>
  </div>
  <div class="col-md-4">
	<div class="card shadow-sm rounded-4 border-0">
	  <div class="card-body text-center">
		<i class="bi bi-person-plus-fill text-success mb-2" style="font-size: 2rem"></i>
		<h5 class="card-title mb-0">New Admissions</h5>
		<h2 class="fw-bold text-success"><?= $total_students; ?></h2>
	  </div>
	</div>
  </div>
  <div class="col-md-4">
	<div class="card shadow-sm rounded-4 border-0">
	  <div class="card-body text-center">
		<i class="bi bi-calendar-event-fill text-warning mb-2" style="font-size: 2rem"></i>
		<h5 class="card-title mb-0">Upcoming Events</h5>
		<h2 class="fw-bold text-warning">0</h2>
	  </div>
	</div>
  </div>
</div>
<div class="row">
  <div class="col">
	<div class="card shadow-sm rounded-4 border-0">
	  <div class="card-header bg-white fw-bold">Recent Activity</div>
	  <div class="card-body p-0">
		<table class="table table-hover mb-0">
		  <thead>
			<tr>
			  <th>Date</th>
			  <th>Activity</th>
			  <th>User</th>
			</tr>
		  </thead>
		  <tbody>
			<tr>
			  <td>2025-06-07</td>
			  <td>Added new student: John Doe</td>
			  <td>Admin</td>
			</tr>
		  </tbody>
		</table>
	  </div>
	</div>
  </div>
</div>
<!--#include file="footer.html"-->

<?php

	if (file_exists('includes/footer.php'))
		require('includes/footer.php');

?>