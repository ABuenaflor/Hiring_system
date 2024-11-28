<?php
// Include database connection
include("config/dbcon.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data and escape inputs
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $job_role_id = mysqli_real_escape_string($con, $_POST['job_role_id']);
    $department_id = mysqli_real_escape_string($con, $_POST['department_id']);
    $campus_id = mysqli_real_escape_string($con, $_POST['campus_id']);
    $position_id = mysqli_real_escape_string($con, $_POST['position_id']); // Change to position_id

    // Debugging output (optional)
    // echo "Job Role ID: $job_role_id<br>";
    // echo "Department ID: $department_id<br>";
    // echo "Campus ID: $campus_id<br>";
    // echo "Position ID: $position_id<br>";

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the data into the database with 'pending' status
    $sql = "INSERT INTO emp_login (first_name, last_name, email, password, job_role_id, department_id, campus_id, position_id, status) 
            VALUES ('$first_name', '$last_name', '$email', '$hashed_password', '$job_role_id', '$department_id', '$campus_id', '$position_id', 'pending')";

    if (mysqli_query($con, $sql)) {
        // echo "Account request submitted. Please wait for admin approval.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account request submitted</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            width: 100vw;
            height: 100vh;
        }
        .outer-container{
            background-image: url('images/dwcl-bg.png');
            display: flex;
            justify-content: center;
            align-items: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
        }
        .container {
            background: white;
            border-radius: 15px;
            width: 400px;
            padding: 20px 30px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .outer-img-container{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .img-container {
            padding: 20px 25px;
            background-color: #103cbe;
            border-radius: 50%;
            border: 5px solid #103cbe;
            position: relative;
        }
        .img-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: conic-gradient(#103cbe 0% 0%, #2C8CB9 0% 100%);
            z-index: -1;
            transition: background 0.1s linear;
        }
        .icon {
            width: 120px;
            height: 120px;
        }
        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }
        footer {
            font-size: 12px;
            margin: 20px;
            margin-top: 40px;
        }
        @keyframes loading {
            0% {
                transform: rotate(0deg);
                border-color: #103cbe transparent transparent transparent;
            }
            100% {
                transform: rotate(360deg);
                border-color: #103cbe transparent transparent transparent;
            }
        }
        footer a{
            text-decoration: none;
            color: white;
            background-color: #103cbe;
            padding: 10px 100px;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <div class="outer-container">
        <div class="container">
            <div class="outer-img-container">
                <div class="img-container">
                    <img class="icon" src="images/dwcl-logo.png" alt="Mail Icon">
                </div>
            </div>
            <h2>Stay Tuned!</h2>
            <p>
                <?php echo "Account request submitted. Please wait for admin approval.";?>
            </p>
            <footer>
                <a href="login.php">CONFIRM</a>
            </footer>
        </div>
    </div>


    <script>
        const imgContainer = document.querySelector('.img-container');
        const totalTime = 9000;
        let currentProgress = 0;

        const interval = setInterval(() => {
            currentProgress += (100 / (totalTime / 10)); 
            if (currentProgress > 100) currentProgress = 100;
            const conicGradient = `conic-gradient(#103cbe 0% ${currentProgress}%, #f2f2f2 ${currentProgress}% 100%)`;
            imgContainer.style.setProperty('--progress', conicGradient);
            imgContainer.style.background = conicGradient;
            if (currentProgress >= 100) {
                clearInterval(interval);
                window.location.href = "emp_login.php"; 
            }
        }, 10); 
    </script>
</body>
</html>