<?php 
session_start();

include("config/dbcon.php");
include("includes/emp-nav.php");

/* include("includes/header.php");
 */
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
                    <h1> Faculty Ranking for Tertiary Level</h1>
                    <p> Criterias For Ranking Faculties in Tertiary Level</p>
                    <h2>LEGEND:</h2>
                    <h3>SR: Self Rating </h3>
                </header>
                <form action="tertiary_sr.php" method="POST">
    <div class="container mt-5">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>CRITERIA</th>
                    <th colspan="2">CREDIT POINTS</th>
                    <th colspan="1">SUMMARY OF POINTS</th>
                </tr>
                <tr>
                    <th></th>
                    <th>IN THE FIELD</th>
                    <th>IN RELATED FIELD</th>
                    <th>Self Rating</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // Fetch data from tbl_criteria2

// Fetch data from tbl_criteria2
$query = "SELECT * FROM tbl_criteria2";
$result = mysqli_query($con, $query);

// Array of criteria_id that need to have the input disabled
$disabled_criteria_ids = [1, 13, 19, 25, 29, 40, 46, 48, 50, 51, 56, 61, 62, 68, 76, 77, 78, 79, 86, 92, 97, 101, 106, 111, 117, 123, 124, 131, 132, 133];

while ($row = mysqli_fetch_assoc($result)):
    $cred_pts_id = $row['cred_pts_id'];
    $cred_pts_id2 = $row['cred_pts_id2'];

    // Initialize variables for cred_pts and cred_pts2 as empty
    $cred_pts = '';
    $cred_pts2 = '';

    // Fetch cred_pts from tbl_criteria_credpts if cred_pts_id is not NULL
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

    // Fetch cred_pts2 from tbl_criteria_credpts2 if cred_pts_id2 is not NULL
    if ($cred_pts_id2 !== NULL) {
        $cred_pts_query2 = "SELECT cred_pts2 FROM tbl_criteria_credpts2 WHERE cred_pts2_id = ?";
        $stmt2 = mysqli_prepare($con, $cred_pts_query2);
        mysqli_stmt_bind_param($stmt2, "i", $cred_pts_id2);
        mysqli_stmt_execute($stmt2);
        $cred_pts_result2 = mysqli_stmt_get_result($stmt2);
        if ($cred_pts_row2 = mysqli_fetch_assoc($cred_pts_result2)) {
            $cred_pts2 = $cred_pts_row2['cred_pts2'];
        }
    }
?>
<tr>
    <td class="bold-text"><?php echo $row['criteria_id']; ?>. <?php echo $row['criteria']; ?></td>
    <td><?php echo $cred_pts ? $cred_pts : ''; ?></td>
    <td><?php echo $cred_pts2 ? $cred_pts2 : ''; ?></td>
                <td>
                    <?php if (in_array($row['criteria_id'], $disabled_criteria_ids) || $row['criteria_id'] == 61 || $row['criteria_id'] == 62): ?>
                        <!-- Disable input fields for specified criteria_ids (or Overall and Grand Total) -->
                        <input type="number" class="form-control input-field" name="educ_attain_sr[<?php echo $row['criteria_id']; ?>]" value="" disabled>
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