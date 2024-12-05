<?php
<<<<<<< HEAD
    // include("../functions/myFunctions.php");

    // if(isset($_SESSION['auth'])){


    //     if($_SESSION['role_as'] != 1){
    //         redirect("../index.php","You have no access");

    //     }
    //     }else{
    //         redirect("../login.php","Log in to continue");
    // }
=======
include("../functions/myFunctions.php");

if(isset($_SESSION['auth'])){

 
    if (!in_array($user_data['role_as'], [0, 1, 2])){
        redirect("../index.php","You have no access");
       
    }
    }else{
        redirect("../login.php","Log in to continue");
}
>>>>>>> aae100743ea735e70b9de4086bfad082043d4f02
?>