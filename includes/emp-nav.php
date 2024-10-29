<?php
/* include("functions/auth.php");
 */?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <div class="container">
     <a class="navbar-brand" href="#">Employee Self Rating</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         <?php echo $_SESSION['first_name'] ?? 'Guest'; ?>
                         </a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                         </ul>
                    </li>
            </ul>
     </div>
     </div>
     </nav>