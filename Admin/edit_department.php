<?php 
//session_start();
include("includes/header.php"); 
include("../middleware/admin_middleware.php"); 
?>

<header class="cd__intro pt-5">
            <h1>Departments for Basic Education and Tertiary Level</h1>
            <p> departments for Basic Education and Tertiary Level </p>
            
    </header>

<div class="container ">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Department</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            <?php
                  
                ?>  

                <div class="card">
                    <form  action="code.php" method="POST">
                        <div class="row-mb-3">
                            <div class="col-md-4">
                                <label for="dept_name">Department</label>
                                    <input type="hidden" class="form-control" name="dept_id" value="<?php echo $row['dept_id']?>">
                                    <input type="text" class="form-control" name="dept_name" value="<?php echo $row['dept_name'] ?>" >
                            </div>
                        </div>
                        <div class="col-md-12">
                                <button class="btn btn-primary" name="edit_dept" type="submit">Save</button>
                            </div>
                    </form>
                </div>
            </tbody>
        </table>

        <?php        
                  
        ?>

    </div>