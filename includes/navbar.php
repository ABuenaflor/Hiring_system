
<?php 

// session_start();
include('config/dbcon.php');
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">DWCL Applicant Hiring System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto" >
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>

         
      
           <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="application.php">Apply Job</a>
          </li>
          

          <!--  <li class="nav-item">
            <a class="nav-link" href="#"><?= $_SESSION['auth_user']['username'] ?></a>
          </li>    -->
          <!-- <li class="nav-item">
            <a href="logout.php" class="nav-link">Logout</a>
          </li>

         
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li> -->
        
      </ul>
    </div>
  </div>
</nav>