<?php 
//session_start();
include("../middleware/admin_middleware.php"); 
?>


<div class="wrapper">
        <?php
            
            include("includes/header.php"); 

        ?>

<header class="cd__intro pt-5">
            <h1>Campus for Basic Education and Tertiary Level</h1>
            <p> Campus for Basic Education and Tertiary Level </p>
            
</header>

<div class="container ">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Campus</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            <?php
                      if(isset($_GET['id'])) {
                        $campus_id = $_GET['id']; // Get the department ID from URL query string
                
                        // Query to fetch the department details based on the id
                        $query = "SELECT * FROM campus WHERE campus_id = ?";
                        
                        // Prepare the query to avoid SQL injection
                        $stmt = $con->prepare($query);
                        $stmt->bind_param("i", $campus_id); // Bind the dept_id as an integer
                        $stmt->execute();
                        
                        // Get the result
                        $result = $stmt->get_result();
                
                        // Check if any department is found
                        if ($result->num_rows > 0) {
                            // Fetch the department details
                            $row = $result->fetch_assoc();
                        } else {
                            echo "Campus not found.";
                            exit;
                        }
                    } else {
                        echo "No Campus ID provided.";
                        exit;
                    }
                ?>  

                <div class="card">
                    <form  action="code.php" method="POST">
                        <div class="row-mb-3">
                            <div class="col-md-4">
                                <label for="dept_name">Campus</label>
                                    <input type="hidden" class="form-control" name="campus_id" value="<?php echo $row['campus_id']?>">
                                    <input type="text" class="form-control" name="campus_name" value="<?php echo $row['campus_name'] ?>" >
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
    </div>