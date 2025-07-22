<?php

	// session
	session_start();
	if (!isset($_SESSION['email'])) {
		header('location: index.php');
		exit();
	}

	/**
	 * include files
	 * -- header
	 * -- config
	 */
	if (file_exists('../includes/header-dashboard.php')) {
		require('../includes/header-dashboard.php');
	}

	if (file_exists('../includes/config.php')) {
		require('../includes/config.php');
	}

	// getting user information from the database
	$students	= [];
	$sql 		= $conn->query("SELECT id, name, email, class, photo FROM students");
	if ($sql) {
		while ($row = $sql->fetch_assoc()) {
			$students[] = $row;
		}
	}

?>

<!-- Students List Page -->
<!--#include file="header.html"-->
<!-- show errors -->
<?php

	if (isset($_SESSION['success'])) {
		echo $_SESSION['success'];
		unset($_SESSION['success']);
	} elseif (isset($_SESSION['error'])) {
		echo $_SESSION['error'];
		unset($_SESSION['error']);
	}

?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="fw-bold">Student List</h4>
  <a href="<?php echo $base_url; ?>students/add.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add Student</a>
</div>
<form class="mb-3">
  <div class="input-group">
	<input type="text" class="form-control" placeholder="Search by name or email">
	<button class="btn btn-outline-primary" type="button"><i class="bi bi-search"></i></button>
  </div>
</form>
<div class="table-responsive">
  <table class="table table-hover table-bordered align-middle">
	<thead class="table-light">
	  <tr>
		<th scope="col">Photo</th>
		<th scope="col">Name</th>
		<th scope="col">Email</th>
		<th scope="col">Class</th>
		<th scope="col">Actions</th>
	  </tr>
	</thead>
	<tbody>
		<?php if (empty($students)): ?>
			<tr>
				<td colspan="5" calss="text-center text-muted">No students found.</td>
			</tr>
		<?php else: ?>
		<?php foreach($students as $student): ?>
		<tr>
		<td>
			<img src="<?= $base_url . '/assets/img/' . $student['photo'] ?>" class="rounded-circle" style="width: 50px; height: 50px;" alt="Avatar"></td>
			<td><?= $student['name'] ?></td>
			<td><?= $student['email']; ?></td>
			<td><?= $student['class']; ?></td>
			<td>
				<a href="<?= $base_url; ?>students/student-profile.php/?id=<?= urlencode($student['id']) ?>" class="btn btn-sm btn-outline-info" title="View"><i class="bi bi-eye"></i></a>
				<a href="<?= $base_url; ?>students/edit.php/?id=<?= urlencode($student['id']) ?>" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="bi bi-pencil"></i></a>
				<a href="<?= $base_url; ?>students/delete.php/?id=<?= urlencode($student['id']) ?>" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this student?')"><i class="bi bi-trash"></i></a>
			</td>
		</tr>
		<?php endforeach; ?>
		<?php endif; ?>
	</tbody>
  </table>
</div>
<nav>
  <ul class="pagination justify-content-end mt-3">
	<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
	<li class="page-item active"><a class="page-link" href="#">1</a></li>
	<li class="page-item"><a class="page-link" href="#">2</a></li>
	<li class="page-item"><a class="page-link" href="#">3</a></li>
	<li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
<!--#include file="footer.html"-->
<?php

	if (file_exists('../includes/footer.php'))
		require('../includes/footer.php');

?>