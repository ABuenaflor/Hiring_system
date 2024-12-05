<?php 
//session_start();
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
                <h1> Add Department</h1>
                <p> Indicate departments for Basic Education and Tertiary Level </p>    
            </header>

            <div class="container">
            <form action="code.php" method="POST">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="dept_name" class="form-label">Department</label>
                        <input type="text" name="dept_name" class="form-control" id="dept_name" placeholder="Enter Department">
                    </div>
                    <div class="col-md-4">
                                <label for="level" class="form-label">Level</label>
                                <select class="form-select" name="level" id="">
                                    <?php
                                        $level = mysqli_query($con, "SELECT level FROM department");
                                        while ($l =mysqli_fetch_array($level)){
                                    ?>
                                    <option value="<?php echo $l['level']?>"> <?php echo $l['level']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                </div>
                <button type="submit" class="btn btn-primary" name="add_dept">Save</button>
            </form>
            </div>
    </div>
</body>
</html>
