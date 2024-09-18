<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change User Password</title>
</head>
<body>
   <div class="wrapper">
    <?php
        include("includes/header.php");
    ?>
    <div class="table-container">
            <header class="cd__intro pt-5">
            <h1> User Accounts</h1>
            <p> Change User Password </p>  
    </header>
    <table  id="example2" class="table table-striped">
    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $user_query = "SELECT * FROM user";
                        $user = mysqli_query($con, $user_query);

                        $total_query = "SELECT COUNT(*) FROM user";
                        $total_result = mysqli_query($con, $total_query);
                        $total_applicants = mysqli_fetch_array($total_result)[0];
                        $total_pages = ceil($total_applicants);

                        if (mysqli_num_rows($user) > 0) {
                            foreach ($user as $item) {
                                ?>
                                    <tr class="app-row">
                                        <td class="app-row"><?= $item['id']; ?></td>
                                        <td class="app-row"><?= $item['first_name']; ?></td>
                                        <td class="app-row"><?= $item['last_name']; ?></td>
                                        <td class="app-row"><?= $item['username']; ?></td>
                                        <td class="app-row"><?= $item['password']; ?></td>
                                        <td class="app-row" style="display: flex; justify-content: center; align-items: center;">
                                            <a href="edit_pass.php?id=<?= $item['id']; ?>" class="btn btn-primary">Change Password</a>
                                        </td>
                                        <td class="app-row" style="display: flex; justify-content: center; align-items: center;">
                                            <a href="user_access.php?id=<?= $item['id']; ?>" class="btn btn-secondary">Access</a>
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
        { "orderable": false, "targets": 4 }
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
    $(document).on('click', '.btn-primary', function(e) {
        e.preventDefault();
        var id = $(this).attr('href');
        $.ajax({
            url: id,
            type: 'GET',
            success: function(data) {
                $('#editModal .modal-body form').html(data);
                $('#editModal').modal('show');
            }
        });
    });

    
} );
      </script>
       <script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
    <script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>

    <script src="https://cdn.datatables.net/buttons/3.1.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.dataTables.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('passwordForm').onsubmit = function(event) {
    var newPassword = document.getElementById('newPassword').value;
    var confirmPassword = document.getElementById('confirmPassword').value;

    if (newPassword !== confirmPassword) {
        alert("New password and confirm password do not match!");
        event.preventDefault();
    }
}
</script>
</body>
</html>