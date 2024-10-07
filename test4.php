<?php
// Include database connection
include("config/dbcon.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data and escape inputs
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $job_role_id = mysqli_real_escape_string($con, $_POST['job_role_id']);
    $department_id = mysqli_real_escape_string($con, $_POST['department_id']);
    $campus_id = mysqli_real_escape_string($con, $_POST['campus_id']);
    $position_id = mysqli_real_escape_string($con, $_POST['position_id']); // Change to position_id

    // Debugging output (optional)
    echo "Job Role ID: $job_role_id<br>";
    echo "Department ID: $department_id<br>";
    echo "Campus ID: $campus_id<br>";
    echo "Position ID: $position_id<br>";

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the data into the database with 'pending' status
    $sql = "INSERT INTO emp_login (first_name, last_name, email, password, job_role_id, department_id, campus_id, position_id, status) 
            VALUES ('$first_name', '$last_name', '$email', '$hashed_password', '$job_role_id', '$department_id', '$campus_id', '$position_id', 'pending')";

    if (mysqli_query($con, $sql)) {
        echo "Account request submitted. Please wait for admin approval.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}


?>
