<?php 
include("includes/header.php"); 
include(__DIR__."../middleware/admin_middleware.php"); 
//session_start();
//include("config/dbcon.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./css/style.css">
      <!-- Demo CSS (No need to include it into your project) -->
      <link rel="stylesheet" href="./css/demo.css">
      <!-- Bootstrap 5 CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
      <!-- Data Table CSS -->
      <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
      <!-- Font Awesome CSS -->
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>

          <!-- jQuery -->
    <script src='https://code.jquery.com/jquery-3.7.0.js'></script>
    <!-- Data Table JS -->
    <script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
    <script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>
    <script src="./js/script.js"></script>
    <style>
@import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
@import url('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
.wrapper {
margin-top: 5vh;
}

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
</head>

<body>
    <header class="cd__intro pt-5">
            <h1> Applicants</h1>
            <p> List of applications </p>
            
    </header>
    <div class="container ">
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Index</th>
                <th>First name</th>
                <th>Last name</th>
                <th>School</th>
                <th>Program</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
                               

                                $applicants_query = "SELECT * FROM credentials";
                                $applicants = mysqli_query($con, $applicants_query);

                                $total_query = "SELECT COUNT(*) FROM credentials";
                                $total_result = mysqli_query($con, $total_query);
                                $total_applicants = mysqli_fetch_array($total_result)[0];
                                $total_pages = ceil($total_applicants);

                                if (mysqli_num_rows($applicants) > 0) {
                                    foreach ($applicants as $item) {
                                        ?>
                                            <tr class="app-row">
                                                <td class="app-row"><?= $item['id']; ?></td>
                                                <td class="app-row"><?= $item['first_name']; ?></td>
                                                <td class="app-row"><?= $item['last_name']; ?></td>
                                                <td class="app-row"><?= $item['col_school']; ?></td>
                                                <td class="app-row"><?= $item['course']; ?></td>
                                                <td class="app-row">
                                                    <a href="show.php?id=<?= $item['id']; ?>" class="btn btn-primary">Show More</a>
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

        <div class="container">
            <header class="cd__intro pt-5">
                <h1> Ranked by Simple Additive Weighting</h1>
                <p> Rank List of applications </p>
                
            </header>
            <table id="example2" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>SAW Score</th>
                        <th>School</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $candidates_query = "SELECT * FROM credentials ORDER BY saw_score DESC";
                        $candidates = mysqli_query($con, $candidates_query);

                        if (mysqli_num_rows($candidates) > 0) {
                            foreach ($candidates as $candidate) {
                                $normalizedSawScore = calculate_saw_score($candidate, $weights);
                                update_candidate_saw_score($con, $candidate['id'], $normalizedSawScore);
                                echo "<tr>";
                                
                                echo "<td class='app-row-rank'>{$candidate['first_name']}</td>";
                                echo "<td class='app-row-rank'>{$candidate['last_name']}</td>";
                                echo "<td class='app-row-rank'>{$normalizedSawScore}</td>";
                                echo "<td class='app-row-rank'>{$candidate['col_school']}</td>";
                                echo "</tr>";
                                
                            }
                        } else {
                            echo "<tr><td colspan='4'>No records found</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
    $('#example').DataTable({
      //disable sorting on last column
      "columnDefs": [
        { "orderable": false, "targets": 5 }
      ],
      language: {
        //customize pagination prev and next buttons: use arrows instead of words
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>'
        },
        //customize number of elements to be displayed
        "lengthMenu": 'Display <select class="form-control input-sm">'+
        '<option value="5">5</option>'+
        '<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">All</option>'+
        '</select> results'
      }
    })  
    $('#example2').DataTable({
      //disable sorting on last column
      "columnDefs": [
        { "orderable": false, "targets": 3 }
      ],
      language: {
        //customize pagination prev and next buttons: use arrows instead of words
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>'
        },
        //customize number of elements to be displayed
        "lengthMenu": 'Display <select class="form-control input-sm">'+
        '<option value="5">5</option>'+
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
      
</body>
</html>