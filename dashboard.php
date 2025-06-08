<?php

    // include: header.php
    if (file_exists('includes/header.php'))
        require('includes/header.php');

    // include: database
    if (file_exists('includes/config.php'))
        require('includes/config.php');

?>

<!-- Dashboard Page -->
<!--#include file="header.html"-->
<div class="row mb-4">
  <div class="col">
    <h2 class="fw-bold">Welcome, Admin!</h2>
    <p class="text-muted">Here's an overview of your student database.</p>
  </div>
</div>
<div class="row g-4 mb-4">
  <div class="col-md-4">
    <div class="card shadow-sm rounded-4 border-0">
      <div class="card-body text-center">
        <i class="bi bi-people-fill text-primary mb-2" style="font-size: 2rem"></i>
        <h5 class="card-title mb-0">Total Students</h5>
        <h2 class="fw-bold text-primary">245</h2>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card shadow-sm rounded-4 border-0">
      <div class="card-body text-center">
        <i class="bi bi-person-plus-fill text-success mb-2" style="font-size: 2rem"></i>
        <h5 class="card-title mb-0">New Admissions</h5>
        <h2 class="fw-bold text-success">12</h2>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card shadow-sm rounded-4 border-0">
      <div class="card-body text-center">
        <i class="bi bi-calendar-event-fill text-warning mb-2" style="font-size: 2rem"></i>
        <h5 class="card-title mb-0">Upcoming Events</h5>
        <h2 class="fw-bold text-warning">3</h2>
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
            <tr>
              <td>2025-06-05</td>
              <td>Edited student: Jane Smith</td>
              <td>Admin</td>
            </tr>
            <tr>
              <td>2025-06-04</td>
              <td>Deleted student: Mark Lee</td>
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