<?php
    $host="localhost";
    $username = "root";
    $password = "";
    $database="hiring";

    $con = mysqli_connect($host, $username, $password, $database);

    if (!$con){
        die("Connection error". mysqli_connect_error());
    }
?>