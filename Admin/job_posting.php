<?php 
//session_start();
//include("includes/header.php"); placed inside wrapper
include("../middleware/admin_middleware.php"); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Posting Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .btn_round {
  width: 35px;
  height: 35px;
  display: inline-block;
  border-radius: 50%;
  text-align: center;
  line-height: 35px;
  margin-left: 10px;
  border: 1px solid #ccc;
  cursor: pointer;
}
.btn_round:hover {
  color: #fff;
  background: #6b4acc;
  border: 1px solid #6b4acc;
}

.btn_content_outer {
  display: inline-block;
  width: 85%;
}
.close_c_btn {
  width: 30px;
  height: 30px;
  position: absolute;
  right: 10px;
  top: 0px;
  line-height: 30px;
  border-radius: 50%;
  background: #ededed;
  border: 1px solid #ccc;
  color: #ff5c5c;
  text-align: center;
  cursor: pointer;
}

.add_icon {
  padding: 10px;
  border: 1px dashed #aaa;
  display: inline-block;
  border-radius: 50%;
  margin-right: 10px;
}
.add_group_btn {
  display: flex;
}
.add_group_btn i {
  font-size: 32px;
  display: inline-block;
  margin-right: 10px;
}

.add_group_btn span {
  margin-top: 8px;
}
.add_group_btn,
.clone_sub_task {
  cursor: pointer;
}

.sub_task_append_area .custom_square {
  cursor: move;
}

.del_btn_d {
  display: inline-block;
  position: absolute;
  right: 20px;
  border: 2px solid #ccc;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  line-height: 40px;
  text-align: center;
  font-size: 18px;
}
</style>


<body>
  <div class="wrapper">
        <?php
            include("includes/header.php"); 
        ?>
   <h2>Post Job Vacancy Requirement</h2>
                <!-- Display any success/error messages -->
        <?php
        if (isset($_GET['success'])) {
            echo "<div class='alert alert-success'>" . $_GET['success'] . "</div>";
        }
        ?>

        <form action="code.php" method="POST">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="fullName" class="form-label">Campus</label>
                        <select class="form-select" name="campus" id="">
                            <?php
                                $campus = mysqli_query($con, "SELECT campus_name FROM campus");
                                while ($c =mysqli_fetch_array($campus)){
                            ?>
                            <option value="<?php echo $c['campus_name']?>"> <?php echo $c['campus_name']?></option>
                            <?php } ?>
                        </select>
                </div>

                <div class="col-md-4">
                    <label for="fullName" class="form-label">Department</label>
                    <select class="form-select" name="dept" id="">
                            <?php
                                $department = mysqli_query($con, "SELECT dept_name FROM department");
                                while ($d =mysqli_fetch_array($department)){
                            ?>
                            <option value="<?php echo $d['dept_name']?>"> <?php echo $d['dept_name']?></option>
                            <?php } ?>
                        </select>
                </div>

                <div class="col-md-4">
                    <label for="fullName" class="form-label">Academic Role</label>
                    <select class="form-select" name="acad_role" id="">
                            <?php
                                $acad_role = mysqli_query($con, "SELECT acad_role_name FROM academic_roles");
                                while ($a =mysqli_fetch_array($acad_role)){
                            ?>
                            <option value="<?php echo $a['acad_role_name']?>"> <?php echo $a['acad_role_name']?></option>
                            <?php } ?>
                        </select>
                </div>

                <div class="col-md-4">
                    <label for="department" class="form-label">Institutional Role</label>
                    <select class="form-select" name="inst_role" id="">
                        <?php
                            $inst_role = mysqli_query($con, "SELECT inst_role_name FROM institutional_roles");
                            while ($i =mysqli_fetch_array($inst_role)){
                        ?>
                        <option value="<?php echo $i['inst_role_name']?>"> <?php echo $i['inst_role_name']?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-4">
                  <label for="qualifications" class="form-label">Qualifications</label>
                  <input class="form-control" type="text" name="qualifications" placeholder="Enter qualifications">
                </div>

                </div>
              
       

                  <button type="submit" class="btn btn-primary" name="add_job_posting">Submit</button>
        </form>
  </div>        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

  


 
</body>
</html>


