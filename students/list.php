<!-- Students List Page -->
<!--#include file="header.html"-->
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="fw-bold">Student List</h4>
  <a href="students-add.html" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add Student</a>
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
      <tr>
        <td><img src="https://via.placeholder.com/40" class="rounded-circle" alt="Avatar"></td>
        <td>John Doe</td>
        <td>john@example.com</td>
        <td>10</td>
        <td>
          <a href="students-view.html" class="btn btn-sm btn-outline-info" title="View"><i class="bi bi-eye"></i></a>
          <a href="students-edit.html" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="bi bi-pencil"></i></a>
          <button class="btn btn-sm btn-outline-danger" title="Delete"><i class="bi bi-trash"></i></button>
        </td>
      </tr>
      <tr>
        <td><img src="https://via.placeholder.com/40" class="rounded-circle" alt="Avatar"></td>
        <td>Jane Smith</td>
        <td>jane@example.com</td>
        <td>11</td>
        <td>
          <a href="students-view.html" class="btn btn-sm btn-outline-info" title="View"><i class="bi bi-eye"></i></a>
          <a href="students-edit.html" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="bi bi-pencil"></i></a>
          <button class="btn btn-sm btn-outline-danger" title="Delete"><i class="bi bi-trash"></i></button>
        </td>
      </tr>
      <!-- More rows -->
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