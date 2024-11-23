<?php 
//session_start();
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
      <div class="wrapper">
         <?php
            include("includes/header.php"); 
         ?>
          <div class="container " style="width: 100vw; margin-left: 0;">
            <header class="cd__intro pt-5">
               <h1> Filter Applicants </h1>
               <p> Show Applicants that applied for Basic Education and Tertiary Level </p>
            </header>
               <form method="POST" action="">
                  <label for="filter">Filter by:</label>
                  <select class="form-select" name="filter_column" id="filter">
                     <option value="department">Department</option>
                     <option value="institutional_role">Institutional Role</option>
                     <option value="academic_role">Academic Role</option>
                     <option value="col_school">School Graduated</option>
                  </select>
                  <input type="submit" name="submit" value="Filter" class="btn btn-secondary">
               </form>
          </div>
          <?php
        
               if (isset($_POST['submit'])) {
                  $filter_column = $_POST['filter_column'];

                  // Construct the SQL query based on the selected column
                  $sql = "SELECT id, first_name, last_name, col_school, $filter_column FROM credentials";

                  // Execute the query
                  $result = $con->query($sql);

                  if ($result->num_rows > 0) {
                     echo "<div class='container-fluid'>";
                     echo "<div class='card mb-4'>";
                     echo "<div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>";
                     echo "<h6 class='m-0 font-weight-bold text-primary'>Applicant List</h6>";
                     echo "</div>";
                     echo "<div class='card-body'>";
                     echo "<div class='datatable-wrapper'>";
                     echo "<table id='dataTableExample' class='table table-striped table-bordered dataTable' role='grid' aria-describedby='dataTable_info'>";
                     echo "<thead>";
                     echo "<tr role='row'>";
                     echo "<th class='sorting_asc' role='columnheader' tabindex='0' aria-controls='dataTable' rowspan='1' colspan='1' aria-sort='ascending' aria-label='ID: activate to sort column ascending'>ID</th>";
                     echo "<th class='sorting' role='columnheader' tabindex='0' aria-controls='dataTable' rowspan='1' colspan='1' aria-label='Name: activate to sort column ascending'>Name</th>";
                     echo "<th class='sorting' role='columnheader' tabindex='0' aria-controls='dataTable' rowspan='1' colspan='1' aria-label='School: activate to sort column ascending'>School</th>";
                     echo "<th class='sorting' role='columnheader' tabindex='0' aria-controls='dataTable' rowspan='1' colspan='1' aria-label='" . ucfirst($filter_column) . ": activate to sort column ascending'>" . ucfirst($filter_column) . "</th>";
                     echo "</tr>";
                     echo "</thead>";
                     echo "<tbody class='dataTables_tbody' role='alert' aria-live='polite'>";
                     
                     $count = 0;
                     while ($row = $result->fetch_assoc()) {
                        echo "<tr role='row' class='even'>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                        echo "<td>" . $row['col_school'] . "</td>";
                        echo "<td>" . $row[$filter_column] . "</td>";
                        echo "</tr>";
                        $count++;
                     }
                     
                     echo "</tbody>";
                     echo "</table>";
                     echo "</div>";
                     echo "</div>";
                     echo "</div>";
                  } else {
                     echo "<div class='container-fluid'>";
                     echo "<div class='card mb-4'>";
                     echo "<div class='card-body'>";
                     echo "<div class='datatable-wrapper'>";
                     echo "<div class='alert alert-warning' role='alert'>";
                     echo "No applicants found matching the selected criteria.";
                     echo "</div>";
                     echo "</div>";
                     echo "</div>";
                     echo "</div>";
                     echo "</div>";
                  }
               }

               // Close connection
               $con->close();
        ?>
      </div>
        

<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#dataTableExample').DataTable();
});
</script>
        