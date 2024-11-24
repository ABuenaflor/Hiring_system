<?php
session_start();
include("config/dbcon.php");

// Assuming the user is logged in and their emp_id is stored in the session
$emp_id = $_SESSION['emp_id']; // You should set this on login

if (isset($_POST['submit_basic_ed_sr'])) {
    // Loop through the submitted data for each criteria
    foreach ($_POST['educ_attain_sr'] as $criteria_id => $points) {
        // Check if the points are provided for the criteria
        if ($points !== null && $points !== '') {
            // Default sop_id is 1, as per your requirement
            $sop_id = 1;

            // Insert into tbl_basic_ed_score
            $query = "INSERT INTO tbl_basic_ed_score (emp_id, criteria_id, sop_id, points) 
                      VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "iiii", $emp_id, $criteria_id, $sop_id, $points);
            mysqli_stmt_execute($stmt);
        }
    }

    // After processing, redirect to a success page or show a success message
    $_SESSION['message'] = "Scores submitted successfully.";
    header("Location: basic_ed_success.php");
    exit();
}
?>
