<?php

	// create table
	if (file_exists('create_tables.php')) {
		require_once('create_tables.php');
	}

	session_start();
	$errors 	= [];
	$user_id	= $_POST['id'] ?? '';
	$email		= $_POST['email'] ?? '';
	$password	= $_POST['password'] ?? '';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// config file
		if (file_exists('includes/config.php')) {
			require('includes/config.php');
		}

		// validation: email
		if (empty($email)) {
			$errors['email'] = '<span class="text-danger mb-2 d-block">Enter your email</span>';
		}

		// validation: password
		if (empty($password)) {
			$errors['password'] = '<span class="text-danger mb-2 d-block">Enter your password</span>';
		}

		// database
		if (empty($errors)) {
			// prepaer query to fetch user by email and role
			$sql = $conn->prepare('SELECT id, email, password from students WHERE email=?');
			$sql->bind_param('s', $email);
			$sql->execute();
			$result = $sql->get_result();

			if ($user = $result->fetch_assoc()) {
				if (password_verify($password, $user['password'])) {
					// creating session
					$_SESSION['user_id'] = $user_id;
					$_SESSION['email'] = $email;
					// redirect to dashboard page
					header('Location: dashboard.php');
					exit();
				} else {
					$errors['general'] = '<span class="alert alert-danger mb-2 d-block">Invalid password</span>';
				}
			} else {
				$errors['general'] = '<span class="alert alert-danger mb-2 d-block">No user found with that email</span>';
			}
		}
	}

?>

<!-- Login Page -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMC - Login</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="d-flex align-items-center justify-content-center vh-100">
		<div class="col-md-5 col-lg-4">
			<div class="card shadow-lg border-0 rounded-4">
				<div class="card-body p-4">
					<h2 class="fw-bold text-center text-primary">SMC</h2>
					<h6 class="text-center mb-4">Login</h6>
					<form method="POST">
						<div class="form-floating mb-3">
							<input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?= htmlspecialchars($email) ?>">
							<label for="email">Email</label>
						</div>
						<?= $errors['email'] ?? '' ?>
						<div class="form-floating mb-4">
							<input type="password" class="form-control" id="password" placeholder="Password" name="password">
							<label for="password">Password</label>
						</div>
						<?= $errors['password'] ?? ''; ?>
						<div class="form-check mb-3">
							<input type="checkbox" class="form-check-input" id="remember">
							<label class="form-check-label" for="remember">Remember me</label>
						</div>
						<button type="submit" class="btn btn-primary w-100 mb-2">Login</button>
					</form>
					<?php
					
						if (!empty($errors['general'])) {
							echo $errors['general'];
						}
					
					?>
					<p>Don't have an account? <a href="register.php">Register here</a></p>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>