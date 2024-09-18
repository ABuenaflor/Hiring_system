<?php 
session_start();

include("config/dbcon.php");
/* include("includes/header.php");
 */
?>

<link rel="stylesheet" href="assets/css/style.css">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" >

<!-- alertify CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>


<head>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <div class="container">
     <a class="navbar-brand" href="#">Employee Self Rating</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto" >
          <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="emp_sr.php">Home</a>
          </li>

          <?php
          if(isset($_SESSION['auth'])){
               ?>    
          
               <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="basic_ed_sr.php">Basic Education Self Rating</a>
               </li>
               <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="college_sr.php">College Self Rating</a>
               </li>
               

               <li class="nav-item">
               <a class="nav-link" href="#"><?= $_SESSION['auth_user']['username'] ?></a>
               </li>   
               <li class="nav-item">
               <a href="logout.php" class="nav-link">Logout</a>
               </li>

               <?php
          }else{
               ?>
               <li class="nav-item">
               <a class="nav-link" href="register.php">Register</a>
               </li>
               <li class="nav-item">
               <a class="nav-link" href="login.php">Login</a>
               </li>
               <?php
          }
          ?>
          </ul>
     </div>
     </div>
     </nav>
</head>
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
                    <h1 >Job Vacancies</h1>
                    <h5 >Below listed are the qualifications for the vacant position inside Divine Word College of Legazpi</h5>
                
                    <div class="container">
                      
                    </div>
                   

                </div>
           
        </div>
    </div>
</body>



<?php include("includes/footer.php"); ?>
