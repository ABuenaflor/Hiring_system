<?php 
//session_start();
?>
        
    
        <body>
          <div class="wrapper">
              <?php
                include("includes/header.php"); 
              ?>
   <header class="cd__intro pt-5">
            <h1> Campus</h1>
            <p> List of Campuses for Divine Word College of Legazpi </p>
            <a href="add_campus.php"> <button class="btn btn-primary" type="button">Add Campus</button>
</a>
    </header>
    <div class="container ">
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Campus</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
                               

                                $campus_query = "SELECT * FROM campus";
                                $campus = mysqli_query($con, $campus_query);

                                $campus_query_run = "SELECT COUNT(*) FROM credentials";
                                $total_result = mysqli_query($con, $campus_query_run);
                                $total_campus = mysqli_fetch_array($total_result)[0];
                                $total_pages = ceil($total_campus);

                                if (mysqli_num_rows($campus) > 0) {
                                    foreach ($campus as $item) {
                                        ?>
                                            <tr class="app-row">
                                                <td class="app-row"><?= $item['campus_id']; ?></td>
                                                <td class="app-row"><?= $item['campus_name']; ?></td>
                                                <td class="app-row">
                                                    <a href="edit_campus.php?id=<?= $item['campus_id']; ?>" class="btn btn-primary">Edit Campus</a>
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