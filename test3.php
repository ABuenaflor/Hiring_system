<?php
// Include database connection
include ("config/dbcon.php");

// Authenticate login if approved or pending
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            // Start a session
            session_start();
            $_SESSION['user_id'] = $user['id']; // Set session variables

            // Redirect to employee.php
            header("Location: employee.php");
            exit(); // Important to stop further script execution
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid login or account not approved.";
    }
}
?>
