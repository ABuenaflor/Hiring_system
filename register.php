<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Bootstrap Register | Ludiflex</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: url('images/dwcl-bg.png') no-repeat center center fixed; /* Path to your image */
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .box-area {
            width: 930px;
        }

        .left-box {
            padding: 40px 30px 40px 40px;
        }

        ::placeholder {
            font-size: 16px;
        }

        .rounded-4 {
            border-radius: 20px;
        }

        .rounded-5 {
            border-radius: 30px;
        }

        .form-control {
            border: 1px solid #b3a1a1 !important;
            padding: 8px 10px;
        }

        @media only screen and (max-width: 768px) {
            .box-area {
                margin: 0 10px;
            }

            .right-box {
                height: 100px;
                overflow: hidden;
            }

            .left-box {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 left-box">
            <?php
                if (isset($_SESSION['message']) && isset($_SESSION['success'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> <?= $_SESSION['message']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    unset($_SESSION['message']);
                    unset($_SESSION['success']);
                }
                ?>
                <form action="functions/auth.php" method="POST">
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h2>Welcome!</h2>
                            <p>Create your account</p>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" name="first_name" placeholder="First Name" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" name="surname" placeholder="Surname" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" class="form-control form-control-lg bg-light fs-6" name="username" placeholder="Email" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" placeholder="Password" required
                                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                                title="Password must contain at least 1 lowercase letter, 1 uppercase letter, 1 number, and 1 special character. Minimum length is 8 characters.">
                        </div>
                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-primary w-100 fs-6" type="submit" name="register_btn">Sign Up</button>
                        </div>
                        <div class="row">
                            <small>Already have an account? <a href="login.php">Login</a></small>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column right-box" style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img src="images/4.png" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be Verified</p>
                <small class="text-white text-wrap text-center" style="width: 17rem; font-family: 'Courier New', Courier, monospace;">Create an account to continue.</small>
            </div>
        </div>
    </div>
</body>
</html>
<?php include("includes/footer.php"); ?>
