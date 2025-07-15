<?php

    if (file_exists('../includes/header-dashboard.php'))
        require('../includes/header-dashboard.php')

?>

<!-- Student Profile Page -->
<!--#include file="header.html"-->
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow p-4 text-center rounded-4">
      <img src="https://via.placeholder.com/120" class="rounded-circle mb-3 border" width="120" height="120" alt="Profile">
      <h3 class="mb-0">John Doe</h3>
      <p class="text-muted">Class 10</p>
      <hr>
      <div class="row text-start mb-2">
        <div class="col-6"><strong>Email:</strong></div>
        <div class="col-6">john@example.com</div>
      </div>
      <div class="row text-start mb-2">
        <div class="col-6"><strong>Phone:</strong></div>
        <div class="col-6">1234567890</div>
      </div>
      <div class="row text-start mb-2">
        <div class="col-6"><strong>Date of Birth:</strong></div>
        <div class="col-6">2006-02-01</div>
      </div>
      <div class="row text-start mb-2">
        <div class="col-6"><strong>Gender:</strong></div>
        <div class="col-6">Male</div>
      </div>
      <div class="row text-start mb-2">
        <div class="col-6"><strong>Address:</strong></div>
        <div class="col-6">123 Street Name, City</div>
      </div>
      <div class="mt-4">
        <a href="students-edit.html" class="btn btn-outline-secondary me-2"><i class="bi bi-pencil"></i> Edit</a>
        <a href="students-list.html" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Back</a>
      </div>
    </div>
  </div>
</div>
<!--#include file="footer.html"-->
<?php

    if (file_exists('../includes/footer.php'))
        require('../includes/footer.php');

?>