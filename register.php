<?php 
session_start();

if(isset($_SESSION['auth'])){

    $_SESSION['message'] = 'You are already logged in';
    header('Location: index.php');
    exit();
}

include("includes/header.php"); ?>

<div class="py-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if(isset($_SESSION['message']))
            {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong> <?=$_SESSION['message']; ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="false">&times;</span>
                    </button>
                </div>
            <?php
            unset($_SESSION['message']);
            }
            ?>
            <div class="card">
                <div class="card-header">
                    <h4>Signup Form</h4>
                </div>
                <div class="card-body">
                    <form action="functions/auth.php" method="POST">

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">First name</label>
                        <input type="text" class="form-control" name="first_name" placeholder="Enter first name">
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Surname</label>
                        <input type="text" class="form-control" name="surname" placeholder="Enter surname">
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter username">
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                        <button type="submit" name="register_btn" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include("includes/footer.php"); ?>