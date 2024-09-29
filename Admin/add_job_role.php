<?php 
//session_start();
/* include("includes/header.php"); 
 */include("../middleware/admin_middleware.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <?php
            include("includes/header.php"); 
        ?>  
        <header class="cd__intro pt-5">
                <h1> Add Job Role</h1>
                <p> Indicate Job Role for Basic Education and Tertiary Level Teaching and Non Teaching </p>
                
        </header>
        <div class="container">
                <form action="code.php" method="POST">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="dept_name" class="form-label">Job Role</label>
                            <input type="text" name="job_role" class="form-control" id="dept_name" placeholder="Enter Job Role">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="add_job_role">Save</button>
                </form>
        </div>
    </div>
</body>
</html>


