<?php 
session_start();

include("config/dbcon.php");
/* include("includes/header.php");
 */
include("includes/emp-nav.php");

$emp_login = mysqli_query($con, "SELECT * FROM emp_login WHERE first_name = '".$_SESSION['first_name']."' ");
$emp_data = mysqli_fetch_array($emp_login);

?>

<link rel="stylesheet" href="assets/css/style.css">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" >

<!-- alertify CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
<!-- Bootstrap CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" >

<!-- alertify CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>


<head>
    
</head>
    <style>
      .form-control input-field{
        border: 1px solid #b3a1a1 !important;
        padding: 8px 10px;
      }
      .bold-text {
    font-weight: bold;
}
    </style>
<body>
    <div class="container mt-5">
            <?php if(isset($_SESSION['message']))
                {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?=$_SESSION['message']; ?>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="false">&times;</span>
                        </button>
                    </div>
                <?php
                unset($_SESSION['message']);
                }
            ?>
             <div class="wrapper">
                <header class="cd__intro pt-5">
                    <h1> Faculty Ranking for Basic Education</h1>
                    <p> Criterias For Ranking Faculties in Basic Education</p>
                    <h2>LEGEND:</h2>
                    <h3>SR: Self Rating </h3>
                </header>
        <div class="row-mb-3">
    <div class="col-md-4">
        <label for="department" class="form-label">First Name</label>
        <input class="form-control" type="text" name="first_name" value="<?php echo $emp_data['first_name'] ?>" placeholder="Enter your First Name"><br>
    </div>
    
    <div class="col-md-4">
        <label for="department" class="form-label">Last Name</label>
        <input class="form-control" type="text" name="last_name" value="<?php echo $emp_data['last_name'] ?>" placeholder="Enter your Last Name"> <br>
    </div>
    
    <div class="col-md-4">
        <label for="department" class="form-label">Email</label>
        <input class="form-control" type="email" name="email" value="<?php echo $emp_data['email'] ?>" placeholder="Enter your Email">
    </div>
</div>
<div class="row-mb-3">
    <div class="col-md-4">
        <label for="department" class="form-label">Department</label>
        <select class="form-select" name="department" id="">
            <?php
                $department = mysqli_query($con, "SELECT dept_name FROM department");
                while ($d = mysqli_fetch_array($department)){
            ?>
            <option value="<?php echo $d['dept_name']?>" <?php if($d['dept_name'] == $emp_data['department_id']) echo 'selected'; ?>><?php echo $d['dept_name']?></option>
            <?php } ?>
        </select>
    </div>
    
    <div class="col-md-4">
        <label for="campus" class="form-label">Campus</label> <br>
        <select class="form-select" name="campus" id="">
            <?php
                $campus = mysqli_query($con, "SELECT campus_name FROM campus");
                while ($c = mysqli_fetch_array($campus)){
            ?>
            <option value="<?php echo $c['campus_name']?>" <?php if($c['campus_name'] == $emp_data['campus_id']) echo 'selected'; ?>><?php echo $c['campus_name']?></option>
            <?php } ?>
        </select>
    </div>

    <div class="col-md-6">
    <label  class="form-label">Position</label> 
    <select class="form-select" name="position" id="">
        <?php
            $position = mysqli_query($con, "SELECT position_name FROM position");
            while ($p = mysqli_fetch_array($position)){
        ?>
        <option value="<?php echo $p['position_name']?>" <?php if($p['position_name'] == $emp_data['position_id']) echo 'selected'; ?>><?php echo $p['position_name']?></option>
        <?php } ?>
    </select>
</div>
<form action="basic_ed_function.php" method="POST">
    <div class="container mt-5">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>CRITERIA</th>
                    <th colspan="2">WEIGHT</th>
                    <th colspan="1">SUMMARY OF POINTS</th>
                </tr>
                <tr>
                    <th></th>
                    <th>%</th>
                    <th>Criteria Credit Points</th>
                    <th>Self Rating</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // Fetch data from tbl_criteria
            $query = "SELECT * FROM tbl_criteria";
            $result = mysqli_query($con, $query);
            
            // Array of criteria_id that need to have the input disabled
            $disabled_criteria_ids = [1, 4, 7, 11, 16, 22, 29, 34, 40, 47, 52, 53];

            while ($row = mysqli_fetch_assoc($result)):
                $weight_id = $row['weight_id'];
                $cred_pts_id = $row['cred_pts_id'];

                // Fetch weight and cred_pts as before
                $weight = ''; $cred_pts = '';
                if ($weight_id !== NULL) {
                    $weight_query = "SELECT weight FROM tbl_weights WHERE weight_id = ?";
                    $stmt = mysqli_prepare($con, $weight_query);
                    mysqli_stmt_bind_param($stmt, "i", $weight_id);
                    mysqli_stmt_execute($stmt);
                    $weight_result = mysqli_stmt_get_result($stmt);
                    if ($weight_row = mysqli_fetch_assoc($weight_result)) {
                        $weight = $weight_row['weight'];
                    }
                }
                if ($cred_pts_id !== NULL) {
                    $cred_pts_query = "SELECT cred_pts FROM tbl_criteria_credpts WHERE cred_pts_id = ?";
                    $stmt = mysqli_prepare($con, $cred_pts_query);
                    mysqli_stmt_bind_param($stmt, "i", $cred_pts_id);
                    mysqli_stmt_execute($stmt);
                    $cred_pts_result = mysqli_stmt_get_result($stmt);
                    if ($cred_pts_row = mysqli_fetch_assoc($cred_pts_result)) {
                        $cred_pts = $cred_pts_row['cred_pts'];
                    }
                }
            ?>
            <tr>
                <td class="bold-text"><?php echo $row['criteria_id']; ?>. <?php echo $row['criteria']; ?></td>
                <td><?php echo $weight ? $weight : ''; ?></td>
                <td><?php echo $cred_pts ? $cred_pts : ''; ?></td>
                <td>
                    <?php if (in_array($row['criteria_id'], $disabled_criteria_ids) || $row['criteria_id'] == 61 || $row['criteria_id'] == 62): ?>
                        <!-- Disable input fields for specified criteria_ids (or Overall and Grand Total) -->
                        <input type="number" class="form-control input-field" name="educ_attain_sr[<?php echo $row['criteria_id']; ?>]" value="0" disabled>
                    <?php else: ?>
                        <!-- Display input field if criteria_id is not in the disabled list -->
                        <input type="number" class="form-control input-field" name="educ_attain_sr[<?php echo $row['criteria_id']; ?>]" min="0" step="1">
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <button type="submit" class="btn btn-primary" name="submit_basic_ed_sr">Submit Scores</button>
</form>

   </div>
    
   <script>
        function calculateGrandTotal() {
           var inputs = document.querySelectorAll('.input-field');
           var total = 0;
            
           inputs.forEach(function(input) {
               if (!isNaN(parseFloat(input.value))) {
                    total += parseFloat(input.value);
                }
           });
            
           document.getElementById('grand_total').value = total.toFixed(2);
        }

        // Add event listeners to all input fields
        var inputs = document.querySelectorAll('.input-field');
        inputs.forEach(function(input) {
            input.addEventListener('change', calculateGrandTotal);
        });
    </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            
    </div>
</body>