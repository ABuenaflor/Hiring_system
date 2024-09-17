<?php
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" >

    <!-- alertify CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>

    <style>
      .form-control{
        border: 1px solid #b3a1a1 !important;
        padding: 8px 10px;
      }
      .bold-text {
    font-weight: bold;
}
    </style>
  </head>
    
<body>
    <div class="wrapper">
       
        <header class="cd__intro pt-5">
         <h1> Faculty Ranking for Basic Education</h1>
         <p> Criterias For Ranking Faculties in Basic Education</p>
      </header>
<form action="code.php" method="POST">
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
                    <td><input type="text" class="form-control" name="educ_attain_sr"></td>
              
                   
                </tr>
                <!-- Add more rows as needed -->
                <tr>
                    <td class="bold-text">1.1 Degrees Earned (Maximum points = 80)</td>
                    <td>20</td>
                    <td><input type="text" class="form-control" name="deg_cred_pts"></td>
                    <td><input type="text" class="form-control" name="deg_sr"></td>
               
                    
                </tr>
                <tr>
                    <td class="bold-text">1.1.1 Baccalaureate</td>
                    <td><input type="text" class="form-control" name=""></td>
                    <td><input type="text" class="form-control" name="bac_cred_pts"></td>
                    <td><input type="text" class="form-control" name="bac_sr"></td>
                
                   
                </tr>
               <tr>
                    <td>BSE / BSEED (or its equivalent)</td>
                    <td></td>
                    <td><input type="text" class="form-control" name="bse_cred_pts"></td>
                    <td><input type="text" class="form-control" name="bse_sr"></td>
                   
               <tr>
                    <td>BS / AB + LET Passer 5 points</td>
                    <td></td>
                    <td><input type="text" class="form-control" name="bs_cred_pts"></td>
                    <td><input type="text" class="form-control" name="bs_sr"></td>
                   
               </tr>
               <tr>
                    <td class="bold-text">1.1.2 CS Exam (Professional) 2 points</td>
                    <td></td>
                    <td><input type="text" class="form-control" name="cs_cred_pts"></td>
                    <td><input type="text" class="form-control" name="cs_sr"></td>
                   
               </tr>
               <tr>
                    <td class="bold-text">1.2 Professional Growth (Maximum Points - 80)</td>
                    <td>20</td>
                    <td><input type="text" class="form-control" name="prof_cred_pts"></td>
                    <td><input type="text" class="form-control" name="prof_sr"></td>
                  
               </tr>
               <tr>
                    <td class="bold-text">1.2.1 Advance Training</td>
                    <td></td>
                    <td><input type="text" class="form-control" name="adv_cred_pts"></td>
                    <td><input type="text" class="form-control" name="adv_sr"></td>
                   
               </tr>
               <tr>
                    <td>MA / MS - 1pt /6 units</td>
                    <td></td>
                    <td><input type="text" class="form-control" name="ma_cred_pts"></td>
                    <td><input type="text" class="form-control" name="ma_sr"></td>
                  
               </tr>
               <tr>
                    <td>MA / MS - + SO 40 points</td>
                    <td></td>
                    <td><input type="text" class="form-control" name="ms_cred_pts"></td>
                    <td><input type="text" class="form-control" name="ms_sr"></td>
                   
               </tr>
               <tr>
                    <td class="bold-text">1.2.2 Seminars (Maximum Points - 25)</td>
                    <td> </td>
                    <td><input type="text" class="form-control" name="seminar_cred_pts"></td>
                    <td><input type="text" class="form-control" name="seminar_sr"></td>
                   
                    
               </tr>
               <tr>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          Attended &nbsp&nbsp&nbsp&nbsp Echoed  &nbsp&nbsp&nbsp&nbsp In Related Fields</td>
                    <td></td>
                    
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>International &nbsp&nbsp&nbsp&nbsp 2pts / 8 hrs &nbsp&nbsp&nbsp&nbsp  3pts / 8 hrs &nbsp&nbsp&nbsp&nbsp  1pt / 8 hrs</td>
                    <td><input type="text" class="form-control" name=""></td>
                    <td><input type="text" class="form-control" name="intnl_cred_pts"></td>
                    <td><input type="text" class="form-control" name="intnl_sr"></td>
                  
               </tr>
               <tr>
                    <td>National &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 1pt / 8 hrs &nbsp&nbsp&nbsp&nbsp 2pts  / 8 hrs &nbsp&nbsp&nbsp&nbsp 1/2pt / 8 hrs</td>
                    <td><input type="text" class="form-control" name=""></td>
                    <td><input type="text" class="form-control" name="natnl_cred_pts"></td>
                    <td><input type="text" class="form-control" name="natnl_sr"></td>
                  
               </tr>
               <tr>
                    <td>Regional &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 0.5pts/ 8 hrs &nbsp&nbsp&nbsp&nbsp 1pt / 8 hrs &nbsp&nbsp&nbsp&nbsp 1/4pt / 8 hrs</td>
                    <td><input type="text" class="form-control" name=""></td>
                    <td><input type="text" class="form-control" name="regnl_cred_pts"></td>
                    <td><input type="text" class="form-control" name="regnl_sr"></td>
                  
               </tr>
               <tr>
                    <td>Local &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 0.25pts/ 8 hrs &nbsp&nbsp&nbsp&nbsp 0.5pt / 8 hrs &nbsp&nbsp&nbsp&nbsp 1/8pt / 8 hrs</td>
                    <td><input type="text" class="form-control" name=""></td>
                    <td><input type="text" class="form-control" name="local_cred_pts"></td>
                    <td><input type="text" class="form-control" name="local_sr"></td>
                    
               </tr>
               <tr>
                    <td class="bold-text">1.2.3 As Resource Speaker (Maximum Points - 15)</td>
                    <td></td>
                  
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nat'l &nbsp&nbsp&nbsp&nbsp Reg'l/Prov'l &nbsp&nbsp&nbsp&nbsp Dist &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Sch.</td>
                   
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Trainer/day &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 10 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 8 
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 6 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 5</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="trainr_cred_pts"></td>
                    <td><input type="text" class="form-control" name="trainr_sr"></td>
                   
               </tr>
               <tr>
                    <td>Resource Speaker/Topic &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 8 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 6 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                         5 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 3</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="rsrc_cred_pts"></td>
                    <td><input type="text" class="form-control" name="rsrc_sr"></td>
                    
               </tr>
               <tr>
                    <td>Facilitator/ Day  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 4  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 3 
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 2  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 1</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="faci_cred_pts"></td>
                    <td><input type="text" class="form-control" name="faci_sr"></td>
                   
               </tr>
               <tr>
                    <td class="bold-text">1.2.4 Completed Certificate of Proficiency (Maximum Points of 5 points)</td>
                    <td></td>
                    <td><input type="text" class="form-control" name="cert_cred_pts"></td>
                    <td><input type="text" class="form-control" name="cert_sr"></td>
                   
               </tr>
               <tr>
                    <td class="bold-text">2. Teaching Experience</td>
                    <td>25</td>
                    <td>100</td>
                    <td><input type="text" class="form-control" name="teach_sr"></td>
                    
               </tr>
               <tr>
                    <td>2.1 Status of Employment (Maximum Points - 100)</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="status_cred_pts"></td>
                    <td><input type="text" class="form-control" name="status_sr"></td>
                   
               </tr>
               <tr>
                    <td>2.1.1 Full Time within DWCL (4pts/yr of service)</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="fulltime_cred_pts"></td>
                    <td><input type="text" class="form-control" name="fulltime_sr"></td>
                   
               </tr>
               <tr>
                    <td>2.1.2 Part Time (Based on Subject Loading for 1 school year)</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="parttime_cred_pts"></td>
                    <td><input type="text" class="form-control" name="parttime_sr"></td>
                   
               </tr>
               <tr>
                    <td>1-2 subjects 1pt/year</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="onesubs_cred_pts"></td>
                    <td><input type="text" class="form-control" name="onesubs_sr"></td>
                   
               </tr>
               <tr>
                    <td>3-4 subjects 2 pts/year</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="threesubs_cred_pts"></td>
                    <td><input type="text" class="form-control" name="threesubs_sr"></td>
                    
               </tr>
               <tr>
                    <td>2.1.3 Outside DWCL 1pt/3yrs</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="outside_cred_pts"></td>
                    <td><input type="text" class="form-control" name="outside_sr"></td>
                   
               </tr>
               <tr>
                    <td class="bold-text">3. Faculty Performance Rating (Average Performance)</td>
                    <td>20</td>
                    <td>80</td>
                    <td><input type="text" class="form-control" name="faculty_sr"></td>
                   
               </tr>
               <tr>
                    <td>Mode for the last 3 year (Maximum Points - 80)</td>
                    <td>20</td>
                    <td><input type="text" class="form-control" name="threeyrs_cred_pts"></td>
                    <td><input type="text" class="form-control" name="threeyrs_sr"></td>
                  
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
                    <td>4.0 - 4.5 Very Satisfactory</td>
                    <td></td>
                    <td>60</td>
                    <td><input type="text" class="form-control" name="very_sr"></td>
                   
               </tr>
               <tr>
                    <td>3.6 - 3.9 Satisfactory</td>
                    <td></td>
                    <td>40</td>
                    <td><input type="text" class="form-control" name="satisf_sr"></td>
                    
               </tr>
               <tr>
                    <td class="bold-text">4. Community Extension Services</td>
                    <td>10</td>
                    <td>40</td>
                    <td></td>
                    <td></td>
                    <td></td> 
               </tr>
               <tr>
                    <td>4.1 Professional Organizations, Societies, Civic, Social, Cultural,
                         Religious <br> Clubs, Groups, etc (Maximum Points - 20)
                    </td>
                    <td><input type="text" class="form-control" name=""></td>
                    <td><input type="text" class="form-control" name="org_cred_pts"></td>
                    <td><input type="text" class="form-control" name="org_sr"></td>
                    
               </tr>
               <tr>
                    <td>International</td>
                    <td>5 pts/org</td>
                    <td><input type="text" class="form-control" name="interntl_cred_pts"></td>
                    <td><input type="text" class="form-control" name="interntl_sr"></td>
                   
               </tr>
               <tr>
                    <td>National</td>
                    <td>4 pts/org</td>
                    <td><input type="text" class="form-control" name="nationl_cred_pts"></td>
                    <td><input type="text" class="form-control" name="nationl_sr"></td>
                   
               </tr>
               <tr>
                    <td>Regional</td>
                    <td>3 pts/org</td>
                    <td><input type="text" class="form-control" name="regionl_cred_pts"></td>
                    <td><input type="text" class="form-control" name="regionl_sr"></td>
                    
               </tr>
               <tr>
                    <td>Division / Provincial School</td>
                    <td>1 pt/org</td>
                    <td><input type="text" class="form-control" name="prvncl_cred_pts"></td>
                    <td><input type="text" class="form-control" name="prvncl_sr"></td>
                    
               </tr>
               <tr>
                    <td>Additional 1 pt for Officership</td>
                    <td>Additional 1 pt for Life membership</td>
                    <td></td>
                    <td></td>
               
               </tr>
               <tr>
                    <td class="bold-text">4.2 Services Rendered without renumeration from DWCL <br> (Maximum Points - 10)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                 
               </tr>
               <tr>
                    <td>Coach, trainer, facilitator</td>
                    <td>0.5 pts / event</td>
                    <td><input type="text" class="form-control" name="coach_cred_pts"></td>
                    <td><input type="text" class="form-control" name="coach_sr"></td>
                   
               </tr>
               <tr>
                    <td>Area Chair - PAASCU</td>
                    <td>5 pts / visit</td>
                    <td><input type="text" class="form-control" name="area_cred_pts"></td>
                    <td><input type="text" class="form-control" name="area_sr"></td>
                   
               </tr>
               <tr>
                    <td>Committee Member - PAASCU</td>
                    <td>2 pts / visit</td>
                    <td><input type="text" class="form-control" name="comm_cred_pts"></td>
                    <td><input type="text" class="form-control" name="comm_sr"></td>
                  
               </tr>
               <tr>
                    <td>Chairman in other school activities</td>
                    <td>3 pts / activity</td>
                    <td><input type="text" class="form-control" name="chair_cred_pts"></td>
                    <td><input type="text" class="form-control" name="chair_sr"></td>
                 
               </tr>
               <tr>
                    <td>Chairman in other school activity</td>
                    <td>2 pts / activity</td>
                    <td><input type="text" class="form-control" name="other_cred_pts"></td>
                    <td><input type="text" class="form-control" name="other_sr"></td>
                    
               </tr>
               <tr>
                    <td>Membership in Academic (Co and Extra Curricular Ad. Hoc, RTC, etc)</td>
                    <td>2 pts / yr</td>
                    <td><input type="text" class="form-control" name="memb_cred_pts"></td>
                    <td><input type="text" class="form-control" name="memb_sr"></td>
                   
               </tr>
               <tr>
                    <td class="bold-text">4.3 Awards, Citations, Plaques, Certificates</td>
                    <td></td>
                    <td></td>
                    <td></td>
                  
               </tr>
               <tr>
                    <td>International</td>
                    <td>5 pts/ award</td>
                    <td><input type="text" class="form-control" name="award_inter_cred_pts"></td>
                    <td><input type="text" class="form-control" name="award_inter_sr"></td>
                  
               </tr>
               <tr>
                    <td>National</td>
                    <td>4 pts/ award</td>
                    <td><input type="text" class="form-control" name="award_ntnl_cred_pts"></td>
                    <td><input type="text" class="form-control" name="award_ntnl_sr"></td>
                    
               </tr>
               <tr>
                    <td>Regional</td>
                    <td>2 pts/ award</td>
                    <td><input type="text" class="form-control" name="award_regnl_cred_pts"></td>
                    <td><input type="text" class="form-control" name="award_regnl_sr"></td>
                    
               </tr>
               <tr>
                    <td>Division / Provincial </td>
                    <td>1 pt/ award</td>
                    <td><input type="text" class="form-control" name="div_cred_pts"></td>
                    <td><input type="text" class="form-control" name="div_sr"></td>
                   
               </tr>
               <tr>
                    <td class="bold-text">RESEARCH PRODUCTIVITY (Excluding Theses & <br> Dissertations commisioned researches) </td>
                    <td>5</td>
                    <td>20</td>
                    <td></td>
                  
               </tr>
               <tr>
                    <td>5.1 Research Work / Participation in research: Maximum of 20 points </td>
                    <td></td>
                    <td></td>
                    <td></td>
                 
               </tr>
               <tr>
                    <td>Main Researcher / Project Manager </td>
                    <td>5 pts</td>
                    <td><input type="text" class="form-control" name="main_cred_pts"></td>
                    <td><input type="text" class="form-control" name="main_sr"></td>
                   
               </tr>
               <tr>
                    <td>Co-Researcher / Research or Statistic Consultant </td>
                    <td>3 pts</td>
                    <td><input type="text" class="form-control" name="co_cred_pts"></td>
                    <td><input type="text" class="form-control" name="co_sr"></td>
                   
               </tr>
               <tr>
                    <td>Enumerator/Interviewer/ Data Gatherer</td>
                    <td>1 pt</td>
                    <td><input type="text" class="form-control" name="enum_cred_pts"></td>
                    <td><input type="text" class="form-control" name="enum_sr"></td>
                   
               </tr>
               <tr>
                    <td>Research Leader </td>
                    <td>2 pt</td>
                    <td><input type="text" class="form-control" name="lead_cred_pts"></td>
                    <td><input type="text" class="form-control" name="lead_sr"></td>
                  
               </tr>
               <tr>
                    <td class="bold-text">Research output / report modules, kits, manuals, and other teaching <br> materials submitted
               : 5 - 20 points as recommended by the <br>Reviewing Committee </td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="report_cred_pts"></td>
                    <td><input type="text" class="form-control" name="report_sr"></td>
                    
               </tr>
               <tr>
                    <td>Additional 5 points for the adoption of modules/kits </td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="add_cred_pts"></td>
                    <td><input type="text" class="form-control" name="add_sr"></td>
                    
               </tr>
               <tr>
                    <td>*Points to be equally shared by the group members  </td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control" name="pts_cred_pts"></td>
                    <td><input type="text" class="form-control" name="pts_sr"></td>
                   
               </tr>
               <tr>
                    <td>OVERALL CRITERIA  </td>
                    <td>100</td>
                    <td>400</td>
                    <td><input type="text" class="form-control" name="overall_sr"></td>
                  
               </tr>
               <tr>
                    <td>GRAND TOTAL</td>
                    <td><input type="text" class="form-control" name="grand_percent"></td>
                    <td><input type="text" class="form-control" name="grand_cred_pts"></td>
                    <td><input type="text" class="form-control" name="grand_sr"></td>
                   
               </tr>
            </tbody>
        </table>
        
        <h2>LEGEND:</h2>
          <h3>SR</h3><p>Self Rating </p>
          <h3>DRC</h3><p>Department Ranking Committee</p>
          <h3>BERTC</h3><p>Basic Education Rank and Tenure Council</p>
    </div>

    <button type="submit" class="btn btn-primay" name="submit_basic_ed_score">Submit Scores </button>

    </form>
    </div>
     

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>