<?php

	// session
	session_start();
	if (empty($_SESSION['email'])) {
		header('Location: ../index.php');
		exit();
	}

	/**
	 * Files
	 * -- header
	 * -- config
	 * -- footer
	 */
	if (file_exists('../includes/header-dashboard.php')) {
		require('../includes/header-dashboard.php');
	}

	if (file_exists('../includes/config.php')) {
		require('../includes/config.php');
	}

	$student_id	= isset($_GET['id']) ? (int) $_GET['id'] : 0;

	// fetch user info from the database
	$student 	= [];
	if ($student_id > 0) {
		$sql	= $conn->prepare("SELECT * FROM students WHERE id=?");
		$sql->bind_param('i', $student_id);
		$sql->execute();
		$student= $sql->get_result()->fetch_assoc();
	}
	
	if (!$student_id) {
		header('location: ' . $base_url . '/students/list.php');
	}

?>

<!-- Student Profile Page -->
<!--#include file="header.html"-->
<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="card shadow p-4 text-center rounded-4">
			<img src="<?= $base_url . '/assets/img/' . $student['photo'] ?? ''; ?>" class="rounded-circle mb-3 border m-auto" width="120" height="120" alt="Profile">
			<h3 class="mb-0"><?= $student['name'] ?? ''; ?></h3>
			<p class="text-muted">Class: <?= $student['class']; ?></p>
			<hr>
			<div class="row text-start mb-2">
			<div class="col-6"><strong>Email:</strong></div>
			<div class="col-6"><a href="<?= $student['email']; ?>"><?= $student['email'] ?? ''; ?></div></a>
		</div>
		<div class="row text-start mb-2">
			<div class="col-6"><strong>Phone:</strong></div>
			<div class="col-6"><a href="tel:<?= $student['phone']; ?>"><?= $student['phone'] ?? ''; ?></a></div>
		</div>
		<div class="row text-start mb-2">
			<div class="col-6"><strong>Date of Birth:</strong></div>
			<div class="col-6"><?= $student['dob']; ?></div>
		</div>
		<div class="row text-start mb-2">
			<div class="col-6"><strong>Gender:</strong></div>
			<div class="col-6"><?= $student['gender']; ?></div>
		</div>
		<!-- <div class="row text-start mb-2">
			<div class="col-6"><strong>Address:</strong></div>
			<div class="col-6">123 Street Name, City</div>
		</div> -->
		<div class="mt-4">
			<a href="<?= $base_url; ?>students/edit.php" class="btn btn-outline-secondary me-2"><i class="bi bi-pencil"></i> Edit</a>
			<a href="<?= $base_url; ?>students/list.php" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Back</a>
		</div>
	</div>
</div>
<!--#include file="footer.html"-->
<?php

	if (file_exists('../includes/footer.php'))
		require('../includes/footer.php');

?>