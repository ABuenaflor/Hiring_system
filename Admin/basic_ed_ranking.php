<?php 
//session_start();
/* include("includes/header.php"); 
 */include("../middleware/admin_middleware.php"); 


?>

<style>
.bold-text {
    font-weight: bold;
}
</style>
    
<body>

     <div class="wrapper">
          <?php 
               include("includes/header.php");
          ?>

<header class="cd__intro pt-5">
         <h1> Faculty Ranking for Basic Education</h1>
         <p> Criterias For Ranking Faculties in Basic Education</p>
      </header>
      
      <a href="edit_basiced_rubrics.php" class="btn btn-primary">Edit Rubrics</a>

      <div class="container">

      <?php

     ?>

<form action="basic_ed_score.php" method="POST">

    <div class="container mt-5">
        <table class="table table-striped table-bordered">
       <thead class="table-dark">
                <tr>
                    <th>CRITERIA</th>
                    <th colspan="2">WEIGHT</th>
                    <th colspan="3">SUMMARY OF POINTS</th>
                    
                </tr>
                <tr>
                    <th></th>
                    <th>%</th>
                    <th>Criteria Credit Points</th>
                    <th>SR</th>
                    <th>DRC</th>                   
                    <th>BERTC</th>

                    
                </tr>
            </thead>
            <tbody>
    <?php
        // Retrieve emp_id from URL (query string)
        $emp_id = isset($_GET['emp_id']) ? (int)$_GET['emp_id'] : 0;

        // Fetch criteria data from tbl_criteria
        $query = "SELECT * FROM tbl_criteria";
        $result = mysqli_query($con, $query);

        // Array of criteria_id that need to have the input disabled
        // $disabled_criteria_ids = [1, 4, 7, 11, 16, 22, 29, 34, 40, 47, 52, 53];
        $disabled_criteria_ids = range(1, 62); // Creates an array from 1 to 62


        while ($row = mysqli_fetch_assoc($result)):
            $weight_id = $row['weight_id'];
            $cred_pts_id = $row['cred_pts_id'];

            // Fetch weight and cred_pts as before
            $weight = ''; 
            $cred_pts = '';

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

            // Fetch points from tbl_basic_ed_score based on criteria_id and emp_id
            $criteria_id = $row['criteria_id'];
            $points = 0;  // Default value for points

            // Query to get points for the current criteria_id and emp_id
            $points_query = "SELECT points FROM tbl_basic_ed_score WHERE criteria_id = ? AND sop_id = ? AND emp_id = ?";
            $stmt = mysqli_prepare($con, $points_query);
            
            // Use the emp_id retrieved from URL and set sop_id as needed
            $sop_id = 1;  // Example sop_id (replace with dynamic value if needed)
            
            mysqli_stmt_bind_param($stmt, "iii", $criteria_id, $sop_id, $emp_id);  // Bind parameters
            mysqli_stmt_execute($stmt);
            $points_result = mysqli_stmt_get_result($stmt);

            // Check if a row was returned and get the points value
            if ($points_row = mysqli_fetch_assoc($points_result)) {
                $points = $points_row['points'];
            }
    ?>
        <tr>
            <input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">
            <td class="bold-text"><?php echo $row['criteria_id']; ?>. <?php echo $row['criteria']; ?></td>
            <td><?php echo $weight ? $weight : ''; ?></td>
            <td><?php echo $cred_pts ? $cred_pts : ''; ?></td>
            <td>
                <?php if (in_array($row['criteria_id'], $disabled_criteria_ids) || $row['criteria_id'] == 61 || $row['criteria_id'] == 62): ?>
                    <!-- Display points as readonly if the criteria_id is in the disabled list -->
                    <input type="text" class="form-control input-field" name="educ_attain_sr[<?php echo $row['criteria_id']; ?>]" value="<?php echo $points; ?>" disabled>
                <?php else: ?>
                    <!-- Display points or input field for criteria_id not in the disabled list -->
                    <input type="text" class="form-control input-field" name="educ_attain_sr[<?php echo $row['criteria_id']; ?>]" value="<?php echo $points; ?>">
                <?php endif; ?>
            </td>
            <td>
                <!-- Input field for drc_points with dynamic value and name -->
                <input type="text" class="form-control" name="drc_points[<?php echo $row['criteria_id']; ?>]">
            </td>
            <td>
                <!-- Input field for bertc_points with dynamic value and name -->
                <input type="text" class="form-control" name="bertc_points[<?php echo $row['criteria_id']; ?>]">
            </td>

        </tr>
    <?php endwhile; ?>
      
</tbody>

        </table>
        
        <h2>LEGEND:</h2>
          <h3>SR</h3><p>Self Rating </p>
          <h3>DRC</h3><p>Department Ranking Committee</p>
          <h3>BERTC</h3><p>Basic Education Rank and Tenure Council</p>
    </div>

    <button class="btn btn-primary" name="submit_basic_ed_score">Submit Scores</button>
    </form>
   
           
      </div>
     </div>
     

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>