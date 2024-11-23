<?php
// session_start();
// Check if the user is logged in
if (isset($_SESSION['emp_id'])) {
     // Fetch the user's first name from the emp_login table
     $user_id = $_SESSION['emp_id']; // Assuming user_id is stored in the session
     $query = "SELECT first_name FROM emp_login WHERE emp_id = ?";
     $stmt = mysqli_prepare($con, $query);
     mysqli_stmt_bind_param($stmt, "i", $user_id); // Bind the user_id as an integer
     mysqli_stmt_execute($stmt);
     $result = mysqli_stmt_get_result($stmt);
 
     if ($row = mysqli_fetch_assoc($result)) {
         $_SESSION['first_name'] = $row['first_name']; // Store first name in the session
     }
     mysqli_stmt_close($stmt);
 }else {
     // Handle the case where the user is not logged in
     die("You are not logged in.");
 }
 
 ?>

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
                         <li><a class="dropdown-item" href="emp_logout.php">Logout</a></li>
                         </ul>
                    </li>
            </ul>
     </div>
     </div>
     </nav>