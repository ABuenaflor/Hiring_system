<?php 
//session_start();
/* include("includes/header.php");  */
include("../middleware/admin_middleware.php"); 
?>


<style>
.bold-text {
    font-weight: bold;
}
</style>
    
<body>
     <div class="wrapper">
          <?php include("includes/header.php") ?>
               <header class="cd__intro pt-5">
                    <h1> Faculty Ranking for Tertiary Level</h1>
                    <p> Criterias For Ranking Faculties in College Department</p>
               </header>
               <div class="container mt-5">
        <table class="table table-striped table-bordered">
       <thead class="table-dark">
                <tr>
                    <th>CRITERIA</th>
                    <th colspan="2">Credit Points</th>
                    <th colspan="3">SUMMARY OF POINTS</th>
                    
                </tr>
                <tr>
                    <th></th>
                    <th>In the Field</th>
                    <th>In Related Field</th>
                    <th>SR</th>
                    <th>DRC</th>                   
                    <th>CRTC</th>

                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bold-text">1. EDUCATIONAL ATTAINMENT (Maximum Points - 60 cumulative)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                </tr>
                <!-- Add more rows as needed -->
                <tr>
                    <td >Doctorate</td>
                    <td>50</td>
                    <td>45</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
              
                </tr>
                <tr>
                    <td >Extra Doctorate</td>
                    <td>15</td>
                    <td>5</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                   
                </tr>
               <tr>
                    <td>Master's Degree with Thesis</td>
                    <td>35</td>
                    <td>30</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Master's Degree w/o Thesis/Seminar Paper</td>
                    <td>30</td>
                    <td>25</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Extra Master's Degree with Thesis</td>
                    <td>5</td>
                    <td>4</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Extra Master's Degree w/o Thesis/Seminar Paper</td>
                    <td>5</td>
                    <td>3</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Extra Bachelor's Degree</td>
                    <td>3</td>
                    <td>2</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Board Exam</td>
                    <td>5</td>
                    <td>3</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Additional Equivalent degree(s) earned</td>
                    <td>3</td>
                    <td>2</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Civil Service Exam</td>
                    <td>2</td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    
               </tr>
               <tr>
                    <td class="bold-text">Subtotal</td>
                    <td></td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td class="bold-text">2. TEACHING EXPERIENCE (Maximum Points - 30 cumulative: based on rank)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>College</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                   
               </tr>
               <tr>
                    <td>Full Time Faculty</td>
                    <td> 1 pt / 1 year</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Part Time Faculty</td>
                    <td>1/2 pt / year</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Teaching outside DWCL</td>
                    <td>1 pt / 3 years</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td class="bold-text">Subtotal</td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td class="bold-text">3. PERFORMANCE (Maximum points - 35 non-cummulative: average <br>
                    (mean) of 6 semesters of all ratings since last ranking period)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>4.19 - 5.0 Outstanding</td>
                    <td>35 points</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>3.0 - 4.18 Very Satisfactory</td>
                    <td>30 points</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>Mean:</td>    
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Total:</td>    
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Sub:</td>    
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td class="bold-text">4. PROFESSIONAL GROWTH - (Maximum Points - 40; cumulative) </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td class="bold-text">4.1 Advanced Studies</td>    
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>Doctoral units (Max - 7 points)</td>
                    <td>1 pt / 6 units</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Master's units (Max - 4 points)</td>
                    <td>1 pt / 6 units</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td class="bold-text">4.2 Attendance to special trainings and seminars (max points - 20)</td>    
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>Special Trainings in Seminars</td>    
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>International : # of hours</td>
                    <td>4 pts / day</td>
                    <td>2 pts / day</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>National : # of hours</td>
                    <td>3 pts / day</td>
                    <td>1.5 pts / day</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Regional : # of hours</td>
                    <td>2 pts / day</td>
                    <td>1 pt / day</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Division / School : # of hours</td>
                    <td>1 pt / day</td>
                    <td>0.5 pt / day</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Attendance in Seminars</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>International : # of hours</td>
                    <td>2 pts / day</td>
                    <td>1 pts / day</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>National : # of hours</td>
                    <td>2 pts / day</td>
                    <td>1 pts / day</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Regional : # of hours</td>
                    <td>2 pts / day</td>
                    <td>1 pt / day</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Division / School : # of hours</td>
                    <td>1 pt / day</td>
                    <td>0.5 pt / day</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td class="bold-text">4.3 Awards in one's field of specialization</td>    
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>International : # of awards</td>
                    <td>5 pts / awards</td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>National : # of awards</td>
                    <td>3 pts / awards</td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Regional : # of awards</td>
                    <td>2 pts / awards</td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td class="bold-text">Subtotal</td>
                    <td></td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>

               <tr>
                    <td class="bold-text">4.4 Scholarship / Study grants</td>    
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>International</td>
                    <td>1 pt / availment</td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td class="bold-text">4.5 Industry Practice</td>    
                    <td>5 pts</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td class="bold-text">Subtotal</td>
                    <td></td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td class="bold-text">5. RESEARCH PRODUCTIVITY (Maximum points - 40)</td>    
                    <td>5 pts</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>5.1 Research Work / Participation in Research - (Maximum Points - 20 points)</td>    
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>Main Reseacher / Project Manager</td>
                    <td>10 pts</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Co-Researcher / Researcher or Statistic Consultant</td>
                    <td>5 pts </td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Enumerator / Interviewer / Data Gatherer</td>
                    <td>2 pts</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Research Leader </td>
                    <td>3 pts</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td class="bold-text">5.2 Researcher Output (Maximum Points - 20 points) </td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Completed Manuscript or research paper/report </td>
                    <td>10 pts</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Modules </td>
                    <td>10 pts</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Kits </td>
                    <td>10 pts</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Manuals </td>
                    <td>10 pts</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td class="bold-text">6. PUBLICATIONS (Maximum Points - 40) </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>6.1 Professional Article in scholarly journal (Maximum points - 15) </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>International </td>
                    <td>15 pts / article</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>National </td>
                    <td>10 pts / article</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Regional </td>
                    <td>7 pts / article</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Division / Institutional </td>
                    <td>5 pts / article</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td class="bold-text">Subtotal:</td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>6.2 Presentation of scientific paper in professional organization (Maximum points - 10) </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>International (referred) </td>
                    <td>10 pts</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>International (non-referred) </td>
                    <td>3 pts</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>National (referred) </td>
                    <td>5 pts</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>National (non-referred) </td>
                    <td>3 pts</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Regional </td>
                    <td>3 pts</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Division </td>
                    <td>2 pts</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td class="bold-text">Subtotal:</td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>6.2 Published and copyrighted book (Maximum points  - 15 points depending on the assessment of an <br>
                    evaluation committee ) </td>
                    <td>15 pts</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td class="bold-text">7. ACADEMIC SERVICES (Max Points - 40) </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>7.1 Academic Extension Services (Maximum points - 25) </td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>7.1.1 Advisorship in research work/co-extracurricular activities </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>Dissertation </td>
                    <td>3 pts / advisee</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Master's Thesis </td>
                    <td>2 pts / advisee</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Undergraduate Thesis/ Seminar Paper </td>
                    <td>1 pt / advisee</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Advisorship of recognized DWCL clubs,socieites, and organizations </td>
                    <td>3 pts / year</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Coaching and training of contestants, players, troupes </td>
                    <td>1 pt / event</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Class advisorship (for FS, capstone, and research professors) </td>
                    <td>1 pt / class</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>7.1.2 Resource Person </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>International </td>
                    <td>10 pts / topic</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>National </td>
                    <td>5 pts / topic</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Regional </td>
                    <td>3 pts / topic</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Division / Provincial </td>
                    <td>2 pts / topic</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>School </td>
                    <td>1 pt / topic</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>7.1.3 Facilitator / Organizer of Seminar, Progrmas </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>National </td>
                    <td>5 pts / topic</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Regional </td>
                    <td>3 pts / topic</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Division / Provincial </td>
                    <td>3 pts / topic</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>School </td>
                    <td>1 pt / topic</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>7.1.4 Editorship / Refereeing of researches, papers </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>Dissertation Professional Journal </td>
                    <td>3 pts / paper</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Master's Thesis</td>
                    <td>2 pts / paper</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Undergraduate Thesis / Seminar Paper </td>
                    <td>1 pt / paper</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <th>7.1.5 Membership in Panel </th>
                    <th>Chairman</th>
                    <th>Member</th>
                    <th></th>
                    <th></th>
               </tr>
               <tr>
                    <td>Dissertation </td>
                    <td>3 pts / panel</td>
                    <td>2 pts / panel</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Master's Thesis  </td>
                    <td>2 pts / panel</td>
                    <td>1 pts / panel</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Undergraduate Thesis / Seminar Paper  </td>
                    <td>1 pts / panel</td>
                    <td>1/2 pts / panel</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>School colloquia, fora, etc.  </td>
                    <td>1/2 pt / panel</td>
                    <td>1/4 pt / panel</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>7.1.6 School Committees </td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>PAASCU </td>
                    <td>5 pts / visit</td>
                    <td>2 pts / visit</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Other Committees (Ranking, Evaluation) </td>
                    <td>3 pts / visit</td>
                    <td>2 pts / visit</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Intramurals, Foundation, Recognition, Graduation, etc. </td>
                    <td>3 pts / visit</td>
                    <td>2 pts / visit</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td clas="bold-text">Subtotal:  </td>
                    <td></td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td clas="bold-text">Subtotal:  </td>
                    <td></td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>  
               <tr>
                    <td>7.2 Membership / Officership in Professional Organizations (Maximum Points - 10) </td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>  
               <tr>
                    <td>International  </td>
                    <td>5 pts / org</td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>   
               <tr>
                    <td>National  </td>
                    <td>4 pts / org</td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>  
               <tr>
                    <td>Regional  </td>
                    <td>3 pts / org</td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>
               <tr>
                    <td>Division / Provincial</td>
                    <td>1 pt / org</td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr>  
               <tr>
                    <td clas="bold-text">Subtotal:  </td>
                    <td></td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr> 
               <tr>
                    <td>7.3 Awards and Recognition, Plaques, Certificates, Medals etc. (Maximum Points - 5) </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>       
               <tr>
                    <td>International  </td>
                    <td>5 pts / award</td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr> 
               <tr>
                    <td>National  </td>
                    <td>4 pts / award</td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr> 
               <tr>
                    <td>Regional  </td>
                    <td>3 pts / award</td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr> 
               <tr>
                    <td>Division / Provincial  </td>
                    <td>1 pts / award</td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr> 
               <tr>
                    <td clas="bold-text">Subtotal:  </td>
                    <td></td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr> 
               <tr>
                    <td class="bold-text">8. COMMUNNITY EXTENSION SERVICES (Maximum Points - 40) </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr> 
               <tr>
                    <td>8.1 Civic, Social, Cultural, Religious, Clubs, Groups, etc. (Maximum Points - 20) </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr> 
               <tr>
                    <td>International  </td>
                    <td>5 pts / service</td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr> 
               <tr>
                    <td>National  </td>
                    <td>3 pts / service</td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr> 
               <tr>
                    <td>Regional  </td>
                    <td>2 pts / service</td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr> 
               <tr>
                    <td>School / Local  </td>
                    <td>1 pts / service</td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr> 
               <tr>
                    <td>Additional 1/2 point for Officership  </td>
                    <td></td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr> 
               <tr>
                    <td>All life membership an additional 1 point and should be carried on yearly  </td>
                    <td></td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr> 
               <tr>
                    <td>8.2 Professional Service (Extension service rendered relative to field of experience)(Maximum points - 20) </td>
                    <td>20 pts</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr> 
               <tr>
                    <td clas="bold-text">Subtotal:  </td>
                    <td></td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr> 
               <tr>
                    <td clas="bold-text">GRAND TOTAL:  </td>
                    <td></td>
                    <td></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
               </tr> 
            </tbody>
        </table>
        
        <h2>LEGEND:</h2>
          <h3>SR</h3><p>Self Rating </p>
          <h3>SRC</h3><p>School Ranking Committee</p>
          <h3>CRTC</h3><p>College Ranking Committee</p>
    </div>
     </div>

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>