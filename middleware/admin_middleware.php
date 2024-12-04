<?php
include("../functions/myFunctions.php");

if(isset($_SESSION['auth'])){

 
    if (!in_array($user_data['role_as'], [0, 1, 2])){
        redirect("../index.php","You have no access");
       
    }
    }else{
        redirect("../login.php","Log in to continue");
}
?>