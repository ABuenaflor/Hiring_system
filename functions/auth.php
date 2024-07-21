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
        $_SESSION['message'] = "User registered successfully.";
        header('Location: login.php');
    }
    } else{
        $_SESSION['message'] = "User registered unsuccessfully.";
        header('Location: ../register.php');    
    }
}
else if(isset($_POST['login_btn'])){
    $username = mysqli_real_escape_string ($con,$_POST['username']);
    $password = mysqli_real_escape_string ($con,$_POST['password']);

    $login_query = "SELECT * FROM user WHERE username='$username' AND password='$password' ";
    $login_query_run = mysqli_query( $con, $login_query);  

    if(mysqli_num_rows($login_query_run) > 0){
        $_SESSION['auth']=true;

        $userdata = mysqli_fetch_array($login_query_run);
        $username = $userdata['username'];
        $role_as = $userdata['role_as'];


        $_SESSION['auth_user'] = [
            'username' =>$username
        ];

        $_SESSION['role_as'] = $role_as;
        if($role_as == 1){
            $_SESSION['message'] = 'Welcome to dashboard'; 
            header('Location: ../admin/index.php');

        }else{
            $_SESSION['message'] = 'Logged in Succesfully'; 
            header('Location: ../index.php');
    
        }
        }

       else{
        $_SESSION['message'] = "Invalid username or password";
        header('Location: ../login.php');
    }
    }
?>