<?php
// Include database connection
include ("../config/dbcon.php");

// Fetch all pending accounts

//DISPLAYED IN ADMIN, ADMIN VIEW

$sql = "SELECT * FROM emp_login WHERE status = 'pending'";
$result = mysqli_query($con, $sql);

/* echo "<h2>Pending Account Approvals</h2>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>User: " . $row['first_name'] . " " . $row['last_name'] . " | Username: " . $row['username'] . "</p>";
    echo "<form action='test2.php' method='POST'>";
    echo "<input type='hidden' name='emp_id' value='" . $row['emp_id'] . "'>";
    echo "<input type='submit' value='Approve'>";
    echo "</form><hr>";
} */



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <?php
            include("includes/header.php");
        ?>
        <div class="container">
        <title>Approved Employee Accounts</title>
<header class="cd__intro pt-5">
    <h1> Approved Employee Accounts</h1>
    <p>Accounts for Faculty Ranking Self Rating</p>
</header>

<table  id="example2" class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Username</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $user_query = "SELECT * FROM emp_login WHERE status='pending'";
        $user = mysqli_query($con, $user_query);

        $total_query = "SELECT COUNT(*) FROM emp_login WHERE status='pending'";
        $total_result = mysqli_query($con, $total_query);
        $total_applicants = mysqli_fetch_array($total_result)[0];
        $total_pages = ceil($total_applicants);

        if (mysqli_num_rows($user) > 0) {
            foreach ($user as $item) {
                ?>
                <tr class="app-row">
                    <td class="app-row"><?= $item['emp_id']; ?></td>
                    <td class="app-row"><?= $item['first_name']; ?></td>
                    <td class="app-row"><?= $item['last_name']; ?></td>
                    <td class="app-row"><?= $item['username']; ?></td>
                    <td class="app-row"><?= $item['status']; ?></td>
                    <td class="app-row" style="display: flex; justify-content: center; align-items: center;">
                        <form action="account_approval.php" method="POST">
                            <input type="hidden" name="emp_id" value="<?= $item['emp_id']; ?>">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to approve this account?')">Approve</button>
                        </form>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='6'>No pending accounts</td></tr>";
        }
        ?>
    </tbody>
</table>
        </div>
    </div>
</body>
</html>