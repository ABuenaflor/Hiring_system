<?php 
//session_start();
//include("includes/header.php"); placed inside wrapper 
include("../middleware/admin_middleware.php"); 
?>

<body>
    <div class="wrapper">
        <?php
            include("includes/header.php"); 
        ?>
<header class="cd__intro pt-5">
            <h1> Add Institutional Role</h1>
            <p> Role for the whole departments of Basic Education and Tertiary Level </p>
            
    </header>
<form action="code.php" method="POST">
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="inst_role_name" class="form-label">Institutional Role</label>
            <input type="text" name="inst_role_name" class="form-control" id="inst_role_name" placeholder="Enter Role">
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="add_inst_role">Save</button>
</form>
    </div>
</body>



