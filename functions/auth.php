<?php 
session_start();
include("../config/dbcon.php");
include("myFunctions.php");


if(isset($_POST["register_btn"])){

$name=mysqli_real_escape_string ($con,$_POST['first_name']);
$surname=mysqli_real_escape_string ($con,$_POST['surname']);
$username=mysqli_real_escape_string ($con,$_POST['username']);
$password=mysqli_real_escape_string ($con,$_POST['password']);

$sql = "INSERT INTO user (first_name, last_name, username, password) VALUES ('$name','$surname','$username','$password')";
$sql_run = mysqli_query ($con, $sql);

// Check if the query was successful
if($sql_run){
    // Now check if the username already exists
    $check_user_query = "SELECT username FROM user WHERE username='$username'";
    $check_user_query_run = mysqli_query( $con, $check_user_query);
    
    if(mysqli_num_rows($check_user_query_run) > 0){
        $_SESSION['message'] = "Username already taken.";
        header("Location: ../register.php");
    }else{
        // User registration successful, set success flag and message
        $_SESSION['success'] = true;
        $_SESSION['message'] = "Account created successfully!";
        
        // Redirect to login page after 2 seconds
        header("Refresh:2; URL=login.php");
    }
} else{
    $_SESSION['message'] = "User registered unsuccessfully.";
    header('Location: ../register.php');    
}
}
else if(isset($_POST['login_btn'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Constructing the query
    $login_query = "SELECT * FROM user WHERE username=? AND password=?";
    $stmt = mysqli_prepare($con, $login_query);

    // Binding parameters to prevent SQL injection
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);

    // Executing the prepared statement
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($result);
        $username = $userdata['username'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = ['username' => $username];
        $_SESSION['role_as'] = $role_as;

        // Redirecting based on the user's role
        if($role_as == 1){
            $_SESSION['message'] = 'Welcome to dashboard';
            header('Location: ../admin/index.php');
            exit; // Ensuring no further script execution
        } else {
            $_SESSION['message'] = 'Logged in Successfully';
            header('Location: ../index.php');
            exit; // Ensuring no further script execution
        }
    } else {
        $_SESSION['message'] = "Invalid username or password";
        header('Location: ../login.php');
        exit; // Ensuring no further script execution
    }
}
?>