<?php
session_start();

include('config/dbcon.php');
include('functions/myFunctions.php');

if(isset($_POST['submit_credentials'])){

    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($con, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
    $place_of_birth = mysqli_real_escape_string($con, $_POST['place_of_birth']);
    $sex = mysqli_real_escape_string($con, $_POST['sex']);
    $civil_status = mysqli_real_escape_string($con, $_POST['civil_status']);
    $citizenship = mysqli_real_escape_string($con, $_POST['citizenship']);
    $height = mysqli_real_escape_string($con, $_POST['height']);
    $weight = mysqli_real_escape_string($con, $_POST['weight']);
    $blood_type = mysqli_real_escape_string($con, $_POST['blood_type']);
    $pag_ibig = mysqli_real_escape_string($con, $_POST['pag_ibig']);
    $philhealth = mysqli_real_escape_string($con, $_POST['philhealth']);
    $tin = mysqli_real_escape_string($con, $_POST['tin']);
    $sss = mysqli_real_escape_string($con, $_POST['sss']);
    $residential_address = mysqli_real_escape_string($con, $_POST['residential_address']);
    $permanent_address = mysqli_real_escape_string($con, $_POST['permanent_address']);
    $contact_number = mysqli_real_escape_string($con, $_POST['contact_number']);
    $email_address = mysqli_real_escape_string($con, $_POST['email_address']);
    $religion = mysqli_real_escape_string($con, $_POST['religion']);
    
    $father_fname = mysqli_real_escape_string($con, $_POST['father_fname']);
    $father_mname = mysqli_real_escape_string($con, $_POST['father_mname']);
    $father_sname = mysqli_real_escape_string($con, $_POST['father_sname']);
    $mother_fname = mysqli_real_escape_string($con, $_POST['mother_fname']);
    $mother_mname = mysqli_real_escape_string($con, $_POST['mother_mname']);
    $mother_sname = mysqli_real_escape_string($con, $_POST['mother_sname']);
    
    $elem_school = mysqli_real_escape_string($con, $_POST['elem_school']);
    $elem_year_graduated = mysqli_real_escape_string($con, $_POST['elem_year_graduated']);
    $elem_inclusive_dates = mysqli_real_escape_string($con, $_POST['elem_inclusive_dates']);
    $elem_honors_received = mysqli_real_escape_string($con, $_POST['elem_honors_received']);
    $sec_school = mysqli_real_escape_string($con, $_POST['sec_school']);
    $sec_year_graduated = mysqli_real_escape_string($con, $_POST['sec_year_graduated']);
    $sec_inclusive_dates = mysqli_real_escape_string($con, $_POST['sec_inclusive_dates']);
    $sec_honors_received = mysqli_real_escape_string($con, $_POST['sec_honors_received']);
    $col_school = mysqli_real_escape_string($con, $_POST['col_school']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $col_year_graduated = mysqli_real_escape_string($con, $_POST['col_year_graduated']);
    $col_inclusive_dates = mysqli_real_escape_string($con, $_POST['col_inclusive_dates']);
    $col_honors_received = mysqli_real_escape_string($con, $_POST['col_honors_received']);
    $grad_school = mysqli_real_escape_string($con, $_POST['grad_school']);
    $grad_year_graduated = mysqli_real_escape_string($con, $_POST['grad_year_graduated']);
    $grad_inclusive_dates = mysqli_real_escape_string($con, $_POST['grad_inclusive_dates']);
    $grad_honors_received = mysqli_real_escape_string($con, $_POST['grad_honors_received']);
    
    $past_exp = mysqli_real_escape_string($con, $_POST['past_exp']);
    $seminars_attended = mysqli_real_escape_string($con, $_POST['seminars_attended']);
    $special_skills = mysqli_real_escape_string($con, $_POST['special_skills']);
    
    $date_applied = mysqli_real_escape_string($con, $_POST['date_applied']);
    $institutional_role = mysqli_real_escape_string($con, $_POST['institutional_role']);
    $academic_role = mysqli_real_escape_string($con, $_POST['academic_role']);
    $campus = mysqli_real_escape_string($con, $_POST['campus_name']);
    $department = mysqli_real_escape_string($con, $_POST['department']);

    // Prepare to handle file uploads
    $uploadDir = 'uploads/certificates/';  // Directory where files will be uploaded
    $uploadedFiles = [];  // Array to store file paths

    // Check if files are uploaded
    if (isset($_FILES['certificates']) && !empty($_FILES['certificates']['name'][0])) {
        // Loop through each uploaded file
        foreach ($_FILES['certificates']['name'] as $key => $fileName) {
            $fileTmpName = $_FILES['certificates']['tmp_name'][$key];
            $fileSize = $_FILES['certificates']['size'][$key];
            $fileError = $_FILES['certificates']['error'][$key];

            // Check if file uploaded successfully and it's a PDF
            if ($fileError === 0 && strtolower(pathinfo($fileName, PATHINFO_EXTENSION)) === 'pdf') {
                // Create a unique file name to avoid overwriting
                $uniqueFileName = uniqid('', true) . '.pdf';
                $filePath = $uploadDir . $uniqueFileName;

                // Move the file to the upload directory
                if (move_uploaded_file($fileTmpName, $filePath)) {
                    // Add the file path to the array
                    $uploadedFiles[] = $filePath;
                }
            }
        }
    }

    // Convert the uploaded file paths array into a JSON string
    $certificatesJson = json_encode($uploadedFiles);

    $creds_query = "INSERT INTO credentials (first_name, middle_name, last_name, date_of_birth, place_of_birth, sex,
    civil_status, citizenship, height, weight, blood_type, pag_ibig, philhealth, tin, sss, residential_address, permanent_address,
    contact_number, email_address, religion, father_fname, father_mname, father_sname, mother_fname, mother_mname, mother_sname,
    elem_school, elem_year_graduated, elem_inclusive_dates, elem_honors_received, sec_school, sec_year_graduated, sec_inclusive_dates,
    sec_honors_received, col_school, course, col_year_graduated, col_inclusive_dates, col_honors_received, grad_school, grad_year_graduated,
    grad_inclusive_dates, grad_honors_received, past_exp, seminars_attended, special_skills,
    date_applied, institutional_role, academic_role, campus_name, department, certificates) 
    VALUES ('$first_name', '$middle_name',
    '$last_name', '$date_of_birth', '$place_of_birth', '$sex', '$civil_status', '$citizenship', '$height', '$weight', '$blood_type',
    '$pag_ibig', '$philhealth', '$tin', '$sss', '$residential_address', '$permanent_address', '$contact_number', '$email_address',
    '$religion', '$father_fname', '$father_mname', '$father_sname', '$mother_fname', '$mother_mname', '$mother_sname', '$elem_school',
    '$elem_year_graduated', '$elem_inclusive_dates', '$elem_honors_received', '$sec_school', '$sec_year_graduated', '$sec_inclusive_dates',
    '$sec_honors_received', '$col_school','$course', '$col_year_graduated', '$col_inclusive_dates', '$col_honors_received', '$grad_school',
    '$grad_year_graduated', '$grad_inclusive_dates', '$grad_honors_received', '$past_exp', '$seminars_attended', '$special_skills',
    '$date_applied', '$institutional_role', 
    '$academic_role','$campus', '$department', '$certificatesJson')";

    $cred_query_run = mysqli_query($con, $creds_query);

    if($cred_query_run){
        
        // Set message to session before redirecting
        echo "<script>alert('Application Submitted Succesfully');</script>"; 
        /* $_SESSION['message'] = "Added Successfully"; */
        header('location: index.php');
        exit();
    } else {
        // Set error message to session before redirecting
        $_SESSION['message'] = "Something went wrong";
        header('location: index.php');
        exit();
    }

}else if(isset($_POST['edit_credentials']))
{
    $credentials_id = $_POST['credentials_id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $place_of_birth = $_POST['place_of_birth'];
    $sex = $_POST['sex'];
    $civil_status = $_POST['civil_status'];
    $citizenship = $_POST['citizenship'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $blood_type = $_POST['blood_type'];
    $pag_ibig = $_POST['pag_ibig'];
    $philhealth = $_POST['philhealth'];
    $tin = $_POST['tin'];
    $sss = $_POST['sss'];
    $residential_address = $_POST['residential_address'];
    $permanent_address = $_POST['permanent_address'];
    $contact_number = $_POST['contact_number'];
    $email_address = $_POST['email_address'];
    $religion = $_POST['religion'];

    $father_fname = $_POST['father_fname'];
    $father_mname = $_POST['father_mname'];
    $father_sname = $_POST['father_sname'];
    $mother_fname = $_POST['mother_fname'];
    $mother_mname = $_POST['mother_mname'];
    $mother_sname = $_POST['mother_sname'];

    $elem_school = $_POST['elem_school'];
    $elem_year_graduated = $_POST['elem_year_graduated'];
    $elem_inclusive_dates = $_POST['elem_inclusive_dates'];
    $elem_honors_received = $_POST['elem_honors_received'];
    $sec_school = $_POST['sec_school'];
    $sec_year_graduated = $_POST['sec_year_graduated'];
    $sec_inclusive_dates = $_POST['sec_inclusive_dates'];
    $sec_honors_received = $_POST['sec_honors_received'];
    $col_school = $_POST['col_school'];
    $course = $_POST['course'];
    $col_year_graduated = $_POST['col_year_graduated'];
    $col_inclusive_dates = $_POST['col_inclusive_dates'];
    $col_honors_received = $_POST['col_honors_received'];
    $grad_school = $_POST['grad_school'];
    $grad_year_graduated = $_POST['grad_year_graduated'];
    $grad_inclusive_dates = $_POST['grad_inclusive_dates'];
    $grad_honors_received = $_POST['grad_honors_received'];

    $past_exp = $_POST['past_exp'];
    $seminars_attended = $_POST['seminars_attended'];
    $special_skills = $_POST['special_skills'];



   

    $date_applied= $_POST['date_applied'];
    $job_type = $_POST['job_type'];
    $job_schedule = $_POST['job_schedule'];
    $campus = $_POST['campus_name'];
    $department = $_POST['department'];

    if($new_image != "")
    {
        $update_filename = $new_image;
    }else
    {
        $update_filename = $old_image;
    }
    
    $update_query = "UPDATE credentials SET first_name = '$first_name', middle_name='$middle_name', last_name='$last_name',
    date_of_birth='$date_of_birth',place_of_birth='$place_of_birth', sex='$sex',civil_status='$civil_status',
    citizenship ='$citizenship', height='$height', weight='$weight',blood_type='$blood_type',pag_ibig='$pag_ibig',
    philhealth='$philhealth', tin='$tin', sss='$sss', residential_address='$residential_address',permanent_address='$permanent_address',
    contact_number='$contact_number', email_address='$email_address',  religion='$religion', father_fname='$father_fname',
    father_mname='$father_mname', father_sname='$father_sname',mother_fname='$mother_fname', mother_mname='$mother_mname',
    mother_sname='$mother_sname', elem_school='$elem_school', elem_year_graduated='$elem_year_graduated',elem_inclusive_dates='$elem_inclusive_dates',
    elem_honors_received ='$elem_honors_received', sec_school='$sec_school', sec_year_graduated='$sec_year_graduated',
     sec_inclusive_dates='$sec_inclusive_dates', sec_honors_received='$sec_honors_received', col_school='$col_school',
     course ='$course', col_year_graduated='$col_year_graduated', col_inclusive_dates = '$col_inclusive_dates', col_honors_received = '$col_honors_received',
     grad_school = '$grad_school', grad_year_graduated = '$grad_year_graduated', grad_inclusive_dates = '$grad_inclusive_dates',
     grad_honors_received = '$grad_honors_received', past_exp = '$past_exp', seminars_attended='$seminars_attended', special_skills = '$special_skills',
     date_applied='$date_applied', job_type='$job_type', job_schedule='$job_schedule', campus_name='$campus',
     department = '$department' WHERE id = '$credentials_id' ";

     $update_query_run = mysqli_query($con, $update_query);

     if($update_query_run)
     {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['imamge']['name'], $path.'/'.$new_image);
        }redirect("show.php?id=$credentials_id", "Credentials Succesfully Updated");
     }else
     {
        redirect("show.php?id=$credentials_id", "Something Went Wrong");
     }
}
if(isset($_POST['edit_credentials'])) {
    $id = $_POST['id'];
    $experience = $_POST['experience'];
    $education = $_POST['education'];
    $tech_skills = $_POST['tech_skills'];
    $soft_skills = $_POST['soft_skills'];
    $interview = $_POST['interview'];

    // Assign points based on the presence of entries
    $experience_points = !empty($experience) ? 1 : 0;
    $education_points = !empty($education) ? 1 : 0;
    $tech_skills_points = !empty($tech_skills) ? 1 : 0;
    $soft_skills_points = !empty($soft_skills) ? 1 : 0;
    $interview_points = !empty($interview) ? 1 : 0;

    // Calculate SAW score
    $weights = [
        'experience_weight' => 0.35,
        'education_weight' => 0.20,
        'tech_skills_weight' => 0.25,
        'soft_skills_weight' => 0.10,
        'interview_weight' => 0.10
    ];

    // $saw_score = ($experience_points * $weights['experience_weight']) +
    //              ($education_points * $weights['education_weight']) +
    //              ($tech_skills_points * $weights['tech_skills_weight']) +
    //              ($soft_skills_points * $weights['soft_skills_weight']) +
    //              ($interview_points * $weights['interview_weight']);

    // // Update the credentials with the calculated SAW score
    // $query = "UPDATE credentials SET experience='$experience', education='$education', tech_skills='$tech_skills', soft_skills='$soft_skills', interview='$interview', saw_score='$saw_score' WHERE id='$credentials_id'";

    // if (mysqli_query($con, $query)) {
    //     $_SESSION['message'] = "Updated Successfully";
    //     header("Location: edit-credentials.php?id=".$credentials_id);
    //     exit(0);
    // } else {
    //     $_SESSION['message'] = "Something Went Wrong";
    //     header("Location: edit-credentials.php?id=".$credentials_id);
    //     exit(0);
    // }
}
if(isset($_POST['submit_credentials_notif'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
   

    $query ="INSERT INTO `applicants` (`first_name`,`last_name`) 
    VALUES ('$first_name','$last_name')";

    if ($con->query($query) === TRUE) {
        // Create a notification
        $message = "$first_name $last_name has filed an application.";
        $notification_sql = "INSERT INTO notifications (message) VALUES ('$message')";
        $con->query($notification_sql);

        echo "Application submitted successfully!";
        header("Location: application.php");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

if (isset($_POST['submit_posting'])) {
    // Database connection
    include 'config/dbcon.php';

    // Fetch form data
    $academicRole = $_POST['acad_role'];
    $institutionalRole = $_POST['inst_role'];
    $department = $_POST['dept'];
    $campus= $_POST['campus'];
    $qualifications = $_POST['qualifications']; // array of qualifications

    // Insert job post into the database
    $sql = "INSERT INTO job_posting (acad_role_id, inst_role_id, dept_id,campus_id) VALUES (?, ?, ?,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssss", $academicRole, $institutionalRole, $department,$campus);
    $stmt->execute();
    
    // Get the last inserted job post ID
    $jobPostID = $con->insert_id;

    // Insert qualifications
    foreach ($qualifications as $qualification) {
        $sql = "INSERT INTO qualifications (job_posting_id, qualifications) VALUES (?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("is", $jobPostID, $qualifications);
        $stmt->execute();
    }

    $stmt->close();
    $con->close();
    
    // Redirect back to job postings page
    header("Location: test3.php?success=1");
}

if(isset($_POST['submit_basic_ed_sr'])){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $department = $_POST['department'];
    $campus = $_POST['campus'];
    $position = $_POST['position'];
    $deg_earned = $_POST['deg_earned'];
    $baccal = $_POST['bacc'];
    $bse = $_POST['bse'];
    $bs = $_POST['bs'];
    $cs_exam = $_POST['cs_exam'];
    $prof_growth = $_POST['prof_growth'];
    $adv_training = $_POST['adv_training'];
    $ma = $_POST['ma'];
    $ma_so = $_POST['ma_so'];
    $seminars = $_POST['seminars'];
    $sem_intrntl = $_POST['sem_intrntl'];
    $sem_ntnl = $_POST['sem_ntnl'];
    $sem_rgnl = $_POST['sem_rgnl'];
    $sem_local = $_POST['sem_local'];
    $as_speaker = $_POST['as_speaker'];
    $trainer = $_POST['trainer'];
    $resource_spkr = $_POST['resource_spkr'];
    $faci = $_POST['faci'];
    $comp_cert = $_POST['comp_cert'];
    $teach_exp = $_POST['teach_exp'];
    $stat_emp = $_POST['stat_emp'];
    $fulltime = $_POST['fulltime'];
    $parttime = $_POST['parttime'];
    $onetotwo = $_POST['onetotwo'];
    $threetofour = $_POST['threetofour'];
    $outside = $_POST['outside'];
    $facult_perf = $_POST['facult_perf'];
    $mode = $_POST['mode'];
    $very_satisf = $_POST['very_satisf'];
    $satisfy = $_POST['satisfy'];
    $comm_serv = $_POST['comm_serv'];
    $prof_org = $_POST['prof_org'];
    $prof_intrntnl = $_POST['prof_intrntnl'];
    $prof_ntnl = $_POST['prof_ntnl'];
    $prof_rgnl = $_POST['prof_rgnl'];
    $prof_div = $_POST['prof_div'];
    $services_rend = $_POST['services_rend'];
    $coach = $_POST['coach'];
    $area_chair = $_POST['area_chair'];
    $comm_mem = $_POST['comm_mem'];
    $chair_other = $_POST['chair_other'];
    $chair_otherSch = $_POST['chair_otherSch'];
    $mem_acad = $_POST['mem_acad'];
    $awards = $_POST['awards'];
    $awards_intrntnl = $_POST['awards_intrntnl'];
    $awards_natnl = $_POST['awards_natnl'];
    $awards_rgnl = $_POST['awards_rgnl'];
    $awards_div = $_POST['awards_div'];
    $research_prod = $_POST['research_prod'];
    $research_work = $_POST['research_work'];
    $main_research = $_POST['main_research'];
    $co_research = $_POST['co_research'];
    $enum = $_POST['enum'];
    $research_lead = $_POST['research_lead'];
    $research_out = $_POST['research_out'];
    $addtnl_five = $_POST['addtnl_five'];
    $pts = $_POST['pts'];
    $overall_crit = $_POST['overall_crit'];
   // Calculate grand total
     $grand_total = array_sum([
            $deg_earned, $baccal, $bse, $bs, $cs_exam, $prof_growth, $adv_training, $ma, $ma_so, $seminars, $sem_intrntl, $sem_ntnl, $sem_rgnl, $sem_local,
            $as_speaker, $trainer, $resource_spkr, $faci, $comp_cert, $teach_exp, $stat_emp, $fulltime, $parttime, $onetotwo, $threetofour, $outside, $facult_perf, $mode, $very_satisf, $satisfy,
             $comm_serv, $prof_org, $prof_intrntnl, $prof_ntnl, $prof_rgnl, $prof_div, $services_rend, $coach, $area_chair, $comm_mem, $chair_other, $chair_otherSch, $mem_acad, $awards, $awards_intrntnl,
            $awards_natnl, $awards_rgnl, $awards_div, $research_prod, $research_work, $main_research, $co_research, $enum, $research_lead, $research_out, $addtnl_five, $pts, $overall_crit
    ]);

    $update_query = "INSERT INTO basic_ed_sr (first_name, last_name, username,department, campus, position,deg_earned,bacc,bse,bs,cs_exam,prof_growth,adv_training,ma,ma_so,seminars,sem_intrntl,sem_ntnl,sem_rgnl,sem_local,
    as_speaker,trainer,resource_spkr,faci,comp_cert,teach_exp,stat_emp,fulltime,parttime,onetotwo,threetofour,outside,facult_perf,mode,very_satisf,satisfy,comm_serv,
    prof_org,prof_intrntnl,prof_ntnl,prof_rgnl,prof_div,services_rend,coach,area_chair,comm_mem,chair_other,chair_otherSch,mem_acad,awards,awards_intrntnl,awards_natnl,
    awards_rgnl,awards_div,research_prod,research_work,main_research,co_research,enum,research_lead,research_out,addtnl_five,pts,overall_crit,grand_total) 
    VALUES ('$first_name','$last_name','$username','$department','$campus','$position','$deg_earned',
    '$baccal','$bse','$bs','$cs_exam','$prof_growth','$adv_training','$ma','$ma_so','$seminars','$sem_intrntl','$sem_ntnl','$sem_rgnl','$sem_local','$as_speaker','$trainer','$resource_spkr',
    '$faci','$comp_cert','$teach_exp','$stat_emp','$fulltime','$parttime','$onetotwo','$threetofour','$outside','$facult_perf','$mode','$very_satisf','$satisfy','$comm_serv','$prof_org','$prof_intrntnl',
    '$prof_ntnl','$prof_rgnl','$prof_div','$services_rend','$coach','$area_chair','$comm_mem','$chair_other','$chair_otherSch','$mem_acad','$awards','$awards_intrntnl','$awards_natnl','$awards_rgnl','$awards_div','$research_prod',
    '$research_work','$main_research','$co_research','$enum','$research_lead','$research_out','$addtnl_five','$pts','$overall_crit','$grand_total')";

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run){
        
        // Set message to session before redirecting
        echo "<script>alert('Self Rating Submitted Succesfully');</script>"; 
        /* $_SESSION['message'] = "Added Successfully"; */
        header('location: emp_sr.php');
        exit();
    } else {
        // Set error message to session before redirecting
        $_SESSION['message'] = "Something went wrong";
        header('location: emp_sr.php');
        exit();
    }

}
?>