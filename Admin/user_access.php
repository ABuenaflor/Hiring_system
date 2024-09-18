<?php
ob_start();  // Start output buffering

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../config/dbcon.php");

// Fetch all users
$query = "SELECT id, username, status FROM user";
$result = $con->query($query);

if (!$result) {
    die("Query failed: " . $con->error); // Display query errors
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User Accounts</title>
</head>

<body>
    <div class="wrapper">
        <?php include("includes/header.php"); ?>
        <div class="container">
            <h2>Manage User Accounts</h2>

            <?php if ($result->num_rows > 0) { ?>
                <table border="1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
    // Fetch all users
    $query = "SELECT id, username, status FROM user";
    $result = mysqli_query($con, $query);
    
    // Check for the total number of users
    $total_query = "SELECT COUNT(*) FROM user";
    $total_result = mysqli_query($con, $total_query);
    $total_users = mysqli_fetch_array($total_result)[0];  // Get the count of users
    $total_pages = ceil($total_users);  // Calculate total pages if necessary

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {
    ?>
            <tr>
                <td><?php echo htmlspecialchars($row['username']); ?></td>
                <td><?php echo htmlspecialchars($row['status']); ?></td>
                <td>
                    <form action="change_user_access.php" method="POST">
                        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                        <input type="hidden" name="status" value="<?php echo ($row['status'] == 'enabled') ? 'disabled' : 'enabled'; ?>">
                        <button type="submit" class="btn btn-primary">
                            <?php echo ($row['status'] == 'enabled') ? 'Disable' : 'Enable'; ?>
                        </button>
                    </form>
                </td>
            </tr>
    <?php
        }
    } else {
        echo "<tr><td colspan='3'>No users found.</td></tr>";
    }
    ?>
</tbody>
            <?php } else { ?>
                <p>No users found.</p>
            <?php } ?>
        </div>
    </div>
</body>
</html>

<?php
ob_end_flush();  // Flush output buffering
?>
