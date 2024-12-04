<?php 
//session_start();
?>
 
<body>
<div class="wrapper">
        <?php
            include("includes/header.php"); 
        ?>  
        <header class="cd__intro pt-5">
                <h1> Department</h1>
                <p> List of departments for Basic Education and Tertiary Level </p>
        </header>
    <a href="add_department.php"> <button class="btn btn-primary" type="button">Add Department</button>
</a>
    
    <div class="container ">
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Index</th>
                <th>Department</th>
                <th>Action</th>
               
            </tr>
        </thead>
        <tbody>
        <?php
                               
                                $dept_query = "SELECT * FROM department";
                                $department = mysqli_query($con, $dept_query);

                                $department_query = "SELECT COUNT(*) FROM department";
                                $department_result = mysqli_query($con, $department_query);
                                $total_department = mysqli_fetch_array($department_result)[0];
                                $total = ceil($total_department);

                                if (mysqli_num_rows($department) > 0) {
                                    foreach ($department as $item) {
                                        ?>
                                            <tr class="app-row">
                                                <td class="app-row"><?= $item['dept_id']; ?></td>
                                                <td class="app-row"><?= $item['dept_name']; ?></td>
                                             
                                                <td class="app-row">
                                                    <a href="edit_department.php?id=<?= $item['dept_id']; ?>" class="btn btn-primary">Edit</a>
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
    </div>
</div>
  
            
  

  

    <script>
        $(document).ready(function() {
    $('#example').DataTable({
      //disable sorting on last column
      "columnDefs": [
        { "orderable": false, "targets": 0 }
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