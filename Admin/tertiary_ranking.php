<?php 
//session_start();
?>


<style>
.bold-text {
    font-weight: bold;
}
</style>
    
<body>
     <div class="wrapper">
          <?php include("includes/header.php") ?>
               <header class="cd__intro pt-5">
                    <h1> Faculty Ranking for Tertiary Level</h1>
                    <p> Criterias For Ranking Faculties in College Department</p>
               </header>

               <form action="tertiary_score.php" method="POST">

               <div class="container mt-5">
        <table class="table table-striped table-bordered">
       <thead class="table-dark">
                <tr>
                    <th>CRITERIA</th>
                    <th colspan="2">Credit Points</th>
                    <th colspan="3">SUMMARY OF POINTS</th>
                    
                </tr>
                <tr>
                    <th></th>
                    <th>In the Field</th>
                    <th>In Related Field</th>
                    <th>SR</th>
                    <th>DRC</th>                   
                    <th>CRTC</th>

                    
                </tr>
            </thead>

            <tbody>
    <?php
        // Retrieve emp_id from URL (query string)
        $emp_id = isset($_GET['emp_id']) ? (int)$_GET['emp_id'] : 0;

        // Fetch criteria data from tbl_criteria2
        $query = "SELECT * FROM tbl_criteria2";
        $result = mysqli_query($con, $query);

        // Array of criteria_id that need to have the input disabled
        $disabled_criteria_ids = [1, 4, 7, 11, 16, 22, 29, 34, 40, 47, 52, 53];

        while ($row = mysqli_fetch_assoc($result)):
            $cred_pts_id = $row['cred_pts_id'];
            $cred_pts_id2 = $row['cred_pts_id2'];

            // Fetch cred_pts from tbl_criteria_credpts (for cred_pts_id)
            $cred_pts = '';
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

            // Fetch cred_pts2 from tbl_criteria_credpts2 (for cred_pts_id2)
            $cred_pts2 = '';
            if ($cred_pts_id2 !== NULL) {
                $cred_pts2_query = "SELECT cred_pts2 FROM tbl_criteria_credpts2 WHERE cred_pts2_id = ?";
                $stmt = mysqli_prepare($con, $cred_pts2_query);
                mysqli_stmt_bind_param($stmt, "i", $cred_pts_id2);
                mysqli_stmt_execute($stmt);
                $cred_pts2_result = mysqli_stmt_get_result($stmt);
                if ($cred_pts2_row = mysqli_fetch_assoc($cred_pts2_result)) {
                    $cred_pts2 = $cred_pts2_row['cred_pts2'];
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
            <td class="bold-text"><?php echo $row['criteria_id']; ?>. <?php echo $row['criteria']; ?></td>
            <td><?php echo $cred_pts ? $cred_pts : ''; ?></td>
            <td><?php echo $cred_pts2 ? $cred_pts2 : ''; ?></td>
            <td>
                <?php if (in_array($row['criteria_id'], $disabled_criteria_ids) || $row['criteria_id'] == 61 || $row['criteria_id'] == 62): ?>
                    <!-- Display points as readonly if the criteria_id is in the disabled list -->
                    <input type="number" class="form-control input-field" name="educ_attain_sr[<?php echo $row['criteria_id']; ?>]" value="<?php echo $points; ?>" disabled>
                <?php else: ?>
                    <!-- Display points or input field for criteria_id not in the disabled list -->
                    <input type="text" class="form-control input-field" name="educ_attain_sr[<?php echo $row['criteria_id']; ?>]" value="<?php echo $points; ?>">
                <?php endif; ?>
            </td>   
            <td>
                <input type="number" name="src_score[<?php echo $criteria_id; ?>]" class="form-control">
            </td>
            <td>
                 <input type="number" name="crtc_score[<?php echo $criteria_id; ?>]" class="form-control">
            </td>
        </tr>
    <?php endwhile; ?>
</tbody>

        </table>
        <h2>LEGEND:</h2>
          <h3>SR</h3><p>Self Rating </p>
          <h3>SRC</h3><p>School Ranking Committee</p>
          <h3>CRTC</h3><p>College Ranking Committee</p>

          <button type="submit" class="btn btn-primary" name="submit_tertiary_sr">Submit Scores</button>
    </form>

    </div>

     </div>

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>