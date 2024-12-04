<?php 
//session_start();
// include("../middleware/admin_middleware.php"); 
?>

<header class="cd__intro pt-5">
            <h1> Add Academic Role</h1>
            <p> Role for the whole departments of Basic Education and Tertiary Level </p>
            
    </header>
<form action="code.php" method="POST">
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="acad_role_name" class="form-label">Institutional Role</label>
            <input type="text" name="acad_role_name" class="form-control" id="acad_role_name" placeholder="Enter Role">
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="add_acad_role">Save</button>
</form>


