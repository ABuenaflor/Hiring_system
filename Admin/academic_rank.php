<?php 
//session_start();
//include("includes/header.php"); placed inside wrpaper 
// include("../middleware/admin_middleware.php"); 
?>
        
    
        <body>
          <div class="wrapper">
              <?php
                include("includes/header.php"); 
              ?>
 <header class="cd__intro pt-5">
            <h1> Academic Rank</h1>
            <p> Academic Rank for Teaching Positions inside Divine Word College of Legazpi</p>
            <a href="add_academic_rank.php"> <button class="btn btn-primary" type="button">Add Academic Rank</button>
</a>
    </header>
    <div class="container ">
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Academic Rank</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
                               

                                $acad_rank_query = "SELECT * FROM academic_rank";
                                $acad_rank = mysqli_query($con, $acad_rank_query);

                                $acad_rank_query_run = "SELECT COUNT(*) FROM academic_rank";
                                $total_result = mysqli_query($con, $acad_rank_query_run);
                                $total_acad_rank = mysqli_fetch_array($total_result)[0];
                                $total_pages = ceil($total_acad_rank);

                                if (mysqli_num_rows($acad_rank) > 0) {
                                    foreach ($acad_rank as $item) {
                                        ?>
                                            <tr class="app-row">
                                                <td class="app-row"><?= $item['acad_rank_id']; ?></td>
                                                <td class="app-row"><?= $item['acad_rank_name']; ?></td>
                                                <td class="app-row">
                                                    <a href="edit_academic_rank.php?id=<?= $item['acad_rank_id']; ?>" class="btn btn-primary">Edit Academic Rank</a>
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
        { "orderable": false, "targets": 5}
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