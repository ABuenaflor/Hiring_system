<?php
session_start();

// Ensure the user is logged in before logging out
if (isset($_SESSION['auth']) || isset($_SESSION['user_id'])) {
    // Unset all session variables
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    unset($_SESSION['user_id']); // Unset the employee ID session as well
    session_destroy(); // Destroy the session completely

    // Set a logout message
    $_SESSION['message'] = 'Logged out successfully';

    // Redirect based on session information
    if (isset($_SESSION['user_id'])) {
        // Redirect to employee login page if logged in as an employee
        header("Location: emp_login.php");
    } else {
        // Redirect to regular login page if logged in as a general user
        header("Location: login.php");
    }

    // Stop script execution after the redirect
    exit();
} else {
    // If no session is found, redirect to login page
    header("Location: login.php");
    exit();
}
?>
