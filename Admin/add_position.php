<?php 
//session_start();
?>

<header class="cd__intro pt-5">
            <h1> Add Position</h1>
            <p> Indicate the Position of Employees for Divine Word College of Legazpi </p>
            
    </header>
<form action="code.php" method="POST">
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="position_name" class="form-label">Position</label>
            <input type="text" name="position_name" class="form-control" id="position_name" placeholder="Enter Position">
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="add_position">Save</button>
</form>


