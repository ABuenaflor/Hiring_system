<?php 
session_start();
include("../config/dbcon.php");
include_once("myFunctions.php");

// Registration Logic
if (isset($_POST["register_btn"])) {
    // Escape user inputs for security
    $name = mysqli_real_escape_string($con, $_POST['first_name']);
    $surname = mysqli_real_escape_string($con, $_POST['surname']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $role_as = isset($_POST['role_as']) ? (int)$_POST['role_as'] : 0; // Default to 0 (Applicant) if role not set

    // Check if the username already exists
    $check_user_query = "SELECT username FROM user WHERE username = ?";
    $stmt = mysqli_prepare($con, $check_user_query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        echo "<script>alert('Username is Already Taken'); window.location.href='../register.php';</script>";
    } else {
        // Prepare an insert statement
        $sql = "INSERT INTO user (first_name, last_name, username, password, role_as) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi", $name, $surname, $username, $password, $role_as);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Account Created Successfully'); window.location.href='../login.php';</script>";
        } else {
            $_SESSION['message'] = "User registration unsuccessful.";
            header('Location: ../register.php');  
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}

// Login Logic
if (isset($_POST['login_btn'])) {
    // Escape user inputs
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Constructing the query to check username, password, and status
    $login_query = "SELECT * FROM user WHERE username=? AND password=?";
    $stmt = mysqli_prepare($con, $login_query);
    
    // Binding parameters to prevent SQL injection
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);

    // Executing the prepared statement
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $userdata = mysqli_fetch_array($result);

        // Check if the account is disabled
        if ($userdata['status'] === 'disabled') {
            echo "<script>alert('Your account is disabled. Please contact the administrator.'); window.location.href='../login.php';</script>";
            exit;
        }

        // If the account is enabled, proceed with authentication
        $_SESSION['auth'] = true; // Mark the user as authenticated
        $_SESSION['user_id'] = $userdata['id']; // Store the user ID
        $_SESSION['auth_user'] = ['username' => $userdata['username']]; // Store username
        $_SESSION['role_as'] = $userdata['role_as']; // Store role

        // Redirect based on the user's role
        if ($_SESSION['role_as'] == 0) {
            $_SESSION['message'] = 'Logged in Successfully as Applicant';
            header('Location: ../index.php'); // Redirect to Applicant page
        } elseif ($_SESSION['role_as'] == 1) {
            $_SESSION['message'] = 'Welcome to Admin Dashboard';
            header('Location: ../admin/index.php'); // Redirect to Admin dashboard
        } elseif ($_SESSION['role_as'] == 2) {
            $_SESSION['message'] = 'Logged in Successfully as Employee';
            header('Location: ../emp_sr.php'); // Redirect to Employee page
        } else {
            $_SESSION['message'] = "Invalid role";
            header('Location: ../login.php');
        }
        exit;
    } else {
        $_SESSION['message'] = "Invalid username or password";
        header('Location: ../login.php');
        exit;
    }
}

?>
