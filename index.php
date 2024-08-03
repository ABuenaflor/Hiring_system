<?php 
session_start();




include("includes/header.php"); ?>


<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
            </div>
        </div>
    </div>
</div>



<?php include("includes/footer.php"); ?>