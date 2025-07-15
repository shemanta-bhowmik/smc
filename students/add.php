<?php

    if (file_exists('../includes/header-dashboard.php'))
        require ('../includes/header-dashboard.php')

?>

<!-- Add Student Page -->
<!--#include file="header.html"-->
<div class="row justify-content-center">
  <div class="col-md-8 col-lg-6">
    <div class="card shadow rounded-4">
      <div class="card-header bg-white fw-bold">Add New Student</div>
      <div class="card-body">
        <form>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" placeholder="Full Name">
            <label for="name">Full Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" placeholder="Email">
            <label for="email">Email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="tel" class="form-control" id="phone" placeholder="Phone">
            <label for="phone">Phone</label>
          </div>
          <div class="form-floating mb-3">
            <input type="date" class="form-control" id="dob" placeholder="Date of Birth">
            <label for="dob">Date of Birth</label>
          </div>
          <div class="mb-3">
            <label class="form-label">Gender</label>
            <div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender1" value="male">
                <label class="form-check-label" for="gender1">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender2" value="female">
                <label class="form-check-label" for="gender2">Female</label>
              </div>
            </div>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="class" placeholder="Class">
            <label for="class">Class</label>
          </div>
          <div class="mb-3">
            <label for="photo" class="form-label">Student Photo</label>
            <input class="form-control" type="file" id="photo">
          </div>
          <button type="submit" class="btn btn-success w-100">Save Student</button>
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