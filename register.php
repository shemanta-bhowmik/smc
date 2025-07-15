<?php

    // session start
    session_start();

    // Include database connection
    if (file_exists('includes/config.php')) {
        require_once 'includes/config.php';
    }

    // blank array for messages
    $messages = [];
    $errors = [];

    // form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // name
        $name 	= trim($_POST['name']);
        if (empty($name)) {
            $errors['name'] = '<small class="text-danger">This field is required</small>';
        }

        // email
        $email 	= trim($_POST['email']);
        if (empty($email)) {
            $errors['email'] = '<small class="text-danger">This field is required</small>';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = '<small class="text-danger">Invalid email format</small>';
        }

        // phone
        $phone 	= trim($_POST['phone']);
        if (empty($phone)) {
            $errors['phone'] = '<small class="text-danger">This field is required</small>';
        } elseif (!preg_match('/^[0-9+\-\s]+$/', $phone)) {
            $errors['phone'] = '<small class="text-danger">Phone format is invalid</small>';
        }

        // date of birth
        $dob 	= trim($_POST['dob']);
        if (empty($dob)){
            $errors['dob'] = '<small class="text-danger">This field is required</small>';
        } elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $dob)) {
            $errors['dob'] = '<small class="text-danger">Invalid date of birth format</small>';
        }

        // gender
        $gender	= $_POST['gender'] ?? '';
        $allowed_gender = ['Male', 'Female', 'Other', 'Prefer not to say'];
        if (empty($gender) || !in_array($gender, $allowed_gender)) {
            $errors['gender'] = '<small class="text-danger">This field is required</small>';
        }

        // role
        $role   = $_POST['role'] ?? '';
        $allowed_roles = ['Student', 'Faculty'];
        if (empty($role) || in_array($role, $allowed_gender)) {
            $errors['role'] = '<small class="text-danger">This field is required</small>';
        }

        // class
        $class = $_POST['class'];
        if (empty($class)) {
            $errors['class'] = '<small class="text-danger">This field is required</small>';
        }

        // photo
        $photo 	= $_FILES['photo']['name'] ?? '';
        // if (empty($photo)) {
        //     $errors['photo'] = '<small class="text-danger">This field is required</small>';
        // }

        $password = $_POST['password'] ?? '';
        if (empty($password)) {
            $errors['password'] = '<small class="text-danger">This field is required</small>';
        } elseif (!empty($password) && strlen($password) < 6) {
            $errors['password'] = '<small class="text-danger">Password must at least 6 characters</small>';
        }
        
        if (empty($errors)) {
            // hash password
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);
            // parepare databasee
            $sql = $conn->prepare("INSERT INTO students (name, email, phone, dob, gender, role, class,  photo, created_at, password)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(),  ?)");
            $sql->bind_param('sssssssss', $name, $email, $photo, $dob, $gender, $role, $class, $photo, $password_hashed);

            if ($sql->execute()) {
                $messages[] = '<small class="alert alert-success d-block text-center">Registration Successfully!</small>';
            } else {
                $messages[] = 'Registration Failed. ' . $conn->error;
            }
        }

    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="d-flex align-items-center justify-content-center">
    <div class="col-md-5 col-lg-4">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
        <h2 class="mb-4 text-center">Registration</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" class="form-control" maxlength="100">
                <?= $errors['name'] ?? ''?>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" id="email" class="form-control" maxlength="100" value="<?= htmlspecialchars($_POST['email'] ?? '')?>">
                <?= $errors['email'] ?? '' ?>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" name="phone" id="phone" class="form-control" maxlength="20" pattern="[0-9+\-\s]+" >
                <?= $errors['phone'] ?? '' ?>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob" class="form-control" >
                <?= $errors['dob'] ?? '' ?>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control" >
                    <option value="" disabled selected>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                    <option value="Prefer not to say">Prefer not to say</option>
                </select>
            </div>
            <?= $errors['gender'] ?? '' ?>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control" require>
                    <option value="" disabled selected>Select Role</option>
                    <option value="faculty">Faculty</option>
                    <option value="Student">Student</option>
                </select>
            </div>
            <?= $errors['role'] ?? '' ?>
            <div class="form-group">
                <label for="class">Class</label>
                <input type="text" name="class" id="class" class="form-control"  maxlength="50" placeholder="e.g. 10th Grade">
            </div>
            <?= $errors['class'] ?? ''?>
            <div class="form-group">
                <label for="photo">Profile Picture</label>
                <input type="file" name="photo" id="photo" class="form-control-file border p-2" accept="image/*" >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control p-2">
            </div>
            <?= $errors['password'] ?? ''; ?>
            <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
            <p class="mt-2">
            <?php
            
                // display message
                foreach($messages as $message) {
                    echo $message;
                }
            
            ?>
            </p>
        </form>
        <p class="mt-3">Already have an account? <a href="index.php">Login here</a></p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>