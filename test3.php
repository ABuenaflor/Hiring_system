<?php
session_start(); // Start the session to access session variables

// Include database connection
include("config/dbcon.php");

// Authenticate login if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize user input
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Fetch user by email
    $sql = "SELECT * FROM emp_login WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);

    // Check if user exists and is active
    if ($user && $user['status'] == 'active') {
        // Verify the password using password_verify()
        if (password_verify($password, $user['password'])) {
            // Set session variables upon successful login
            $_SESSION['emp_id'] = $user['emp_id']; // Set emp_id in session
            $_SESSION['first_name'] = $user['first_name']; // Set first_name in session
            $_SESSION['email'] = $user['email']; // Set email in session
            $_SESSION['campus_id'] = $user['campus_id']; // Set campus_id in session

            // Redirect based on campus_id
            if ($user['campus_id'] == '1') {
                header("Location: employee.php"); // Redirect to employee.php for campus 1
            } elseif ($user['campus_id'] == '2') {
                header("Location: employee2.php"); // Redirect to employee2.php for campus 2
            } else {
                echo "Invalid campus ID.";
            }
            exit(); // Stop further script execution after redirect
        } else {
            // Invalid password
            $_SESSION['message'] = "Invalid password.";
            header("Location: emp_login.php"); // Redirect back to the login page with error message
            exit();
        }
    } else {
        // Invalid login or account not approved
        $_SESSION['message'] = "Invalid login or account not approved.";
        header("Location: emp_login.php"); // Redirect back to login page with error message
        exit();
    }
}
?>
