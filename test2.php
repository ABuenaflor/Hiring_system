<?php
// Include database connection
include ("config/dbcon.php");


// PROCESS TO APPROVE OR TO PENDING ACCOUNT 

//CODE PRESENT IN ACCOUNT_APPROVAL
//FOR DELETE

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = intval($_POST['emp_id']);

    // Approve account by updating status to 'active'
    $sql = "UPDATE emp_login SET status = 'active' WHERE emp_id = $user_id";

    if (mysqli_query($con, $sql)) {
        echo "Account approved!";
        // Optionally, notify the user via email that their account is approved
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
