<?php
// Start the session
session_start();

// Check if the user is logged in (optional)
if (!isset($_SESSION['emp_id'])) {
    // Redirect to login page if not logged in
    header("Location: emp_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Page</title>

    <!-- Bootstrap CSS (Optional, you can modify as needed) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Custom Styles (Optional) -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .success-container {
            background-color: #28a745;
            color: white;
            padding: 20px 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .success-container h2 {
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .success-container p {
            font-size: 1.1rem;
        }

        .redirect-text {
            margin-top: 20px;
            font-size: 1rem;
        }

        .redirect-text a {
            color: #ffffff;
            text-decoration: underline;
        }
    </style>

    <!-- JavaScript for redirection -->
    <script>
        // Function to redirect to employee.php after 3 seconds
        setTimeout(function() {
            window.location.href = "employee2.php"; // Change to the page you want to redirect to
        }, 3000); // 3 seconds
    </script>
</head>
<body>

    <!-- Success Message Container -->
    <div class="success-container">
        <h2>Success!</h2>
        <p>Your action was completed successfully.</p>
        <div class="redirect-text">
            <p>You will be redirected to the employee page shortly.</p>
            <p>If you are not redirected, <a href="employee.php">click here</a>.</p>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
