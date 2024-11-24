<?php
// Include database connection
include "../config/dbcon.php";

// session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data
    $emp_id = intval($_POST['emp_id']);

    // Update the status in the database
    $update_query = "UPDATE emp_login SET status = 'active' WHERE emp_id = '$emp_id'";
    $update_result = mysqli_query($con, $update_query);
    
    if ($update_result) {
        // If successful, redirect to the approval page
        echo "<script>alert('Account approved successfully');</script>";
        header("Location: approve_accounts.php");
        exit();
    } else {
        echo "Error updating account status";
    }
}
?>