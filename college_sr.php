<?php 
session_start();

include("config/dbcon.php");
/* include("includes/header.php");
 */
?>

<link rel="stylesheet" href="assets/css/style.css">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" >

<!-- alertify CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
<!-- Bootstrap CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" >

<!-- alertify CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>


<head>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <div class="container">
     <a class="navbar-brand" href="#">Employee Self Rating</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto" >
          <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="emp_sr.php">Home</a>
          </li>

          <?php
          if(isset($_SESSION['auth'])){
               ?>    
          
               <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="basic_ed_sr.php">Basic Education Self Rating</a>
               </li>
               <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="college_sr.php">College Self Rating</a>
               </li>
               

               <li class="nav-item">
               <a class="nav-link" href="#"><?= $_SESSION['auth_user']['username'] ?></a>
               </li>   
               <li class="nav-item">
               <a href="logout.php" class="nav-link">Logout</a>
               </li>

               <?php
          }else{
               ?>
               <li class="nav-item">
               <a class="nav-link" href="register.php">Register</a>
               </li>
               <li class="nav-item">
               <a class="nav-link" href="login.php">Login</a>
               </li>
               <?php
          }
          ?>
          </ul>
     </div>
     </div>
     </nav>
</head>
    <style>
      .form-control input-field{
        border: 1px solid #b3a1a1 !important;
        padding: 8px 10px;
      }
      .bold-text {
    font-weight: bold;
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
             <div class="wrapper">
                <header class="cd__intro pt-5">
                    <h1> Faculty Ranking for Tertiary Level</h1>
                    <p> Criterias For Ranking Faculties in Tertiary Level</p>
                    <h2>LEGEND:</h2>
                    <h3>SR: Self Rating </h3>
                </header>
        <form action="code.php" method="POST">
        <div class="row">
                <div class="col-md-4">
                    <input class="form-control" type="text" name="first_name" placeholder="Enter your First Name"><br>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <input class="form-control" type="text" name="last_name" placeholder="Enter your Last Name"> <br>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <input class="form-control" type="email" name="username" placeholder="Enter your Email">
                </div>
            </div>
    <div class="container mt-5">
        <table class="table table-striped table-bordered">
        <thead class="table-dark">
                <tr>
                    <th>CRITERIA</th>
                    <th colspan="2">WEIGHT</th>
                    <th colspan="1">SUMMARY OF POINTS</th>
                    
                </tr>
                <tr>
                    <th></th>
                    <th>%</th>
                    <th>Criteria Credit Points</th>
                    <th>Self Rating</th>
                    

                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bold-text">1. EDUCATIONAL ATTAINMENT</td>
                    <td>40</td>
                    <td>160</td>
                    <td><input type="text" class="form-control input-field" name="educ_attain_sr"></td>
                
                    
                </tr>
                <!-- Add more rows as needed -->
                <tr>
                    <td class="bold-text" name="deg_earned">1.1 Degrees Earned (Maximum points = 80)</td>
                    <td>20</td>
                    <td><input type="text" class="form-control input-field" name="deg_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="deg_earned"></td>
                
                    
                </tr>
                <tr>
                    <td class="bold-text" name="bacc">1.1.1 Baccalaureate</td>
                    <td><input type="text" class="form-control input-field" name=""></td>
                    <td><input type="text" class="form-control input-field" name="bac_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="bacc"></td>
                
                    
                </tr>
                <tr>
                    <td name="bse">BSE / BSEED (or its equivalent)</td>
                    <td></td>
                    <td><input type="text" class="form-control input-field" name="bse_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="bse"></td>
                    
                <tr>
                    <td name="bs">BS / AB + LET Passer 5 points</td>
                    <td></td>
                    <td><input type="text" class="form-control input-field" name="bs_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="bs"></td>
                    
                </tr>
                <tr>
                    <td class="bold-text" name="cs_exam">1.1.2 CS Exam (Professional) 2 points</td>
                    <td></td>
                    <td><input type="text" class="form-control input-field" name="cs_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="cs_exam"></td>
                    
                </tr>
                <tr>
                    <td class="bold-text" name="prof_growth">1.2 Professional Growth (Maximum Points - 80)</td>
                    <td>20</td>
                    <td><input type="text" class="form-control input-field" name="prof_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="prof_growth"></td>
                    
                </tr>
                <tr>
                    <td class="bold-text" name="adv_training">1.2.1 Advance Training</td>
                    <td></td>
                    <td><input type="text" class="form-control input-field" name="adv_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="adv_training"></td>
                    
                </tr>
                <tr>
                    <td name="ma">MA / MS - 1pt /6 units</td>
                    <td></td>
                    <td><input type="text" class="form-control input-field" name="ma_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="ma"></td>
                    
                </tr>
                <tr>
                    <td name="ma_so">MA / MS - + SO 40 points</td>
                    <td></td>
                    <td><input type="text" class="form-control input-field" name="ms_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="ma_so"></td>
                    
                </tr>
                <tr>
                    <td class="bold-text" name="seminars">1.2.2 Seminars (Maximum Points - 25)</td>
                    <td> </td>
                    <td><input type="text" class="form-control input-field" name="seminar_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="seminars"></td>
                    
                    
                </tr>
                <tr>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Attended &nbsp&nbsp&nbsp&nbsp Echoed  &nbsp&nbsp&nbsp&nbsp In Related Fields</td>
                    <td></td>
                    
                    <td><input type="text" class="form-control input-field"></td>
                    <td><input type="text" class="form-control input-field"></td>
                </tr>
                <tr>
                    <td name="sem_intrntl">International &nbsp&nbsp&nbsp&nbsp 2pts / 8 hrs &nbsp&nbsp&nbsp&nbsp  3pts / 8 hrs &nbsp&nbsp&nbsp&nbsp  1pt / 8 hrs</td>
                    <td><input type="text" class="form-control input-field" name=""></td>
                    <td><input type="text" class="form-control input-field" name="intnl_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="sem_intrntl"></td>
                    
                </tr>
                <tr>
                    <td name="sem_ntnl">National &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 1pt / 8 hrs &nbsp&nbsp&nbsp&nbsp 2pts  / 8 hrs &nbsp&nbsp&nbsp&nbsp 1/2pt / 8 hrs</td>
                    <td><input type="text" class="form-control input-field" name=""></td>
                    <td><input type="text" class="form-control input-field" name="natnl_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="sem_ntnl"></td>
                    
                </tr>
                <tr>
                    <td name="sem_rgnl">Regional &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 0.5pts/ 8 hrs &nbsp&nbsp&nbsp&nbsp 1pt / 8 hrs &nbsp&nbsp&nbsp&nbsp 1/4pt / 8 hrs</td>
                    <td><input type="text" class="form-control input-field" name=""></td>
                    <td><input type="text" class="form-control input-field" name="regnl_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="sem_rgnl"></td>
                    
                </tr>
                <tr>
                    <td name="sem_local">Local &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 0.25pts/ 8 hrs &nbsp&nbsp&nbsp&nbsp 0.5pt / 8 hrs &nbsp&nbsp&nbsp&nbsp 1/8pt / 8 hrs</td>
                    <td><input type="text" class="form-control input-field" name=""></td>
                    <td><input type="text" class="form-control input-field" name="local_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="sem_local"></td>
                    
                </tr>
                <tr>
                    <td class="bold-text" name="as_speaker">1.2.3 As Resource Speaker (Maximum Points - 15)</td>
                    <td></td>
                    
                    <td><input type="text" class="form-control input-field"></td>
                    <td><input type="text" class="form-control input-field"></td>
                </tr>
                <tr>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nat'l &nbsp&nbsp&nbsp&nbsp Reg'l/Prov'l &nbsp&nbsp&nbsp&nbsp Dist &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Sch.</td>
                    
                    <td><input type="text" class="form-control input-field"></td>
                    <td><input type="text" class="form-control input-field"></td>
                    <td><input type="text" class="form-control input-field"></td>
                </tr>
                <tr>
                    <td name="trainer">Trainer/day &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 10 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 8 
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 6 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 5</td>
                    <td><input type="text" class="form-control input-field"></td>
                    <td><input type="text" class="form-control input-field" name="trainr_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="trainer"></td>
                    
                </tr>
                <tr>
                    <td name="resource_spkr">Resource Speaker/Topic &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 8 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 6 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            5 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 3</td>
                    <td><input type="text" class="form-control input-field"></td>
                    <td><input type="text" class="form-control input-field" name="rsrc_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="resource_spkr"></td>
                    
                </tr>
                <tr>
                    <td name="faci">Facilitator/ Day  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 4  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 3 
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 2  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 1</td>
                    <td><input type="text" class="form-control input-field"></td>
                    <td><input type="text" class="form-control input-field" name="faci_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="faci"></td>
                    
                </tr>
                <tr>
                    <td class="bold-text" name="comp_cert">1.2.4 Completed Certificate of Proficiency (Maximum Points of 5 points)</td>
                    <td></td>
                    <td><input type="text" class="form-control input-field" name="cert_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="comp_cert"></td>
                    
                </tr>
                <tr>
                    <td class="bold-text" name="teach_exp">2. Teaching Experience</td>
                    <td>25</td>
                    <td>100</td>
                    <td><input type="text" class="form-control input-field" name="teach_exp"></td>
                    
                </tr>
                <tr>
                    <td name="stat_emp">2.1 Status of Employment (Maximum Points - 100)</td>
                    <td><input type="text" class="form-control input-field"></td>
                    <td><input type="text" class="form-control input-field" name="status_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="stat_emp"></td>
                    
                </tr>
                <tr>
                    <td name="fulltime">2.1.1 Full Time within DWCL (4pts/yr of service)</td>
                    <td><input type="text" class="form-control input-field"></td>
                    <td><input type="text" class="form-control input-field" name="fulltime_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="fulltime"></td>
                    
                </tr>
                <tr>
                    <td name="parttime">2.1.2 Part Time (Based on Subject Loading for 1 school year)</td>
                    <td><input type="text" class="form-control input-field"></td>
                    <td><input type="text" class="form-control input-field" name="parttime_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="parttime"></td>
                    
                </tr>
                <tr>
                    <td name="onetotwo">1-2 subjects 1pt/year</td>
                    <td><input type="text" class="form-control input-field"></td>
                    <td><input type="text" class="form-control input-field" name="onesubs_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="onetotwo"></td>
                    
                </tr>
                <tr>
                    <td name="threetofour">3-4 subjects 2 pts/year</td>
                    <td><input type="text" class="form-control input-field"></td>
                    <td><input type="text" class="form-control input-field" name="threesubs_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="threetofour"></td>
                    
                </tr>
                <tr>
                    <td name="outside">2.1.3 Outside DWCL 1pt/3yrs</td>
                    <td><input type="text" class="form-control input-field"></td>
                    <td><input type="text" class="form-control input-field" name="outside_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="outside"></td>
                    
                </tr>
                <tr>
                    <td class="bold-text" name="facult_perf">3. Faculty Performance Rating (Average Performance)</td>
                    <td>20</td>
                    <td>80</td>
                    <td><input type="text" class="form-control input-field" name="facult_perf"></td>
                    
                </tr>
                <tr>
                    <td name="mode">Mode for the last 3 year (Maximum Points - 80)</td>
                    <td>20</td>
                    <td><input type="text" class="form-control input-field" name="threeyrs_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="mode"></td>
                    
                </tr>
                <tr colspan="3">
                    <td rowspan="2">Criteria</td>
                    <td colspan="2">Weight</td>
                    <td colspan="3">Summary of Points</td>
                </tr>
                <tr>
                    
                    <td>%</td>
                    <td>Criteria Credit Points</td>
                    <td>SR</td>
                    
                </tr>
                <tr>
                    <td name="very_satisf">4.0 - 4.5 Very Satisfactory</td>
                    <td></td>
                    <td>60</td>
                    <td><input type="text" class="form-control input-field" name="very_satisf"></td>
                    
                </tr>
                <tr>
                    <td name="satisfy">3.6 - 3.9 Satisfactory</td>
                    <td></td>
                    <td>40</td>
                    <td><input type="text" class="form-control input-field" name="satisfy"></td>
                    
                </tr>
                <tr>
                    <td class="bold-text" name="comm_serv">4. Community Extension Services</td>
                    <td>10</td>
                    <td>40</td>
                    <td></td>
                    <td></td>
                    <td></td> 
                </tr>
                <tr>
                    <td name="prof_org">4.1 Professional Organizations, Societies, Civic, Social, Cultural,
                            Religious <br> Clubs, Groups, etc (Maximum Points - 20)
                    </td>
                    <td><input type="text" class="form-control input-field" name=""></td>
                    <td><input type="text" class="form-control input-field" name="org_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="prof_org"></td>
                    
                </tr>
                <tr>
                    <td name="prof_intrntnl">International</td>
                    <td>5 pts/org</td>
                    <td><input type="text" class="form-control input-field" name="interntl_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="prof_intrntnl"></td>
                    
                </tr>
                <tr>
                    <td name="prof_ntnl">National</td>
                    <td>4 pts/org</td>
                    <td><input type="text" class="form-control input-field" name="nationl_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="prof_ntnl"></td>
                    
                </tr>
                <tr>
                    <td name="prof_rgnl">Regional</td>
                    <td>3 pts/org</td>
                    <td><input type="text" class="form-control input-field" name="regionl_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="prof_rgnl"></td>
                    
                </tr>
                <tr>
                    <td name="prof_div">Division / Provincial School</td>
                    <td>1 pt/org</td>
                    <td><input type="text" class="form-control input-field" name="prvncl_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="prof_div"></td>
                    
                </tr>
                <tr>
                    <td>Additional 1 pt for Officership</td>
                    <td>Additional 1 pt for Life membership</td>
                    <td></td>
                    <td></td>
                
                </tr>
                <tr>
                    <td class="bold-text" name="services_rend">4.2 Services Rendered without renumeration from DWCL <br> (Maximum Points - 10)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                </tr>
                <tr>
                    <td name="coach">Coach, trainer, facilitator</td>
                    <td>0.5 pts / event</td>
                    <td><input type="text" class="form-control input-field" name="coach_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="coach"></td>
                    
                </tr>
                <tr>
                    <td name="area_chair">Area Chair - PAASCU</td>
                    <td>5 pts / visit</td>
                    <td><input type="text" class="form-control input-field" name="area_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="area_chair"></td>
                    
                </tr>
                <tr>
                    <td name="comm_mem">Committee Member - PAASCU</td>
                    <td>2 pts / visit</td>
                    <td><input type="text" class="form-control input-field" name="comm_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="comm_mem"></td>
                    
                </tr>
                <tr>
                    <td name="chair_other">Chairman in other school activities</td>
                    <td>3 pts / activity</td>
                    <td><input type="text" class="form-control input-field" name="chair_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="chair_other"></td>
                    
                </tr>
                <tr>
                    <td name="chair_otherSch">Chairman in other school activity</td>
                    <td>2 pts / activity</td>
                    <td><input type="text" class="form-control input-field" name="other_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="chair_otherSch"></td>
                    
                </tr>
                <tr>
                    <td name="mem_acad">Membership in Academic (Co and Extra Curricular Ad. Hoc, RTC, etc)</td>
                    <td>2 pts / yr</td>
                    <td><input type="text" class="form-control input-field" name="memb_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="mem_acad"></td>
                    
                </tr>
                <tr>
                    <td class="bold-text" name="awards">4.3 Awards, Citations, Plaques, Certificates</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                </tr>
                <tr>
                    <td name="awards_intrntnl">International</td>
                    <td>5 pts/ award</td>
                    <td><input type="text" class="form-control input-field" name="award_inter_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="awards_intrntnl"></td>
                    
                </tr>
                <tr>
                    <td name="awards_natnl">National</td>
                    <td>4 pts/ award</td>
                    <td><input type="text" class="form-control input-field" name="award_ntnl_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="awards_natnl"></td>
                    
                </tr>
                <tr>
                    <td name="awards_rgnl">Regional</td>
                    <td>2 pts/ award</td>
                    <td><input type="text" class="form-control input-field" name="award_regnl_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="awards_rgnl"></td>
                    
                </tr>
                <tr>
                    <td name="awards_div">Division / Provincial </td>
                    <td>1 pt/ award</td>
                    <td><input type="text" class="form-control input-field" name="div_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="awards_div"></td>
                    
                </tr>
                <tr>
                    <td class="bold-text" name="research_prod">RESEARCH PRODUCTIVITY (Excluding Theses & <br> Dissertations commisioned researches) </td>
                    <td>5</td>
                    <td>20</td>
                    <td></td>
                    
                </tr>
                <tr>
                    <td name="research_work">5.1 Research Work / Participation in research: Maximum of 20 points </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                </tr>
                <tr>
                    <td name="main_research">Main Researcher / Project Manager </td>
                    <td>5 pts</td>
                    <td><input type="text" class="form-control input-field" name="main_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="main_research"></td>
                    
                </tr>
                <tr>
                    <td name="co_research">Co-Researcher / Research or Statistic Consultant </td>
                    <td>3 pts</td>
                    <td><input type="text" class="form-control input-field" name="co_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="co_research"></td>
                    
                </tr>
                <tr>
                    <td name="enum">Enumerator/Interviewer/ Data Gatherer</td>
                    <td>1 pt</td>
                    <td><input type="text" class="form-control input-field" name="enum_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="enum"></td>
                    
                </tr>
                <tr>
                    <td name="research_lead">Research Leader </td>
                    <td>2 pt</td>
                    <td><input type="text" class="form-control input-field" name="lead_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="research_lead"></td>
                    
                </tr>
                <tr>
                    <td class="bold-text" name="research_out">Research output / report modules, kits, manuals, and other teaching <br> materials submitted
                : 5 - 20 points as recommended by the <br>Reviewing Committee </td>
                    <td><input type="text" class="form-control input-field"></td>
                    <td><input type="text" class="form-control input-field" name="report_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="research_out"></td>
                    
                </tr>
                <tr>
                    <td name="addtnl_five">Additional 5 points for the adoption of modules/kits </td>
                    <td><input type="text" class="form-control input-field"></td>
                    <td><input type="text" class="form-control input-field" name="add_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="addtnl_five"></td>
                    
                </tr>
                <tr>
                    <td name="pts">*Points to be equally shared by the group members  </td>
                    <td><input type="text" class="form-control input-field"></td>
                    <td><input type="text" class="form-control input-field" name="pts_cred_pts"></td>
                    <td><input type="text" class="form-control input-field" name="pts"></td>
                    
                </tr>
                <tr>
                    <td name="overall_crit">OVERALL CRITERIA  </td>
                    <td>100</td>
                    <td>400</td>
                    <td><input type="text" class="form-control input-field" name="overall_crit"></td>
                    
                </tr>
                <tr>
                    <td name="grand_total">GRAND TOTAL</td>
                    <td><input type="text" class="form-control input-field" id="grand_percent" name="grand_percent"></td>
                    <td><input type="text" class="form-control input-field" id="grand_cred_pts" name="grand_cred_pts"></td>
                    <td><input type="text" class="form-control input-field"  id="grand_sr" name="grand_total"></td>
                    
                </tr>
                <tr>
                    <td colspan="4"><input type="text" class="form-control" id="grand_total" name="grand_total" readonly></td>
               </tr>
            </tbody>
        </table>
    </div>

    <button type="submit" class="btn btn-primay" name="submit_basic_ed_sr">Submit Scores </button>

        </form>
   </div>
    
   <script>
        function calculateGrandTotal() {
           var inputs = document.querySelectorAll('.input-field');
           var total = 0;
            
           inputs.forEach(function(input) {
               if (!isNaN(parseFloat(input.value))) {
                    total += parseFloat(input.value);
                }
           });
            
           document.getElementById('grand_total').value = total.toFixed(2);
        }

        // Add event listeners to all input fields
        var inputs = document.querySelectorAll('.input-field');
        inputs.forEach(function(input) {
            input.addEventListener('change', calculateGrandTotal);
        });
    </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            
    </div>
</body>