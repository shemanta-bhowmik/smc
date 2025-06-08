<?php

    if (file_exists('create_tables.php')) {
        require('create_tables.php');
    }

?>

<!-- Landing/Login Page -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMC - Login</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="d-flex align-items-center justify-content-center vh-100">
    <div class="col-md-5 col-lg-4">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
          <h2 class="fw-bold text-center text-primary">SMC</h2>
          <h6 class="text-center mb-4">Login</h6>
          <form>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="username" placeholder="Username">
              <label for="username">Username</label>
            </div>
            <div class="form-floating mb-4">
              <input type="password" class="form-control" id="password" placeholder="Password">
              <label for="password">Password</label>
            </div>
            <div class="form-check mb-3">
              <input type="checkbox" class="form-check-input" id="remember">
              <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-2">Login</button>
            <?php
            
                // display message
                foreach($messages as $message) {
                    echo $message;
                }
                        
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>