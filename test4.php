<?php
// Include database connection
include ("config/dbcon.php");


//TEMPORARY CREATION OF LOGIN DETAILS
//WILL REDIRECT TO THIS PAGE IF ACCOUNT IS CREATED. 
//CONVERT INTO MODAL 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);

    // Generate temporary username and password
    $temp_username = strtolower($first_name[0] . $last_name . rand(1000, 9999));
    $temp_password = bin2hex(random_bytes(4)); // Generates a random 8 character password

    // Insert into database with 'pending' status
    $sql = "INSERT INTO emp_login (first_name, last_name, username, password, status) 
            VALUES ('$first_name', '$last_name', '$temp_username', '$temp_password', 'pending')";

    if (mysqli_query($con, $sql)) {
        // Notify admin (e.g., via email or admin dashboard)
        echo "Temporary account created. Please wait for admin approval.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>