<?php

    $base_url = 'http://localhost/sms/';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EduEase - Student Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="<?php echo $base_url; ?>dashboard.php">SMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>dashboard.php">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>students/list.php">Students</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>students/view.php">Profile</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>index.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-4">