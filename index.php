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
        .bg-image {
            background-image: url('images/bg2.jpg');
            background-size: cover;
            background-position: center;
            height: 550px;
            width: 550px;
            background-repeat: no-repeat;
            border-radius: 40px; /* Add this line */
            top: 20%;
            filter: brightness(90%) saturate(150%);

        }
        .cover-image{
            position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-image: url('images/bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        z-index: -1;
        filter: brightness(50%) saturate(150%);
        }
        .text-wrapper {
        color: black; /* White color */
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
            <div class="cover-image ">

            </div>
          
                <div class="text-wrapper col-md-6 mb-4">
                    <h1 style="color:white;">Job Vacancies</h1>
                    <h5 style="color:white;">Below listed are the qualifications for the vacant position inside Divine Word College of Legazpi</h5>
                <div class="container">
                        <?php foreach ($posts as $post): ?>
                        <div class="card mb-3">
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
                    <form action="code.php" method="POST">
                        <div class="card-body col-md-4">
                            <input class="form-control" type="text" name="first_name" placeholder="Enter your First Name"><br>  
                            <input class="form-control" type="text" name="last_name" placeholder="Enter your Last Name">
                        </div>
                        <input href="application.php" type="submit" class="btn btn-primary" value="Apply Now" name="submit_credentials_notif">
                    </form>

                </div>
            <div class="col-md-6">
                <div class="bg-image"></div>
            </div>
        </div>
    </div>
</body>



<?php include("includes/footer.php"); ?>
