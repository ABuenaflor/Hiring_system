<?php
include("functions/auth.php");
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Faculty Ranking - Employee Self Rating</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto" >
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>

        <?php
        if(isset($_SESSION['auth'])){
          ?>    
      
          
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