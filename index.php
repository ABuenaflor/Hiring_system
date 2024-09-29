<?php 
session_start();

include("config/dbcon.php");
include("includes/header.php");

$sql = "SELECT * 
        FROM job_posting
        ORDER BY posting_id DESC";
$result = $con->query($sql);
$posts = [];

while ($row = $result->fetch_assoc()) {
    $posts[$row['posting_id']]['details'] = [
        'campus_id' => $row['campus_id'],
        'dept_id' => $row['dept_id'],
        'acad_role_id' => $row['acad_role_id'],
        'inst_role_id' => $row['inst_role_id'],
        'qualifications' => $row['qualifications'],
    ];
}
?>

<link rel="stylesheet" href="assets/css/style.css">

<style>
    .image-text-container{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 50px 200px 50px 200px;

        .text-container{
            width: 600px;
        }

        .image-container img{
            width: 268px;
        }
    }
    .parallax{
        background-image: url("images/bg.jpg");
        min-height: 200px; 
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .grid-container{
        display: grid;
        grid-template-columns: 625px 625px;
        grid-gap: 20px;
        padding: 10px;
        
        .container-card{
            box-shadow: 0px 2px 4px #888888;
        }
    }
    .footer{
        background: #DDDDDD;
        padding: 20px 200px 20px 200px;
        
        .flex{
            display:flex;
            align-items: center;
            justify-content: between;
            gap: 10px;

            .w-100{
                width: 400px !important;
            }
        }
    }
</style>
<body>
    <div class="container mt-5">
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
        <div class="row">
            <div class="image-text-container">
                <div class="text-container">
                    <h1 >Job Vacancies</h1>
                    <h5 >Below listed are the qualifications for the vacant position inside Divine Word College of Legazpi</h5>
                </div>
                <div class="image-container">
                    <img src="images\bg2.jpg" alt="" class="">
                </div>
            </div>
        </div>
    </div>
    <div class="parallax"></div>
    <div class="container mt-5">   
        <h1 style="text-align: center; font-size: 1.5rem;">
            Vacant Positions <br>
            in <br>
            DWCL
            </h1>
        <div class="grid-container container">
                <?php foreach ($posts as $post): ?>
                <div class="container-card card mb-3">
                    <div class="card-body" style="border-radius:30%;">
                        <p class="card-title"><strong>Academic Position:</strong><?= $post['details']['acad_role_id']; ?></p>
                        <p class="card-text"><strong>Institutional Role:</strong> <?= $post['details']['inst_role_id']; ?></p>
                        <p class="card-text"><strong>Department:</strong> <?= $post['details']['dept_id']; ?></p>
                        <p class="card-text"><strong>Campus:</strong> <?= $post['details']['campus_id']; ?></p>
                        <p class="card-text"><strong>Qualifications:</strong> <?= $post['details']['qualifications']; ?></p>
                        
                        
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
<!--     <footer class="footer">
        <h3 class="">Fill up the form for application purposes</h3>
        <form action="code.php" method="POST" style="margin: 0 !important">
            <div class="card-body flex">
                <div class="">
                    <label for="">First Name</label>
                    <input class="form-control w-100" type="text" name="first_name" placeholder="Enter your First Name">
                </div>
                <div class="">
                    <label for="">Last Name</label>
                    <input class="form-control w-100" type="text" name="last_name" placeholder="Enter your Last Name">
                </div>
                <input href="application.php" type="submit" class="btn btn-primary flex-end" value="Apply Now" name="submit_credentials_notif" style=" margin-left: 200px">
            </div>
        </form>
    </footer> -->
</body>
