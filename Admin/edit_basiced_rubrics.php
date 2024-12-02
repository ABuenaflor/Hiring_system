<?php 
//session_start();
/* include("includes/header.php"); 
 */include("../middleware/admin_middleware.php"); 

 function getBasicEdScores($con) {
     $query = "SELECT * FROM basic_ed_score";
     $result = mysqli_query($con, $query);
     
     if ($result && mysqli_num_rows($result) > 0) {
         return mysqli_fetch_assoc($result);
     }
     
     return null;
 }
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
         <h1> Edit Faculty Ranking for Basic Education</h1>
         <p> Edit Criterias For Ranking Faculties in Basic Education</p>
      </header>

      <div class="container">

      <?php
       $scores = getBasicEdScores($con);

       if (!$scores) {
           echo "<p>No scores found in the database.</p>";
       } else {
           }
     ?>

<form action="code.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $scores['id']; ?>">

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
                // Fetch all criteria along with weight and credit points
                $query = "SELECT c.criteria_id, c.criteria, c.weight_id, c.cred_pts_id, 
                          w.weight, cp.cred_pts 
                          FROM tbl_criteria c
                          LEFT JOIN tbl_weights w ON c.weight_id = w.weight_id
                          LEFT JOIN tbl_criteria_credpts cp ON c.cred_pts_id = cp.cred_pts_id";
                $result = mysqli_query($con, $query);

                while ($row = mysqli_fetch_assoc($result)):
                ?>
                    <tr>
                         <td>
                            <input type="text" class="form-control" name="criteria[<?php echo $row['criteria_id']; ?>]" value="<?php echo htmlspecialchars($row['criteria']); ?>">
                         </td>

                        <td>
                            <!-- Display weight as disabled -->
                            <input type="text" class="form-control" value="<?php echo $row['weight']; ?>" disabled>
                            <input type="hidden" name="weight_id[<?php echo $row['criteria_id']; ?>]" value="<?php echo $row['weight_id']; ?>">
                        </td>
                        <td>
                            <!-- Display credit points as disabled -->
                            <input type="text" class="form-control" value="<?php echo $row['cred_pts']; ?>" disabled>
                            <input type="hidden" name="cred_pts_id[<?php echo $row['criteria_id']; ?>]" value="<?php echo $row['cred_pts_id']; ?>">
                        </td>
                        <td>
                            <!-- Editable input for SR -->
                            <input type="text" class="form-control" name="sr_points[<?php echo $row['criteria_id']; ?>]" value="" disabled>
                        </td>
                        <td>
                            <!-- Editable input for DRC -->
                            <input type="text" class="form-control" name="drc_points[<?php echo $row['criteria_id']; ?>]" value="" disabled>
                        </td>
                        <td>
                            <!-- Editable input for BERTC -->
                            <input type="text" class="form-control" name="bertc_points[<?php echo $row['criteria_id']; ?>]" value="" disabled>
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

    <button type="submit" class="btn btn-primary" name="update_basiced_rubrics">Update Scores</button>
</form>

   
           
      </div>
     </div>
     

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>