<?php
// Connect to the database
include("config/dbcon.php");

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form submission
    $campus = $_POST['campus'];
    $department = $_POST['dept'];
    $acad_role = $_POST['acad_role'];
    $inst_role = $_POST['inst_role'];
    $qualifications = implode(', ', $_POST['qualifications']);

    // Update data in the job_posting table
    $sql = "UPDATE job_posting SET campus_id='$campus', dept_id='$department', category='$category' WHERE id='$id'";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Job posting updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating job posting. Please try again.');</script>";
    }

    // Delete data from the job_posting table
    $delete_sql = "DELETE FROM job_posting WHERE id='$id'";
    mysqli_query($con, $delete_sql);

    // Close connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiring and Ranking System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="display-4 mb-4">Hiring and Ranking System</h1>

        <!-- Display job postings -->
        <?php
        // Connect to the database

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Query to get all job postings
        $sql = "SELECT * FROM job_posting";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<div class='row'>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "
                    <div class='col-md-6 mb-4'>
                        <div class='card'>
                            <div class='card-header'>" . $row['title'] . "</div>
                            <div class='card-body'>" . substr($row['description'], 0, 150) . "...</div>
                            <ul class='list-unstyled mb-0'>
                                <li>Category: " . $row['category'] . "</li>
                                <li><a href='job_posting.php?id=" . $row['id'] . "' class='btn btn-sm btn-primary'>Edit</a></li>
                                <li><a href='#' onclick=\"return confirm('Are you sure you want to delete this job posting?')\" href='index.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger'>Delete</a></li>
                            </ul>
                        </div>
                    </div>
                ";
            }
            echo "</div>";
        } else {
            echo "<p>No job postings found.</p>";
        }

        // Close connection
        mysqli_close($con);
        ?>
    </div>
</body>
</html>