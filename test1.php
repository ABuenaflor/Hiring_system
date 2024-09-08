<?php
include("config/dbcon.php");

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form submission
    $campus = $_POST['campus'];
    $department = $_POST['dept'];
    $acad_role = $_POST['acad_role'];
    $inst_role = $_POST['inst_role'];
    $qualifications = implode(', ', $_POST['qualifications']);

    // Insert data into the job_posting table
    $sql = "INSERT INTO job_posting (campus_id,dept_id, acad_role_id,inst_role_id,qualifications)
            VALUES ('$campus', '$department', '$acad_role','$inst_role','$qualifications')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Job posting added successfully!');</script>";
    } else {
        echo "<script>alert('Error adding job posting. Please try again.');</script>";
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Posting Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Create Job Posting</h1>

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
                </div>
              
       

                <div class="container py-4">
                    <div class="row">
                      <div class="col-md-12 form_sec_outer_task border">

                        <div class="row">
                          <div class="col-md-12 bg-light p-2 mb-3">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="row">
                                  <div class="col-md-6">
                                    <h4 class="frm_section_n">Qualifications for Hiring</h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <label>Qualifications</label>
                          </div>
                          
                        </div>
                        
                        <div class="col-md-12 p-0">
                          <div class="col-md-12 form_field_outer p-0">
                            <div class="row form_field_outer_row">

                              <div class="form-group col-md-6">
                                  <input type="text" class="form-control w_90 dynamic-input" name="qualifications[]" placeholder="Enter Qualifications" />
                              </div>
                             
                              <div class="form-group col-md-2 add_del_btn_outer">
                                <button class="btn_round add_node_btn_frm_field" title="Copy or clone this row">
                                  <i class="fas fa-copy"></i>
                                </button>

                                <button class="btn_round remove_node_btn_frm_field" disabled>
                                  <i class="fas fa-trash-alt"></i>
                                </button>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                     
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" name="add_job_posting">Submit</button>
        </form>

        <!-- Display posted job postings -->
        <?php
       

        // Query to get all job postings
        $sql = "SELECT * FROM job_posting";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<h3>Posted Job Postings:</h3>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='mt-3'>";
                echo "<h4>" . $row['campus_id'] . "</h4>";
                echo "<p>" . substr($row['dept_id'], 0, 100) . "...</p>";
                echo "<small>Category: " . $row['acad_role_id'] . "</small>";
                echo "<small>Category: " . $row['inst_role_id'] . "</small>";
                echo "<small>Category: " . $row['qualifications'] . "</small>";
                echo "<br><hr>";
                echo "</div>";
            }
        } else {
            echo "<p>No job postings found.</p>";
        }

        // Close connection
        mysqli_close($con);
        ?>
    </div>
</body>
</html>