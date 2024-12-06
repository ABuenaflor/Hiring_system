<?php
// At the beginning of the file, make sure to include the dbcon.php file
include("../config/dbcon.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    
    if ($id) {
        // Use the global $con variable from dbcon.php
        $query = "SELECT * FROM job_posting WHERE posting_id = '$id'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        
        if (mysqli_num_rows($result) > 0) {
            // Display form fields with existing data
            echo "<form method='POST'>";
            echo "<input type='hidden' name='posting_id' value='" . $row['posting_id'] . "'>";
            
            // Add other form fields here
            
            echo "<button type='submit' name='update_posting'>Update</button>";
            echo "</form>";
            
            // Add delete button
            echo "<form method='POST' action='edit_job_posting.php'>";
            echo "<input type='hidden' name='delete_posting' value='true'>";
            echo "<input type='hidden' name='posting_id' value='" . $row['posting_id'] . "'>";
            echo "<button type='submit' class='btn btn-danger'>Delete</button>";
            echo "</form>";
        } else {
            echo "No record found";
        }
    } else {
        echo "Invalid ID";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle update operation
    if (isset($_POST['update_posting'])) {
        // Update logic here
    }
    
    // Handle delete operation
    if (isset($_POST['delete_posting'])) {
        $id = $_POST['posting_id'];
        
        // Delete the record from the job_posting table
        $query = "DELETE FROM job_posting WHERE posting_id = '$id'";
        if (mysqli_query($con, $query)) {
            echo "Record deleted successfully";
            header("Location: job_posting.php");
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($con);
        }
    }
}
?>