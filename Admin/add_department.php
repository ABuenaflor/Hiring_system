<?php 
//session_start();
include("includes/header.php"); 
include("../middleware/admin_middleware.php"); 
?>

<header class="cd__intro pt-5">
            <h1> Add Department</h1>
            <p> Indicate departments for Basic Education and Tertiary Level </p>
            
    </header>
<form action="code.php" method="POST">
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="dept_name" class="form-label">Department</label>
            <input type="text" name="dept_name" class="form-control" id="dept_name" placeholder="Enter Department">
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="add_dept">Save</button>
</form>
<!-- edit check -->

