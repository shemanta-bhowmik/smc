<?php

	// session
	session_start();
	if (!isset($_SESSION['email'])) {
		header('location: ../index.php');
		exit();
	}

	/**
	 * Files
	 * -- header
	 * -- config
	 */
	if (file_exists('../includes/header-dashboard.php')) {
		require('../includes/header-dashboard.php');
	}

	if (file_exists('../includes/config.php')) {
		require('../includes/config.php');
	}

	// fetch student information
	$students   = [];
	$student_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
	if ($student_id > 0) {
		$sql    = $conn->prepare("SELECT * FROM students WHERE id=?");
		$sql->bind_param('i', $student_id);
		if ($sql->execute()) {
			$students = $sql->get_result()->fetch_assoc();
		} else {
			$_SESSION['error'] = '<small class="alert alert-danger text-center">Student not found!</small>';
			header('location: ' . $base_url . 'students/list.php');
		}
	} else {
		$_SESSION['error'] = '<small class="alert alert-danger text-center">Invalid Student ID</small>';
	}

	// update student information
	$errors = [];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name 		= trim($_POST['name']);
		$email 		= trim($_POST['email']);
		$phone 		= trim($_POST['phone']);
		$dob		= trim($_POST['dob']);
		$gender 	= trim($_POST['gender']);
		$role 		= trim($_POST['role']);
		$class 		= trim($_POST['class']);
		$photo		= trim($_POST['photo']);

		$sql		= $conn->prepare("UPDATE students SET name=?, email=?, phone=?, dob=?, gender=?, role=?, class=? WHERE id=?");
		$sql->bind_param('sssssssi', $name, $email, $phone, $dob, $gender, $role, $class, $student_id);
		
		if ($sql->execute()) {
			$_SESSION['success'] = '<small class="alert alert-success text-center">Student updated successfully!</small>';
			header('location: ' . $base_url . 'students/list.php');
			exit();
		} else {
			$errors['error'] = '<small class="alert alert-danger text-center">Faild to update studnet!</small>';
		}
	}
?>

<!-- Edit Student Page -->
<!--#include file="header.html"-->
<div class="row justify-content-center">
  <div class="col-md-8 col-lg-6">
	<div class="card shadow rounded-4">
	  <div class="card-header bg-white fw-bold">Edit Student</div>
	  <div class="card-body">
		<?php
		
			if (!empty($errors)) {
				foreach($errors as $error) {
					echo $error;
				}
			}
		
		?>
		<form method="post">
			<div class="form-floating mb-3">
				<input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($students['name']) ?>" placeholder="Full Name">
				<label for="name">Full Name</label>
			</div>
			<div class="form-floating mb-3">
				<input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($students['email']) ?>" placeholder="Email">
				<label for="email">Email</label>
			</div>
			<div class="form-floating mb-3">
				<input type="tel" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($students['phone']) ?>" placeholder="Phone">
				<label for="phone">Phone</label>
			</div>
			<div class="form-floating mb-3">
				<input type="date" class="form-control" id="dob" name="dob" value="<?= htmlspecialchars($students['dob']) ?>" placeholder="Date of Birth">
				<label for="dob">Date of Birth</label>
			</div>
			<div class="form-floating mb-3">
				<select name="gender" id="gender" class="form-control" >
					<option value="" disabled>Select Gender</option>
					<option value="Male" <?= $students['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
					<option value="Female" <?= $students['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
					<option value="Other" <?= $students['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
					<option value="Prefer not to say" <?= $students['gender'] == 'Prefer not to say' ? 'selected' : '' ?>>Prefer not to say</option>
				</select>
				<label for="gender">Gender</label>
			</div>
			<div class="form-floating mb-3">
				<select name="role" id="role" class="form-control" require>
					<option value="" disabled selected>Select Role</option>
					<option value="faculty" <?= $students['role'] == 'Faculty' ? 'selected' : '' ?>>Faculty</option>
					<option value="Student" <?= $students['role'] == 'Student' ? 'selected' : '' ?>>Student</option>
				</select>
				<label for="role">Role</label>
			</div>
		  <div class="form-floating mb-3">
			<input type="text" class="form-control" id="class" name="class" value="<?= htmlspecialchars($students['class']) ?>" placeholder="Class">
			<label for="class">Class</label>
		  </div>
		  <div class="mb-3">
			<label for="photo" class="form-label">Student Photo</label>
			<input class="form-control" type="file" id="photo" name="photo">
		  </div>
		  <button type="submit" class="btn btn-success w-100">Update Student</button>
		</form>
	  </div>
	</div>
  </div>
</div>
<!--#include file="footer.html"-->
<?php

	if (file_exists('../includes/footer.php'))
		require('../includes/footer.php');

?>