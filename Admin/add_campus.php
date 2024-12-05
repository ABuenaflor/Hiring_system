<?php 
//session_start();
// include("../middleware/admin_middleware.php"); 
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
        <?php include("includes/header.php"); ?>
        <header class="cd__intro pt-5">
            <h1> Add Campus</h1>
            <p> Indicate Campus for Divine Word College of Legazpi </p>      
        </header>

        <div class="container">
                <form action="code.php" method="POST">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="campus_name" class="form-label">Campus</label>
                    <input type="text" name="campus_name" class="form-control" id="campus_name" placeholder="Enter Campus">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="add_campus">Save</button>
        </form>
        </div>
    </div>
</body>
</html>

