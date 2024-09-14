<?php 
//session_start();
//include("includes/header.php"); placed inside wrapper
include("../middleware/admin_middleware.php"); 

if (isset($_GET['notif_id'])) {
    $id = $_GET['notif_id'];

    // Mark the notification as read
    $sql = "UPDATE notifications SET is_read = 1 WHERE notif_id = $id";
    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Check');</script>";  
        header("Location: includes/navbar.php");
    } else {
        echo "Error updating record: " . $con->error;
    }
}
?>

