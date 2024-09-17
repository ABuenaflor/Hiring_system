<?php 
//session_start();
//include("includes/header.php"); placed inside wrapper
include("../middleware/admin_middleware.php"); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Posting Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Data Table CSS -->
    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
</head>
<style>
    .btn_round {
  width: 35px;
  height: 35px;
  display: inline-block;
  border-radius: 50%;
  text-align: center;
  line-height: 35px;
  margin-left: 10px;
  border: 1px solid #ccc;
  cursor: pointer;
}
.btn_round:hover {
  color: #fff;
  background: #6b4acc;
  border: 1px solid #6b4acc;
}

.btn_content_outer {
  display: inline-block;
  width: 85%;
}
.close_c_btn {
  width: 30px;
  height: 30px;
  position: absolute;
  right: 10px;
  top: 0px;
  line-height: 30px;
  border-radius: 50%;
  background: #ededed;
  border: 1px solid #ccc;
  color: #ff5c5c;
  text-align: center;
  cursor: pointer;
}

.add_icon {
  padding: 10px;
  border: 1px dashed #aaa;
  display: inline-block;
  border-radius: 50%;
  margin-right: 10px;
}
.add_group_btn {
  display: flex;
}
.add_group_btn i {
  font-size: 32px;
  display: inline-block;
  margin-right: 10px;
}

.add_group_btn span {
  margin-top: 8px;
}
.add_group_btn,
.clone_sub_task {
  cursor: pointer;
}

.sub_task_append_area .custom_square {
  cursor: move;
}

.del_btn_d {
  display: inline-block;
  position: absolute;
  right: 20px;
  border: 2px solid #ccc;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  line-height: 40px;
  text-align: center;
  font-size: 18px;
}
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
   <h2>Post Job Vacancy Requirement</h2>
                <!-- Display any success/error messages -->
        <?php
        if (isset($_GET['success'])) {
            echo "<div class='alert alert-success'>" . $_GET['success'] . "</div>";
        }
        ?>

        <form action="code.php" method="POST">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="fullName" class="form-label">Campus</label>
                        <select class="form-select" name="campus" id="">
                            <?php
                                $campus = mysqli_query($con, "SELECT campus_name FROM campus");
                                while ($c =mysqli_fetch_array($campus)){
                            ?>
                            <option value="<?php echo $c['campus_name']?>"> <?php echo $c['campus_name']?></option>
                            <?php } ?>
                        </select>
                </div>

                <div class="col-md-4">
                    <label for="fullName" class="form-label">Department</label>
                    <select class="form-select" name="dept" id="">
                            <?php
                                $department = mysqli_query($con, "SELECT dept_name FROM department");
                                while ($d =mysqli_fetch_array($department)){
                            ?>
                            <option value="<?php echo $d['dept_name']?>"> <?php echo $d['dept_name']?></option>
                            <?php } ?>
                        </select>
                </div>

                <div class="col-md-4">
                    <label for="fullName" class="form-label">Academic Role</label>
                    <select class="form-select" name="acad_role" id="">
                            <?php
                                $acad_role = mysqli_query($con, "SELECT acad_role_name FROM academic_roles");
                                while ($a =mysqli_fetch_array($acad_role)){
                            ?>
                            <option value="<?php echo $a['acad_role_name']?>"> <?php echo $a['acad_role_name']?></option>
                            <?php } ?>
                        </select>
                </div>

                <div class="col-md-4">
                    <label for="department" class="form-label">Institutional Role</label>
                    <select class="form-select" name="inst_role" id="">
                        <?php
                            $inst_role = mysqli_query($con, "SELECT inst_role_name FROM institutional_roles");
                            while ($i =mysqli_fetch_array($inst_role)){
                        ?>
                        <option value="<?php echo $i['inst_role_name']?>"> <?php echo $i['inst_role_name']?></option>
                        <?php } ?>
                    </select>
                </div>

                

                <div id="qualificationFields" class="col-md-4">
                    <label for="qualifications" class="form-label">Qualifications</label>
                    <input class="form-control" type="text" name="qualifications" placeholder="Enter qualifications">
                </div>
                <button type="button" class="btn btn-primary md-4" id="addQualificationBtn">Add Qualification</button>
            </div>
                  <button type="submit" class="btn btn-primary" name="add_job_posting">Submit</button>
        </form>

        <header class="cd__intro pt-5">
        <h1> Job Vacancies Qualifications </h1>
        <p> List of Qualifications for Vacant Position Inside DWCL </p>
        </header>

        <main class="container">
         
         <table id="example" class="table table-striped" style="width:180%">
        <thead>
            <tr>
                <th>Index</th>
                <th>Academic Role</th>
                <th>Institutional Role</th>
                <th>Department</th>
                <th>Campus</th>
                <th>Qualifications</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
           <?php

                $ranking_query = "SELECT * FROM job_posting";
                $ranks = mysqli_query($con, $ranking_query);

                $total_query = "SELECT COUNT(*) FROM job_posting";
                $total_result = mysqli_query($con, $total_query);
                $total_ranks = mysqli_fetch_array($total_result)[0];
                $total_pages = ceil($total_ranks);

                if (mysqli_num_rows($ranks) > 0) {
                    foreach ($ranks as $item) {
        ?>
                        <tr class="app-row">
                            <td class="app-row"><?= $item['posting_id']; ?></td>
                            <td class="app-row"><?= $item['acad_role_id']; ?></td>
                            <td class="app-row"><?= $item['inst_role_id']; ?></td>
                            <td class="app-row"><?= $item['dept_id']; ?></td>
                            <td class="app-row"><?= $item['campus_id']; ?></td>
                            <td class="app-row"><?= $item['qualifications']; ?></td>
                            <td class="app-row" style="display: flex; justify-content: center; align-items: center;">
                                <a href="edit_job_posting.php?id=<?= $item['posting_id']; ?>" class="btn btn-primary">Edit</a>
                            </td>
                          
                        </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='7'>No records found</td></tr>";
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    document.getElementById('addQualificationBtn').addEventListener('click', function() {
        let qualificationField = document.createElement('input');
        qualificationField.type = 'text';
        qualificationField.name = 'qualifications';
        qualificationField.className = 'form-control mb-2';
        qualificationField.placeholder = 'Enter qualification';
        document.getElementById('qualificationFields').appendChild(qualificationField);
    });
</script>
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


