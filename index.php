<?php 
session_start();


include("includes/header.php"); ?>

<link rel="stylesheet" href="assets/css/style.css">

<style>
        .bg-image {
            background-image: url('images/bg2.jpg');
            background-size: cover;
            background-position: center;
            height: 550px;
            width: 550px;
            background-repeat: no-repeat;
            border-radius: 40px; /* Add this line */
            top: 20%;
            filter: brightness(90%) saturate(150%);

        }
        .cover-image{
            position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-image: url('images/bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        z-index: -1;
        filter: brightness(50%) saturate(150%);
        }
        .text-wrapper {
        color: #FFFFFF; /* White color */
    }
           
    </style>
<body>
    <div class="container mt-5">
                <?php if(isset($_SESSION['message']))
                {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?=$_SESSION['message']; ?>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="false">&times;</span>
                        </button>
                    </div>
                <?php
                unset($_SESSION['message']);
                }
                ?>
        <div class="row">
            <div class="cover-image ">

            </div>
          
                <div class="text-wrapper col-md-6 mb-4">
                    <h1 class="display-4">Welcome to DWCL</h1>
                    <p class="lead">We are looking for a passionate individual to fill the role of Software Engineer. 
                        If you are eager to work in a dynamic environment and contribute to exciting projects, 
                        we want to hear from you!</p>
                    <ul class="list-unstyled">
                        <li>Collaborate with cross-functional teams</li>
                        <li>Develop and maintain web applications</li>
                        <li>Participate in code reviews and team meetings</li>
                    </ul>
                    <form action="code.php" method="POST">
                        <div class="card-body col-md-4">
                            <input class="form-control" type="text" name="first_name" placeholder="Enter your First Name"><br>  
                            <input class="form-control" type="text" name="last_name" placeholder="Enter your Last Name">
                        </div>
                        <input href="application.php" type="submit" class="btn btn-primary" value="Apply Now" name="submit_credentials_notif">
                    </form>

                </div>
            <div class="col-md-6">
                <div class="bg-image"></div>
            </div>
        </div>
    </div>
</body>



<?php include("includes/footer.php"); ?>
