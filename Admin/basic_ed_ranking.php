<?php 
//session_start();
/* include("includes/header.php"); 
 */include("../middleware/admin_middleware.php"); 


?>

<style>
.bold-text {
    font-weight: bold;
}
</style>
    
<body>

     <div class="wrapper">
          <?php 
               include("includes/header.php");
          ?>

<header class="cd__intro pt-5">
         <h1> Faculty Ranking for Basic Education</h1>
         <p> Criterias For Ranking Faculties in Basic Education</p>
      </header>
      
      <a href="edit_basiced_rubrics.php" class="btn btn-primary">Edit Rubrics</a>

      <div class="container">

      <?php

     ?>

      <form action="code.php" method="POST">
    <div class="container mt-5">
        <table class="table table-striped table-bordered">
       <thead class="table-dark">
                <tr>
                    <th>CRITERIA</th>
                    <th colspan="2">WEIGHT</th>
                    <th colspan="3">SUMMARY OF POINTS</th>
                    
                </tr>
                <tr>
                    <th></th>
                    <th>%</th>
                    <th>Criteria Credit Points</th>
                    <th>SR</th>
                    <th>DRC</th>                   
                    <th>BERTC</th>

                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bold-text" name="educ_attain">1. EDUCATIONAL ATTAINMENT
                         <input type="hidden" name="educ_attain" value="1. EDUCATIONAL ATTAINMENT">
                    </td>
                    <td name="educ_attain_weight" value="40">40
                         <input type="hidden" name="educ_attain_weight" value="40">
                    </td>
                    <td name="educ_attain_pts" value="160">160
                         <input type="hidden" name="educ_attain_pts" value="160">
                    </td>
                    <td><input type="text" class="form-control" name="educ_attain_sr"></td>
                    <td><input type="text" class="form-control" name="educ_attain_drc"></td>
                    <td><input type="text" class="form-control" name="educ_attain_bertc"></td>
                   
                </tr>
                <!-- Add more rows as needed -->
                <tr>
                    <td class="bold-text" name="degr_earned">1.1 Degrees Earned (Maximum points = 80)
                         <input type="hidden" name="degr_earned" value="1.1 Degrees Earned (Maximum points = 80)"> <!--add column to database  -->
                    </td>
                    <td name="deg_earned_weight">20
                         <input type="hidden" name="deg_earned_weight" value="20"> <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="deg_cred_pts"></td>
                    <td><input type="text" class="form-control" name="deg_sr"></td>
                    <td><input type="text" class="form-control" name="deg_drc"></td>
                    <td><input type="text" class="form-control" name="deg_bertc"></td>
                    
                </tr>
                <tr>
                    <td class="bold-text" name="bacc">1.1.1 Baccalaureate
                         <input type="hidden" name="bacc" value="1.1.1 Baccalaureate">     <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="bacc_weight"></td>       <!--add column to database  -->
                    <td><input type="text" class="form-control" name="bac_cred_pts"></td>
                    <td><input type="text" class="form-control" name="bac_sr"></td>
                    <td><input type="text" class="form-control" name="bac_drc"></td>
                    <td><input type="text" class="form-control" name="bac_bertc"></td>
                   
                </tr>
               <tr>
                    <td name="bseed">BSE / BSEED (or its equivalent)
                         <input type="hidden" name="bseed" value="BSE / BSEED (or its equivalent)">     <!--add column to database  -->
                    </td>
                    <td></td>
                    <td><input type="text" class="form-control" name="bse_cred_pts"></td>
                    <td><input type="text" class="form-control" name="bse_sr"></td>
                    <td><input type="text" class="form-control" name="bse_drc"></td>
                    <td><input type="text" class="form-control" name="bse_bertc"></td>
               </tr>
               <tr>
                    <td name="bsab">BS / AB + LET Passer 5 points
                         <input type="hidden" name="bsab" value="BS / AB + LET Passer 5 points">      <!--add column to database  -->
                    </td>
                    <td></td>
                    <td><input type="text" class="form-control" name="bs_cred_pts"></td>
                    <td><input type="text" class="form-control" name="bs_sr"></td>
                    <td><input type="text" class="form-control" name="bs_drc"></td>
                    <td><input type="text" class="form-control" name="bs_bertc"></td>
               </tr>
               <tr>
                    <td class="bold-text" name="csexam">1.1.2 CS Exam (Professional) 2 points
                         <input type="hidden" name="csexam" value="1.1.2 CS Exam (Professional) 2 points">   <!--add column to database  -->
                    </td>
                    <td></td>
                    <td><input type="text" class="form-control" name="cs_cred_pts"></td>
                    <td><input type="text" class="form-control" name="cs_sr"></td>
                    <td><input type="text" class="form-control" name="cs_drc"></td>
                    <td><input type="text" class="form-control" name="cs_bertc"></td>
               </tr>
               <tr>
                    <td class="bold-text" name="prof_growth">1.2 Professional Growth (Maximum Points - 80)
                         <input type="hidden" name="prof_growth" value="1.2 Professional Growth (Maximum Points - 80)">   <!--add column to database  -->
                    </td>
                    <td>20
                         <input type="hidden" name="prof_growth_weight" value="20">   <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="prof_cred_pts"></td>
                    <td><input type="text" class="form-control" name="prof_sr"></td>
                    <td><input type="text" class="form-control" name="prof_drc"></td>
                    <td><input type="text" class="form-control" name="prof_bertc"></td>
               </tr>
               <tr>
                    <td class="bold-text" name="adv_train">1.2.1 Advance Training
                         <input type="hidden" name="adv_train" value="1.2.1 Advance Training">   <!--add column to database  -->
                    </td>
                    <td></td>
                    <td><input type="text" class="form-control" name="adv_cred_pts"></td>
                    <td><input type="text" class="form-control" name="adv_sr"></td>
                    <td><input type="text" class="form-control" name="adv_drc"></td>
                    <td><input type="text" class="form-control" name="adv_bertc"></td>
               </tr>
               <tr>
                    <td>MA / MS - 1pt /6 units
                         <input type="hidden" name="mams" value="MA / MS - 1pt /6 units">   <!--add column to database  -->
                    </td>
                    <td></td>
                    <td><input type="text" class="form-control" name="ma_cred_pts"></td>
                    <td><input type="text" class="form-control" name="ma_sr"></td>
                    <td><input type="text" class="form-control" name="ma_drc"></td>
                    <td><input type="text" class="form-control" name="ma_bertc"></td>
               </tr>
               <tr>
                    <td>MA / MS - + SO 40 points
                         <input type="hidden" name="mamsso" value="MA / MS - + SO 40 points">   <!--add column to database  -->
                    </td>
                    <td></td>
                    <td><input type="text" class="form-control" name="ms_cred_pts"></td>
                    <td><input type="text" class="form-control" name="ms_sr"></td>
                    <td><input type="text" class="form-control" name="ms_drc"></td>
                    <td><input type="text" class="form-control" name="ms_bertc"></td>
               </tr>
               <tr>
                    <td class="bold-text">1.2.2 Seminars (Maximum Points - 25)
                         <input type="hidden" name="seminars" value="1.2.2 Seminars (Maximum Points - 25)">   <!--add column to database  -->
                    </td>
                    <td> </td>
                    <td><input type="text" class="form-control" name="seminar_cred_pts"></td>
                    <td><input type="text" class="form-control" name="seminar_sr"></td>
                    <td><input type="text" class="form-control" name="seminar_drc"></td>
                    <td><input type="text" class="form-control" name="seminar_bertc"></td>
                    
               </tr>
               <tr>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          Attended &nbsp&nbsp&nbsp&nbsp Echoed  &nbsp&nbsp&nbsp&nbsp In Related Fields</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>International &nbsp&nbsp&nbsp&nbsp 2pts / 8 hrs &nbsp&nbsp&nbsp&nbsp  3pts / 8 hrs &nbsp&nbsp&nbsp&nbsp  1pt / 8 hrs
                         <input type="hidden" name="intrnl_sem" value="International  2pts / 8 hrs 3pts / 8 hrs 1pt / 8 hrs">   <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name=""></td>
                    <td><input type="text" class="form-control" name="intnl_cred_pts"></td>
                    <td><input type="text" class="form-control" name="intnl_sr"></td>
                    <td><input type="text" class="form-control" name="intnl_drc"></td>
                    <td><input type="text" class="form-control" name="intnl_bertc"></td>
               </tr>
               <tr>
                    <td>National &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 1pt / 8 hrs &nbsp&nbsp&nbsp&nbsp 2pts  / 8 hrs &nbsp&nbsp&nbsp&nbsp 1/2pt / 8 hrs
                         <input type="hidden" name="ntnl_sem" value="National 1pt / 8 hrs 2pts  / 8 hrs 1/2pt / 8 hrs">   <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name=""></td>
                    <td><input type="text" class="form-control" name="natnl_cred_pts"></td>
                    <td><input type="text" class="form-control" name="natnl_sr"></td>
                    <td><input type="text" class="form-control" name="natnl_drc"></td>
                    <td><input type="text" class="form-control" name="natnl_bertc"></td>
               </tr>
               <tr>
                    <td>Regional &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 0.5pts/ 8 hrs &nbsp&nbsp&nbsp&nbsp 1pt / 8 hrs &nbsp&nbsp&nbsp&nbsp 1/4pt / 8 hrs
                         <input type="hidden" name="regnl_sem" value="Regional 0.5pts/ 8 hrs 1pt / 8 hrs 1/4pt / 8 hrs">   <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name=""></td>
                    <td><input type="text" class="form-control" name="regnl_cred_pts"></td>
                    <td><input type="text" class="form-control" name="regnl_sr"></td>
                    <td><input type="text" class="form-control" name="regnl_drc"></td>
                    <td><input type="text" class="form-control" name="regnl_bertc"></td>
               </tr>
               <tr>
                    <td>Local &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 0.25pts/ 8 hrs &nbsp&nbsp&nbsp&nbsp 0.5pt / 8 hrs &nbsp&nbsp&nbsp&nbsp 1/8pt / 8 hrs
                         <input type="hidden" name="local_sem" value="Local 0.25pts/ 8 hrs 0.5pt / 8 hrs 1/8pt / 8 hrs">   <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name=""></td>
                    <td><input type="text" class="form-control" name="local_cred_pts"></td>
                    <td><input type="text" class="form-control" name="local_sr"></td>
                    <td><input type="text" class="form-control" name="local_drc"></td>
                    <td><input type="text" class="form-control" name="local_bertc"></td>
               </tr>
               <tr>
                    <td class="bold-text">1.2.3 As Resource Speaker (Maximum Points - 15)
                         <input type="hidden" name="resource_speaker" value="1.2.3 As Resource Speaker (Maximum Points - 15)">   <!--add column to database  -->
                    </td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nat'l &nbsp&nbsp&nbsp&nbsp Reg'l/Prov'l &nbsp&nbsp&nbsp&nbsp Dist &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Sch.
                    <input type="hidden" name="natl" value="Nat'l Regl Provl Dist Sch.">   <!--add column to database  -->
               </td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Trainer/day &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 10 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 8 
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 6 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 5
                    <input type="hidden" name="trainer_day" value="Trainer day 10 8 6 5">   <!--add column to database  -->
               </td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="trainr_cred_pts"></td>
                    <td><input type="text" class="form-control" name="trainr_sr"></td>
                    <td><input type="text" class="form-control" name="trainr_drc"></td>
                    <td><input type="text" class="form-control" name="trainr_bertc"></td>
               </tr>
               <tr>
                    <td>Resource Speaker/Topic &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 8 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 6 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                         5 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 3
                         <input type="hidden" name="resource_speak" value="Resource Speaker/Topic 8 6 5 3">   <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="rsrc_cred_pts"></td>
                    <td><input type="text" class="form-control" name="rsrc_sr"></td>
                    <td><input type="text" class="form-control" name="rsrc_drc"></td>
                    <td><input type="text" class="form-control" name="rsrc_bertc"></td>
               </tr>
               <tr>
                    <td>Facilitator/ Day  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 4  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 3 
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 2  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 1
                    <input type="hidden" name="faci" value="Facilitator/ Day 4 3 2 1">   <!--add column to database  -->
               </td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="faci_cred_pts"></td>
                    <td><input type="text" class="form-control" name="faci_sr"></td>
                    <td><input type="text" class="form-control" name="faci_drc"></td>
                    <td><input type="text" class="form-control" name="faci_bertc"></td>
               </tr>
               <tr>
                    <td class="bold-text">1.2.4 Completed Certificate of Proficiency (Maximum Points of 5 points)
                         <input type="hidden" name="completed_cert" value="1.2.4 Completed Certificate of Proficiency (Maximum Points of 5 points)">   <!--add column to database  -->
                    </td>
                    <td></td>
                    <td><input type="text" class="form-control" name="cert_cred_pts"></td>
                    <td><input type="text" class="form-control" name="cert_sr"></td>
                    <td><input type="text" class="form-control" name="cert_drc"></td>
                    <td><input type="text" class="form-control" name="cert_bertc"></td>
               </tr>
               <tr>
                    <td class="bold-text">2. Teaching Experience
                         <input type="hidden" name="teach_exp" value="2. Teaching Experience">   <!--add column to database  -->
                    </td>
                    <td name="teach_exp_weight" value="25">25
                         <input type="hidden" name="teach_exp_weight" value="25"> <!--add column to database  -->
                    </td>
                    <td name="teach_exp_credpts" value="100">100
                         <input type="hidden" name="teach_exp_credpts" value="100"> <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="teach_sr"></td>
                    <td><input type="text" class="form-control" name="teach_drc"></td>
                    <td><input type="text" class="form-control" name="teach_bertc"></td>
               </tr>
               <tr>
                    <td>2.1 Status of Employment (Maximum Points - 100)
                         <input type="hidden" name="emp_stat" value="2.1 Status of Employment (Maximum Points - 100)">   <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="status_cred_pts"></td>
                    <td><input type="text" class="form-control" name="status_sr"></td>
                    <td><input type="text" class="form-control" name="status_drc"></td>
                    <td><input type="text" class="form-control" name="status_bertc"></td>
               </tr>
               <tr>
                    <td>2.1.1 Full Time within DWCL (4pts/yr of service)
                         <input type="hidden" name="full_time" value="2.1.1 Full Time within DWCL (4pts/yr of service)">   <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="fulltime_cred_pts"></td>
                    <td><input type="text" class="form-control" name="fulltime_sr"></td>
                    <td><input type="text" class="form-control" name="fulltime_drc"></td>
                    <td><input type="text" class="form-control" name="fulltime_bertc"></td>
               </tr>
               <tr>
                    <td>2.1.2 Part Time (Based on Subject Loading for 1 school year)
                         <input type="hidden" name="part_time" value="2.1.2 Part Time (Based on Subject Loading for 1 school year)">   <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="parttime_cred_pts"></td>
                    <td><input type="text" class="form-control" name="parttime_sr"></td>
                    <td><input type="text" class="form-control" name="parttime_drc"></td>
                    <td><input type="text" class="form-control" name="parttime_bertc"></td>
               </tr>
               <tr>
                    <td>1-2 subjects 1pt/year
                         <input type="hidden" name="onesubs" value="1-2 subjects 1pt/year">   <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="onesubs_cred_pts"></td>
                    <td><input type="text" class="form-control" name="onesubs_sr"></td>
                    <td><input type="text" class="form-control" name="onesubs_drc"></td>
                    <td><input type="text" class="form-control" name="onesubs_bertc"></td>
               </tr>
               <tr>
                    <td>3-4 subjects 2 pts/year
                         <input type="hidden" name="threesubs" value="3-4 subjects 2 pts/year">   <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="threesubs_cred_pts"></td>
                    <td><input type="text" class="form-control" name="threesubs_sr"></td>
                    <td><input type="text" class="form-control" name="threesubs_drc"></td>
                    <td><input type="text" class="form-control" name="threesubs_bertc"></td>
               </tr>
               <tr>
                    <td>2.1.3 Outside DWCL 1pt/3yrs
                         <input type="hidden" name="outside" value="2.1.3 Outside DWCL 1pt/3yrs">   <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="outside_cred_pts"></td>
                    <td><input type="text" class="form-control" name="outside_sr"></td>
                    <td><input type="text" class="form-control" name="outside_drc"></td>
                    <td><input type="text" class="form-control" name="outside_bertc"></td>
               </tr>
               <tr>
                    <td class="bold-text">3. Faculty Performance Rating (Average Performance)
                         <input type="hidden" name="faculty_perf" value="3. Faculty Performance Rating (Average Performance)">   <!--add column to database  -->
                    </td>
                    <td name="facult_perf_weight" value="20">20
                         <input type="hidden" name="facult_perf_weight" value="20">  <!--add column to database  -->
                    </td>
                    <td name="facult_perf_credpts" value="80">80
                         <input type="hidden" name="facult_perf_credpts" value="80">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="faculty_sr"></td>
                    <td><input type="text" class="form-control" name="faculty_drc"></td>
                    <td><input type="text" class="form-control" name="faculty_bertc"></td>
               </tr>
               <tr>
                    <td>Mode for the last 3 year (Maximum Points - 80)
                         <input type="hidden" name="threeyrs" value="Mode for the last 3 year (Maximum Points - 80)">   <!--add column to database  -->
                    </td>
                    <td name="threeyrs_weight" value="20">20
                         <input type="hidden" name="threeyrs_weight" value="20">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="threeyrs_cred_pts"></td>
                    <td><input type="text" class="form-control" name="threeyrs_sr"></td>
                    <td><input type="text" class="form-control" name="threeyrs_drc"></td>
                    <td><input type="text" class="form-control" name="threeyrs_bertc"></td>
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
                    <td>DRC</td>
                    <td>BERTC</td>
               </tr>
               <tr>
                    <td>4.0 - 4.5 Very Satisfactory
                         <input type="hidden" name="very_satisf" value="4.0 - 4.5 Very Satisfactory">   <!--add column to database  -->
                    </td>
                    <td></td>
                    <td name="very_satisf_credpts" value="60">60
                         <input type="hidden" name="very_satisf_credpts" value="60">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="very_sr"></td>
                    <td><input type="text" class="form-control" name="very_drc"></td>
                    <td><input type="text" class="form-control" name="very_bertc"></td>
               </tr>
               <tr>
                    <td>3.6 - 3.9 Satisfactory
                         <input type="hidden" name="satisf" value="3.6 - 3.9 Satisfactory">   <!--add column to database  -->
                    </td>
                    <td></td>
                    <td name="satisf_credpts" value="40">40
                         <input type="hidden" name="satisf_credpts" value="40">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="satisf_sr"></td>
                    <td><input type="text" class="form-control" name="satisf_drc"></td>
                    <td><input type="text" class="form-control" name="satisf_bertc"></td>
               </tr>
               <tr>
                    <td class="bold-text">4. Community Extension Services
                         <input type="hidden" name="comm_ext" value="4. Community Extension Services">  <!--add column to database  -->
                    </td>
                    <td name="comm_ext_weight" value="10">10
                         <input type="hidden" name="comm_ext_weight" value="10">  <!--add column to database  -->
                    </td>
                    <td name="comm_ext_credpts" value="40">40
                         <input type="hidden" name="comm_ext_credpts" value="40">  <!--add column to database  -->
                    </td>
                    <td></td>
                    <td></td>
                    <td></td> 
               </tr>
               <tr>
                    <td>4.1 Professional Organizations, Societies, Civic, Social, Cultural,
                         Religious <br> Clubs, Groups, etc (Maximum Points - 20)
                         <input type="hidden" name="prof_org" value="4.1 Professional Organizations, Societies, Civic, Social, Cultural,
                         Religious Clubs, Groups, etc (Maximum Points - 20)">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="org_cred_weight"></td>   <!--add column to database  -->
                    <td><input type="text" class="form-control" name="org_cred_pts"></td>
                    <td><input type="text" class="form-control" name="org_sr"></td>
                    <td><input type="text" class="form-control" name="org_drc"></td>
                    <td><input type="text" class="form-control" name="org_bertc"></td>
               </tr>
               <tr>
                    <td>International
                         <input type="hidden" name="international" value="International">  <!--add column to database  -->
                    </td>
                    <td>5 pts/org
                         <input type="hidden" name="5pts" value="5 pts/org">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="interntl_cred_pts"></td>
                    <td><input type="text" class="form-control" name="interntl_sr"></td>
                    <td><input type="text" class="form-control" name="interntl_drc"></td>
                    <td><input type="text" class="form-control" name="interntl_bertc"></td>
               </tr>
               <tr>
                    <td>National
                         <input type="hidden" name="national" value="National">  <!--add column to database  -->
                    </td>
                    <td>4 pts/org
                         <input type="hidden" name="4pts" value="4 pts/org">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="nationl_cred_pts"></td>
                    <td><input type="text" class="form-control" name="nationl_sr"></td>
                    <td><input type="text" class="form-control" name="nationl_drc"></td>
                    <td><input type="text" class="form-control" name="nationl_bertc"></td>
               </tr>
               <tr>
                    <td>Regional
                         <input type="hidden" name="regional" value="Regional">  <!--add column to database  -->
                    </td>
                    <td>3 pts/org
                         <input type="hidden" name="3pts" value="3 pts/org">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="regionl_cred_pts"></td>
                    <td><input type="text" class="form-control" name="regionl_sr"></td>
                    <td><input type="text" class="form-control" name="regionl_drc"></td>
                    <td><input type="text" class="form-control" name="regionl_bertc"></td>
               </tr>
               <tr>
                    <td>Division / Provincial School
                         <input type="hidden" name="division" value="Division / Provincial School">  <!--add column to database  -->
                    </td>
                    <td>1 pt/org
                       <input type="hidden" name="1pt" value="1 pt/org">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="prvncl_cred_pts"></td>
                    <td><input type="text" class="form-control" name="prvncl_sr"></td>
                    <td><input type="text" class="form-control" name="prvncl_drc"></td>
                    <td><input type="text" class="form-control" name="prvncl_bertc"></td>
               </tr>
               <tr>
                    <td>Additional 1 pt for Officership
                         <input type="hidden" name="officership" value="Additional 1 pt for Officership">  <!--add column to database  -->
                    </td>
                    <td>Additional 1 pt for Life membership
                         <input type="hidden" name="membership" value="Additional 1 pt for Life membership">  <!--add column to database  -->
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td class="bold-text">4.2 Services Rendered without renumeration from DWCL <br> (Maximum Points - 10)
                         <input type="hidden" name="rendered" value="4.2 Services Rendered without renumeration from DWCL (Maximum Points - 10)">  <!--add column to database  -->
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>Coach, trainer, facilitator
                         <input type="hidden" name="coach" value="Coach, trainer, facilitator">  <!--add column to database  -->
                    </td>
                    <td>0.5 pts / event
                         <input type="hidden" name="pointfive" value="0.5 pts / event">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="coach_cred_pts"></td>
                    <td><input type="text" class="form-control" name="coach_sr"></td>
                    <td><input type="text" class="form-control" name="coach_drc"></td>
                    <td><input type="text" class="form-control" name="coach_bertc"></td>
               </tr>
               <tr>
                    <td>Area Chair - PAASCU
                         <input type="hidden" name="area_chair" value="Area Chair - PAASCU">  <!--add column to database  -->
                    </td>
                    <td>5 pts / visit
                         <input type="hidden" name="5pts_visit" value="5 pts / visit">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="area_cred_pts"></td>
                    <td><input type="text" class="form-control" name="area_sr"></td>
                    <td><input type="text" class="form-control" name="area_drc"></td>
                    <td><input type="text" class="form-control" name="area_bertc"></td>
               </tr>
               <tr>
                    <td>Committee Member - PAASCU
                         <input type="hidden" name="committee_member" value="Committee Member - PAASCU">  <!--add column to database  -->
                    </td>
                    <td>2 pts / visit
                         <input type="hidden" name="2pts_visit" value="2 pts / visit">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="comm_cred_pts"></td>
                    <td><input type="text" class="form-control" name="comm_sr"></td>
                    <td><input type="text" class="form-control" name="comm_drc"></td>
                    <td><input type="text" class="form-control" name="comm_bertc"></td>
               </tr>
               <tr>
                    <td>Chairman in other school activities
                         <input type="hidden" name="chairman" value="Chairman in other school activities">  <!--add column to database  -->
                    </td>
                    <td>3 pts / activity
                         <input type="hidden" name="3pts_act" value="3 pts / activity">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="chair_cred_pts"></td>
                    <td><input type="text" class="form-control" name="chair_sr"></td>
                    <td><input type="text" class="form-control" name="chair_drc"></td>
                    <td><input type="text" class="form-control" name="chair_bertc"></td>
               </tr>
               <tr>
                    <td>Chairman in other school activity
                         <input type="hidden" name="other_act" value="Chairman in other school activity">  <!--add column to database  -->
                    </td>
                    <td>2 pts / activity
                         <input type="hidden" name="2pts_act" value="2 pts / activity">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="other_cred_pts"></td>
                    <td><input type="text" class="form-control" name="other_sr"></td>
                    <td><input type="text" class="form-control" name="other_drc"></td>
                    <td><input type="text" class="form-control" name="other_bertc"></td>
               </tr>
               <tr>
                    <td>Membership in Academic (Co and Extra Curricular Ad. Hoc, RTC, etc)
                         <input type="hidden" name="membership_acad" value="Membership in Academic (Co and Extra Curricular Ad. Hoc, RTC, etc)">  <!--add column to database  -->
                    </td>
                    <td>2 pts / yr
                         <input type="hidden" name="2pts_yr" value="2 pts / yr">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="memb_cred_pts"></td>
                    <td><input type="text" class="form-control" name="memb_sr"></td>
                    <td><input type="text" class="form-control" name="memb_drc"></td>
                    <td><input type="text" class="form-control" name="memb_bertc"></td>
               </tr>
               <tr>
                    <td class="bold-text">4.3 Awards, Citations, Plaques, Certificates
                         <input type="hidden" name="awards_citations" value="4.3 Awards, Citations, Plaques, Certificates">  <!--add column to database  -->
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>International
                         <input type="hidden" name="international_awards" value="International">  <!--add column to database  -->
                    </td>
                    <td>5 pts/ award
                         <input type="hidden" name="5pts_award" value="5 pts/ award">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="award_inter_cred_pts"></td>
                    <td><input type="text" class="form-control" name="award_inter_sr"></td>
                    <td><input type="text" class="form-control" name="award_inter_drc"></td>
                    <td><input type="text" class="form-control" name="award_inter_bertc"></td>
               </tr>
               <tr>
                    <td>National
                         <input type="hidden" name="national_awards" value="National">  <!--add column to database  -->
                    </td>
                    <td>4 pts/ award
                         <input type="hidden" name="4pts_award" value="4 pts/ award">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="award_ntnl_cred_pts"></td>
                    <td><input type="text" class="form-control" name="award_ntnl_sr"></td>
                    <td><input type="text" class="form-control" name="award_ntnl_drc"></td>
                    <td><input type="text" class="form-control" name="award_ntnl_bertc"></td>
               </tr>
               <tr>
                    <td>Regional
                         <input type="hidden" name="regional_award" value="Regional">  <!--add column to database  -->
                    </td>
                    <td>2 pts/ award
                         <input type="hidden" name="2pts_award" value="2 pts/ award">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="award_regnl_cred_pts"></td>
                    <td><input type="text" class="form-control" name="award_regnl_sr"></td>
                    <td><input type="text" class="form-control" name="award_regnl_drc"></td>
                    <td><input type="text" class="form-control" name="award_regnl_bertc"></td>
               </tr>
               <tr>
                    <td>Division / Provincial 
                         <input type="hidden" name="division_provincial" value="Division / Provincial ">  <!--add column to database  --> <!--not yet inserted into database  -->
                    </td>
                    <td>1 pt/ award
                         <input type="hidden" name="1pt_award" value="1 pt/ award">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="div_cred_pts"></td>
                    <td><input type="text" class="form-control" name="div_sr"></td>
                    <td><input type="text" class="form-control" name="div_drc"></td>
                    <td><input type="text" class="form-control" name="div_bertc"></td>
               </tr>
               <tr>
                    <td class="bold-text">RESEARCH PRODUCTIVITY (Excluding Theses & <br> Dissertations commisioned researches) 
                         <input type="hidden" name="research_productivty" value="RESEARCH PRODUCTIVITY (Excluding Theses & Dissertations commisioned researches)">  <!--add column to database  -->
                    </td>
                    <td>5
                         <input type="hidden" name="research_weight" value="5">  <!--add column to database  -->
                    </td>
                    <td>20
                         <input type="hidden" name="research_credpts" value="20">  <!--add column to database  -->
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>5.1 Research Work / Participation in research: Maximum of 20 points
                         <input type="hidden" name="research_participation" value="5.1 Research Work / Participation in research: Maximum of 20 points">  <!--add column to database  -->
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>Main Researcher / Project Manager 
                         <input type="hidden" name="main_researcher" value="Main Researcher / Project Manager ">  <!--add column to database  -->
                    </td>
                    <td>5 pts
                         <input type="hidden" name="main_weight" value="5 pts">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="main_cred_pts"></td>
                    <td><input type="text" class="form-control" name="main_sr"></td>
                    <td><input type="text" class="form-control" name="main_drc"></td>
                    <td><input type="text" class="form-control" name="main_bertc"></td>
               </tr>
               <tr>
                    <td>Co-Researcher / Research or Statistic Consultant 
                         <input type="hidden" name="co_researcher" value="Co-Researcher / Research or Statistic Consultant ">  <!--add column to database  -->
                    </td>
                    <td>3 pts
                         <input type="hidden" name="co_researcher_weight" value="3 pts">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="co_cred_pts"></td>
                    <td><input type="text" class="form-control" name="co_sr"></td>
                    <td><input type="text" class="form-control" name="co_drc"></td>
                    <td><input type="text" class="form-control" name="co_bertc"></td>
               </tr>
               <tr>
                    <td>Enumerator/Interviewer/ Data Gatherer
                         <input type="hidden" name="enumerator" value="Enumerator/Interviewer/ Data Gatherer">  <!--add column to database  -->
                    </td>
                    <td>1 pt
                         <input type="hidden" name="enumerator_weight" value="1 pt">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="enum_cred_pts"></td>
                    <td><input type="text" class="form-control" name="enum_sr"></td>
                    <td><input type="text" class="form-control" name="enum_drc"></td>
                    <td><input type="text" class="form-control" name="enum_bertc"></td>
               </tr>
               <tr>
                    <td>Research Leader 
                         <input type="hidden" name="research_lead" value="Research Leader">  <!--add column to database  -->
                    </td>
                    <td>2 pt
                         <input type="hidden" name="research_lead_weight" value="2 pt">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control" name="lead_cred_pts"></td>
                    <td><input type="text" class="form-control" name="lead_sr"></td>
                    <td><input type="text" class="form-control" name="lead_drc"></td>
                    <td><input type="text" class="form-control" name="lead_bertc"></td>
               </tr>
               <tr>
                    <td class="bold-text">Research output / report modules, kits, manuals, and other teaching <br> materials submitted
               : 5 - 20 points as recommended by the <br>Reviewing Committee 
                         <input type="hidden" name="research_output" value="Research output / report modules, kits, manuals, and other teaching materials submitted
               : 5 - 20 points as recommended by the <br>Reviewing Committee ">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="report_cred_pts"></td>
                    <td><input type="text" class="form-control" name="report_sr"></td>
                    <td><input type="text" class="form-control" name="report_drc"></td>
                    <td><input type="text" class="form-control" name="report_bertc"></td>
               </tr>
               <tr>
                    <td>Additional 5 points for the adoption of modules/kits 
                         <input type="hidden" name="addtnl_pts" value="Additional 5 points for the adoption of modules/kits ">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="add_cred_pts"></td>
                    <td><input type="text" class="form-control" name="add_sr"></td>
                    <td><input type="text" class="form-control" name="add_drc"></td>
                    <td><input type="text" class="form-control" name="add_bertc"></td>
               </tr>
               <tr>
                    <td>*Points to be equally shared by the group members  
                         <input type="hidden" name="pts_equally" value="*Points to be equally shared by the group members">  <!--add column to database  -->
                    </td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name=""></td>
                    <td><input type="text" class="form-control" name="pts_cred_pts"></td>
                    <e><input type="text" class="form-control" name="pts_sr"></e>
                    <td><input type="text" class="form-control" name="pts_drc"></td>
                    <td><input type="text" class="form-control" name="pts_bertc"></td>
               </tr>
               <tr>
                    <td>OVERALL CRITERIA  </td>
                    <td>100</td>
                    <td>400</td>
                    <td><input type="text" class="form-control" name="overall_sr"></td>
                    <td><input type="text" class="form-control" name="overall_drc"></td>
                    <td><input type="text" class="form-control" name="overall_bertc"></td>
               </tr>
               <tr>
                    <td>GRAND TOTAL</td>
                    <td><input type="text" class="form-control" name="grand_percent"></td>
                    <td><input type="text" class="form-control" name="grand_cred_pts"></td>
                    <td><input type="text" class="form-control" name="grand_sr"></td>
                    <td><input type="text" class="form-control" name="grand_drc"></td>
                    <td><input type="text" class="form-control" name="grand_bertc"></td>
               </tr>

            </tbody>
        </table>
        
        <h2>LEGEND:</h2>
          <h3>SR</h3><p>Self Rating </p>
          <h3>DRC</h3><p>Department Ranking Committee</p>
          <h3>BERTC</h3><p>Basic Education Rank and Tenure Council</p>
    </div>

    <button class="btn btn-primary" name="submit_basic_ed_score">Submit Scores</button>
    </form>
   
           
      </div>
     </div>
     

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>