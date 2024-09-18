<?php
include("../config/dbcon.php");
$user_id = $_POST['user_id'];
$new_status = $_POST['status'];

// Update the user's status
$query = "UPDATE user SET status = ? WHERE id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param('si', $new_status, $user_id);

if ($stmt->execute()) {
    // Redirect back to the admin interface
    header('Location: user_access.php');
} else {
    echo "Error updating record: " . $con->error;
}
?>