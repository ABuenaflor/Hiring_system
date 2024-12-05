<?php 
//session_start();
//include("includes/header.php"); placed inside wrapper 
// include("../middleware/admin_middleware.php"); 
?>

<body>
    <div class="wrapper">
            <?php
                include("includes/header.php"); 
            ?>
            <header class="cd__intro pt-5">
            <h1> Add Academic Rank</h1>
            <p> Indicate Academic Rank of Employees for Divine Word College of Legazpi </p>
            
    </header>
<form action="code.php" method="POST">
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="acad_rank_name" class="form-label">Academic Rank</label>
            <input type="text" name="acad_rank_name" class="form-control" id="acad_rank_name" placeholder="Enter Academic Rank">
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="add_acad_rank">Save</button>
</form>
    </div>
</body>
