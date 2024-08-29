<?php 
session_start();


include("includes/header.php"); ?>

<link rel="stylesheet" href="assets/css/style.css">

<body>
<div class="body-container">

    <div class="bg-color-blue"></div>
        <div class="body-container-image">
            <img src="images/hr5.jpg" alt="" class="image">
            <div class="inside-container">
                <h2>Divine Word College of Legazpi</h2>
                <h1>Explore a vast of opportunities with us</h1>
                

            </div>
        </div>
    <div class="bg-color-white"></div>
</div>
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



<style>
    body{
        overflow-y: hidden;

    }
    .body-container{
        width: 100%;
        height: 100%;
        display: flex;
        position: relative;
}

    .body-container-image{
        right: 28%;
        height: 80%;
        width: 70%;
        position: absolute;
        transform: translate( 10%, 10%);
        
        /* background-color: #ccc; */
    } 
    .image{
        height: 100%;
        width: 100%;
        position: absolute;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Drop shadow */
    border-radius: 10px; 

    }
    
    .body-container .bg-color-blue{
        width: 60%;
        height: 100%;
        background-image: linear-gradient(to right, #0d15a0,#1524ab );
    }
    .inside-container{
        right: 5%;
        font-family: Arial, sans-serif; /* Change this to your preferred font */
        color: black;
        line-height: 1.5; /* Adjust line spacing */
    margin-bottom: 10px;
        z-index: 10;
        position: relative;
        padding: 100px 80px 100px 80px;

        h1{
            line-height: 2;
            font-weight: bold; 

        }
       

        button{
            margin-top: 100px;
            background: blue;
            outline: none;
            border: none;
        }
    }
</style>

</body>




<?php include("includes/footer.php"); ?>
