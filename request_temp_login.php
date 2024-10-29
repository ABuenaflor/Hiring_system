<?php 
// Fetch job roles
include("config/dbcon.php");

$roles_query = "SELECT job_id, job_role FROM job_roles";
$roles_result = mysqli_query($con, $roles_query);

// Fetch departments
$departments_query = "SELECT dept_id, dept_name FROM department";
$departments_result = mysqli_query($con, $departments_query);

// Fetch campuses
$campus_query = "SELECT campus_id, campus_name FROM campus";
$campus_result = mysqli_query($con, $campus_query);

// Fetch positions
$position_query = "SELECT position_id, position_name FROM position";
$position_result = mysqli_query($con, $position_query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temporary Account Request</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('images/dwcl-bg.png') no-repeat center center fixed; 
            background-size: cover;
        }
        .box-area {
            width: 100%;
            max-width: 900px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 30px;
        }
        .left-box {
            padding: 20px;
        }
        .form-control {
            border: 1px solid #b3a1a1 !important;
            padding: 12px;
            margin-bottom: 15px;
        }
        .header-text h2 {
            font-size: 1.5rem;
            color: #333;
        }
        .header-text p {
            font-size: 1rem;
            color: #666;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-size: 1rem;
            padding: 10px 15px;
        }
        .flex-row {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }
        .flex-item {
            flex: 2;
            min-width: 200px;
        }
    </style>
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 box-area shadow-lg">
            <div class="col-md-12 left-box">
                
                <form action="test4.php" method="POST">
                    <div class="header-text mb-4 text-center">
                        <h2>Register Employee </h2>
                        <p>Please fill in the form to submit your account request</p>
                    </div>
                    
                    <!-- Three Inputs: First Name, Last Name, Email -->
                    <div class="flex-row">
                        <div class="form-group flex-item">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control form-control-lg bg-light fs-6" id="first_name" name="first_name" placeholder="Enter your first name" required>
                        </div>
                        <div class="form-group flex-item">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control form-control-lg bg-light fs-6" id="last_name" name="last_name" placeholder="Enter your last name" required>
                        </div>
                     
                    </div>
                    <div class="flex-row">
                    <div class="form-group flex-item">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control form-control-lg bg-light fs-6" id="email" name="email" placeholder="Enter your email address" required>
                        </div>
                        <div class="form-group flex-item">
                            <label for="password">Password</label>
                            <input type="password" class="form-control form-control-lg bg-light fs-6" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                    </div>
                    <!-- Three Inputs: Password, Job Role, Department -->
                    <div class="flex-row">
                     
                        <div class="form-group flex-item">
                            <label for="job_role_id">Job Role</label>
                            <select class="form-control form-control-lg bg-light fs-6" id="job_role_id" name="job_role_id" required>
                                <option value="">Select Job Role</option>
                                <?php while ($role = mysqli_fetch_assoc($roles_result)) : ?>
                                    <option value="<?= $role['job_id']; ?>"><?= $role['job_role']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group flex-item">
                            <label for="department_id">Department</label>
                            <select class="form-control form-control-lg bg-light fs-6" id="department_id" name="department_id" required>
                                <option value="">Select Department</option>
                                <?php while ($department = mysqli_fetch_assoc($departments_result)) : ?>
                                    <option value="<?= $department['dept_id']; ?>"><?= $department['dept_name']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Three Inputs: Campus, Position, Submit Button -->
                    <div class="flex-row">
                        <div class="form-group flex-item">
                            <label for="campus_id">Campus</label>
                            <select class="form-control form-control-lg bg-light fs-6" id="campus_id" name="campus_id" required>
                                <option value="">Select Campus</option>
                                <?php while ($campus = mysqli_fetch_assoc($campus_result)) : ?>
                                    <option value="<?= $campus['campus_id']; ?>"><?= $campus['campus_name']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group flex-item">
                            <label for="position_id">Position</label>
                            <select class="form-control form-control-lg bg-light fs-6" id="position_id" name="position_id" required>
                                <option value="">Select Position</option>
                                <?php while ($position = mysqli_fetch_assoc($position_result)) : ?>
                                    <option value="<?= $position['position_id']; ?>"><?= $position['position_name']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                      
                    </div>
                   
                    <div class="form-group flex-item d-flex align-items-end">
                            <button class="btn btn-lg btn-primary w-100 fs-6" type="submit" name="temp_account_btn">Submit Request</button>
                    </div>
                    <div class="row mt-3">
                        <small>Go back to Login <a href="emp_login.php">Login Page</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
