<?php 
//session_start();
//include("includes/header.php"); remove and placed inside wrapper
include("../middleware/admin_middleware.php"); 

?>
<!DOCTYPE html>
<html lang="en">
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
   <style>
    @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
    @import url('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

.dataTables_filter {
  float: right;
}

.table-hover > tbody > tr:hover {
  background-color: #ccffff;
}

@media only screen and (min-width: 768px) {
  .table {
    table-layout: fixed;
    max-width: 100% !important;
  }
}

thead {
  background: #ddd;
}

.table td:nth-child(2) {
  overflow: hidden;
  text-overflow: ellipsis;
}

.highlight {
  background: #ffff99;
}
.grid-container {
    display: grid;
    justify-items: end;
}
@media only screen and (max-width: 767px) {
  /* Force table to not be like tables anymore */
  table,
thead,
tbody,
th,
td,
tr {
    display: block;
  }

  /* Hide table headers (but not display: none;, for accessibility) */
  thead tr,
tfoot tr {
    position: absolute;
    top: -9999px;
    left: -9999px;
  }

  td {
    /* Behave  like a "row" */
    border: none;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-left: 50% !important;
  }

  td:before {
    /* Now like a table header */
    position: absolute;
    /* Top/left values mimic padding */
    top: 6px;
    left: 6px;
    width: 45%;
    padding-right: 10px;
    white-space: nowrap;
  }

  .table td:nth-child(1) {
    background: #ccc;
    height: 100%;
    top: 0;
    left: 0;
    font-weight: bold;
  }

  /*
  Label the data
  */
  td:nth-of-type(1):before {
    content: "Name";
  }

  td:nth-of-type(2):before {
    content: "Position";
  }

  td:nth-of-type(3):before {
    content: "Office";
  }

  td:nth-of-type(4):before {
    content: "Age";
  }

  td:nth-of-type(5):before {
    content: "Start date";
  }

  td:nth-of-type(6):before {
    content: "Salary";
  }

  .dataTables_length {
    display: none;
  }
}
   </style>
   <body>

  <div class="wrapper">
      <?php
            include("includes/header.php"); 
        ?>
        <header class="cd__intro pt-5">
         <h1> List of  Faculties </h1>
         <p> Ranked Faculties from Basic Education and Tertiary Level </p>

      </header>
      <!--$%adsense%$-->
      <main class="container">
         
         <table id="example" class="table table-striped" style="width:180%">
        <thead>
            <tr>
                <th>Index</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Department</th>
                <th>Campus</th>
                <th>Position</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
           <?php

                $ranking_query = "
                SELECT 
                    emp_login.first_name, 
                    emp_login.last_name, 
                    emp_login.department_id, 
                    emp_login.campus_id, 
                    emp_login.position_id, 
                    department.dept_name, 
                    campus.campus_name, 
                    position.position_name
                FROM 
                    emp_login
                LEFT JOIN 
                    department ON emp_login.department_id = department.dept_id
                LEFT JOIN 
                    campus ON emp_login.campus_id = campus.campus_id
                LEFT JOIN 
                    position ON emp_login.position_id = position.position_id
                ";
                $ranks = mysqli_query($con, $ranking_query);

                if (mysqli_num_rows($ranks) > 0) {
                    foreach ($ranks as $item) {
        ?>
                        <tr class="app-row">
                           <td class="app-row"><?= $item['first_name']; ?></td>
                            <td class="app-row"><?= $item['first_name']; ?></td>
                            <td class="app-row"><?= $item['last_name']; ?></td>
                            <td class="app-row"><?= $item['dept_name']; ?></td>
                            <td class="app-row"><?= $item['campus_name']; ?></td>
                            <td class="app-row"><?= $item['position_name']; ?></td>
                            <td class="app-row">
                            <?php
                            // Check the campus_id and display the appropriate button
                            if ($item['campus_id'] == 2) {
                                // Show Basic Education button if campus_id is 2
                                echo '<a href="basic_ed_ranking.php"><button class="btn btn-primary" type="button">Basic Education Ranking</button></a>';
                            } elseif ($item['campus_id'] == 1) {
                                // Show Tertiary Ranking button if campus_id is 1
                                echo '<a href="tertiary_ranking.php"><button class="btn btn-primary" type="button">Tertiary Ranking</button></a>';
                            }
                            ?>
                        </td>
                        </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='6'>No records found</td></tr>";
            }
        ?>
        </tbody>
    </table>
         <!-- END EDMO HTML (Happy Coding!)-->
      </main>
  </div>
      
      
      <!-- jQuery -->
<script src='https://code.jquery.com/jquery-3.7.0.js'></script>
<!-- Data Table JS -->
<script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
<script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>
      <!-- Script JS -->
      <script src="./js/script.js"></script>


      <!--$%analytics%$-->
      <script>
        $(document).ready(function() {
    $('#example').DataTable({
      //disable sorting on last column
      "columnDefs": [
        { "orderable": false, "targets": 6 }
      ],
      language: {
        //customize pagination prev and next buttons: use arrows instead of words
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>'
        },
        //customize number of elements to be displayed
        "lengthMenu": 'Display <select class="form-control input-sm">'+
        '<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">All</option>'+
        '</select> results'
      }
    })  
} );
      </script>
      <script>
    document.querySelectorAll('.mySelect').forEach(selectElement => {
    const buttonA = selectElement.parentElement.querySelector('.buttonA');
    const buttonB = selectElement.parentElement.querySelector('.buttonB');

    selectElement.addEventListener('change', () => {
        const selectedValue = selectElement.value;
        if (selectedValue === 'A') {
            buttonA.style.display = 'block';
            buttonB.style.display = 'none';
        } else if (selectedValue === 'B') {
            buttonA.style.display = 'none';
            buttonB.style.display = 'block';
        }
    });
});
</script>
   </body>
</html>