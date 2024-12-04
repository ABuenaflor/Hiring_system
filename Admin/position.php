<?php 
//session_start();
?>

<body>
  <div class="wrapper">
        <?php
            include("includes/header.php"); 
        ?>
          <header class="cd__intro pt-5">
            <h1> Institutional Employee Position</h1>
            <p> Positions / Ranking of Employees for Divine Word College of Legazpi </p>
            <a href="add_position.php"> <button class="btn btn-primary" type="button">Add Position</button>
</a>
    </header>
    <div class="container ">
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Position</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
                               

                                $position_query = "SELECT * FROM position";
                                $position = mysqli_query($con, $position_query);

                                $position_query_run = "SELECT COUNT(*) FROM position";
                                $total_result = mysqli_query($con, $position_query_run);
                                $total_position = mysqli_fetch_array($total_result)[0];
                                $total_pages = ceil($total_position);

                                if (mysqli_num_rows($position) > 0) {
                                    foreach ($position as $item) {
                                        ?>
                                            <tr class="app-row">
                                                <td class="app-row"><?= $item['position_id']; ?></td>
                                                <td class="app-row"><?= $item['position_name']; ?></td>
                                                <td class="app-row">
                                                    <a href="edit_position.php?id=<?= $item['position_id']; ?>" class="btn btn-primary">Edit Position</a>
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