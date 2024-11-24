<?php
session_start();  // Start the session

// Unset all session variables to log out the user
session_unset();

// Destroy the session completely
session_destroy();

// Redirect to the login page (or any page you choose)
header("Location: emp_login.php");  // Adjust the URL to your login page if needed
exit();
?>
