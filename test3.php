<?php
// Include database connection
include ("config/dbcon.php");


//authenticate login if approved or pending
//will direct to this page if ACTIVE ACC IS APPROVED

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Fetch user
    $sql = "SELECT * FROM emp_login WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && $user['status'] == 'active' && $password == $user['password']) {
        echo "Login successful!";
    } else {
        echo "Invalid login or account not approved.";
    }
}
?>
