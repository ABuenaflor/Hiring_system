<?php 
//session_start();
include("includes/header.php");
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
    <div class="wrapper">
            <?php
                include("includes/header.php"); 
            ?>
   <div class="container mt-5">
        <h2>Add Employee To Be Ranked</h2>

        <form action="code.php" method="POST">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Enter Full name">
                </div>

                <div class="col-md-4">
                    <label for="department" class="form-label">Department</label>
                    <select class="form-select" name="department" id="">
                        <?php
                            $department = mysqli_query($con, "SELECT dept_name FROM department");
                            while ($d =mysqli_fetch_array($department)){
                        ?>
                        <option value="<?php echo $d['dept_name']?>"> <?php echo $d['dept_name']?></option>
                        <?php } ?>
                    </select>
                </div>
                 
                <div class="col-md-4">
                    <label for="department" class="form-label">Campus</label> <br>
                    <select class="form-select" name="campus" id="">
                        <?php
                            $campus = mysqli_query($con, "SELECT campus_name FROM campus");
                            while ($c =mysqli_fetch_array($campus)){
                        ?>
                        <option value="<?php echo $c['campus_name']?>"> <?php echo $c['campus_name']?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
            <div class="col-md-6">
                    <label  class="form-label">Position</label> 
                    <select class="form-select" name="position" id="">
                        <?php
                            $position = mysqli_query($con, "SELECT position_name FROM position");
                            while ($p =mysqli_fetch_array($position)){
                        ?>
                        <option value="<?php echo $p['position_name']?>"> <?php echo $p['position_name']?></option>
                        <?php } ?>
                    </select>
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
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
