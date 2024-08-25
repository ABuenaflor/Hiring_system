<?php 
//session_start();
include("includes/header.php"); 
include("../middleware/admin_middleware.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Staff Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Add Employee</h2>
        <form action="code.php" method="POST">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Enter Full name">
                </div>
                <div class="col-md-4">
                    <label for="department" class="form-label">Department</label>
                    <input type="text" name="department" class="form-control" id="department" placeholder="Enter Department">
                </div>
                <div class="col-md-4">
                    <label for="department" class="form-label">Campus</label>
                    <input type="text" name="department" class="form-control" id="department" placeholder="Enter Department">
                </div>
            </div>
            <div class="row mb-3">
            <div class="col-md-6">
                    <label  class="form-label">Position</label>
                    <input type="text" name="position" class="form-control" id="position" placeholder="Enter Position">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" name="mobile_num" class="form-control" id="mobile" placeholder="">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" name="birth_date" class="form-control" id="dob" placeholder="">
                </div>
                <div class="col-md-6">
                    <label for="doj" class="form-label">Date Hired</label>
                    <input type="date" name="date_hired" class="form-control" id="doj" placeholder="">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="city" class="form-label">Permanent Address</label>
                    <input type="text" name="address" class="form-control" id="city" placeholder="">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="add_employee">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
