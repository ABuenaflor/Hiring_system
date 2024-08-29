<?php 
//session_start();
include("includes/header.php"); 
include("../middleware/admin_middleware.php"); 
?>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="CodeHim">
      <title> Responsive & sortable Bootstrap data table Example </title>
      <!-- Style CSS -->
      <link rel="stylesheet" href="./css/style.css">
      <!-- Demo CSS (No need to include it into your project) -->
      <link rel="stylesheet" href="./css/demo.css">
      <!-- Bootstrap 5 CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
      <!-- Data Table CSS -->
      <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
      <!-- Font Awesome CSS -->
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
   </head>

   <body>
      <header class="cd__intro pt-5">
            <h1> Filter Applicants </h1>
            <p> Show Applicants that applied for Basic Education and Tertiary Level </p>
      </header>

      <div class="container">
         <div class="row">
            <form method="POST" action="">
               <label for="filter">Filter by:</label>

               <select class="form-select" name="filter_column" id="filter">
                  <option value="department">Department</option>
                  <option value="job_type">Institutional Role</option>
                  <option value="job_schedule">Academic Role</option>
               </select>

               <input type="submit" name="submit" value="Filter" class="btn btn-secondary">
            </form>
         </div>

        <?php
        
               if (isset($_POST['submit'])) {
                  $filter_column = $_POST['filter_column'];

                  // Construct the SQL query based on the selected column
                  $sql = "SELECT $filter_column FROM credentials";

                  // Execute the query
                  $result = $con->query($sql);

                  if ($result->num_rows > 0) {
                     // Output data of each row
                     echo "<table border='1'>";
                     echo "<tr><th>" . ucfirst($filter_column) . "</th></tr>";
                     while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row[$filter_column] . "</td></tr>";
                     }
                     echo "</table>";
                  } else {
                     echo "0 results found";
                  }
               }

               // Close connection
               $con->close();
        ?>