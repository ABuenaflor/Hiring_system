<?php
// session_start();

include('config/dbcon.php');
include_once('functions/myFunctions.php');

if(isset($_POST['submit_credentials'])){

    $gradSchoolScore = $gradHonorsScore = $pastExpScore = $seminarsScore = $skillsScore = $certificatesScore = 0;

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

    if (!empty($_POST['grad_school'])) {
        $gradSchoolScore = 5;
    }
    if (!empty($_POST['grad_honors_received'])) {
        $gradHonorsScore = 5;
    }
    if (!empty($_POST['past_exp'])) {
        $pastExpScore = 5;
    }
    if (!empty($_POST['seminars_attended'])) {
        $seminarsScore = 5;
    }
    if (!empty($_POST['special_skills'])) {
        $skillsScore = 5;
    }

     // Score for certificates
     $certificatesScore = count($uploadedFiles) * 5;
     $certificatesJson = json_encode($uploadedFiles);
 
     // Calculate total score
     $totalScore = $gradSchoolScore + $gradHonorsScore + $pastExpScore + $seminarsScore + $skillsScore + $certificatesScore;

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

   // Insert data into credentials table
   if (mysqli_query($con, $creds_query)) {
    // Get the last inserted ID to insert into credential_scores
    $credentialId = mysqli_insert_id($con);

    // Insert data into credential_scores table
    $score_query = "INSERT INTO credential_scores (credential_id, grad_school_score, grad_honors_score, past_exp_score, 
    seminars_attended_score, special_skills_score, certificates_score, total_score)
    VALUES ('$credentialId', '$gradSchoolScore', '$gradHonorsScore', '$pastExpScore', '$seminarsScore', '$skillsScore', 
    '$certificatesScore', '$totalScore')";

    // Run the score insertion query
    if (mysqli_query($con, $score_query)) {
        echo "<script>alert('Application Submitted Successfully with a total score of $totalScore');</script>";
        header('location: index.php');
        exit();
    } else {
        echo "<script>alert('Error submitting scores');</script>";
    }
} else {
    echo "<script>alert('Submission Failed');</script>";
}
}
if (isset($_POST['edit_credentials'])) {
    $credentials_id = mysqli_real_escape_string($con, $_POST['credentials_id']);  // Get credentials ID from the form

    // Personal Information
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

    // Family Information
    $father_fname = mysqli_real_escape_string($con, $_POST['father_fname']);
    $father_mname = mysqli_real_escape_string($con, $_POST['father_mname']);
    $father_sname = mysqli_real_escape_string($con, $_POST['father_sname']);
    $mother_fname = mysqli_real_escape_string($con, $_POST['mother_fname']);
    $mother_mname = mysqli_real_escape_string($con, $_POST['mother_mname']);
    $mother_sname = mysqli_real_escape_string($con, $_POST['mother_sname']);

    // Educational Background
    $elem_school = mysqli_real_escape_string($con, $_POST['elem_school']);
    $sec_school = mysqli_real_escape_string($con, $_POST['sec_school']);
    $col_school = mysqli_real_escape_string($con, $_POST['col_school']);
    $grad_school = mysqli_real_escape_string($con, $_POST['grad_school']);
    
    // Additional Information
    $past_exp = mysqli_real_escape_string($con, $_POST['past_exp']);
    $seminars_attended = mysqli_real_escape_string($con, $_POST['seminars_attended']);
    $special_skills = mysqli_real_escape_string($con, $_POST['special_skills']);

    // Prepare to handle file uploads
    $uploadDir = 'uploads/certificates/';
    $uploadedFiles = [];

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

    // Score Calculation Logic
    $gradSchoolScore = !empty($_POST['grad_school']) ? 5 : 0;
    $gradHonorsScore = !empty($_POST['grad_honors_received']) ? 5 : 0;
    $pastExpScore = !empty($_POST['past_exp']) ? 5 : 0;
    $seminarsScore = !empty($_POST['seminars_attended']) ? 5 : 0;
    $skillsScore = !empty($_POST['special_skills']) ? 5 : 0;

    // Score for certificates
    $certificatesScore = count($uploadedFiles) * 5;

    // Calculate total score
    $totalScore = $gradSchoolScore + $gradHonorsScore + $pastExpScore + $seminarsScore + $skillsScore + $certificatesScore;

    // Update Query
    $update_query = "UPDATE credentials SET 
        first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name',
        date_of_birth = '$date_of_birth', place_of_birth = '$place_of_birth', sex = '$sex',
        civil_status = '$civil_status', citizenship = '$citizenship', height = '$height',
        weight = '$weight', blood_type = '$blood_type', pag_ibig = '$pag_ibig', philhealth = '$philhealth',
        tin = '$tin', sss = '$sss', residential_address = '$residential_address', permanent_address = '$permanent_address',
        contact_number = '$contact_number', email_address = '$email_address', religion = '$religion',
        father_fname = '$father_fname', father_mname = '$father_mname', father_sname = '$father_sname',
        mother_fname = '$mother_fname', mother_mname = '$mother_mname', mother_sname = '$mother_sname',
        elem_school = '$elem_school', sec_school = '$sec_school', col_school = '$col_school', grad_school = '$grad_school',
        past_exp = '$past_exp', seminars_attended = '$seminars_attended', special_skills = '$special_skills',
        certificates = '$certificatesJson' WHERE id = '$credentials_id'";

    // Execute the update query
    if (mysqli_query($con, $update_query)) {
        // Update the score table as well
        $score_query = "UPDATE credential_scores SET 
            grad_school_score = '$gradSchoolScore', grad_honors_score = '$gradHonorsScore', 
            past_exp_score = '$pastExpScore', seminars_attended_score = '$seminarsScore', 
            special_skills_score = '$skillsScore', certificates_score = '$certificatesScore', 
            total_score = '$totalScore' WHERE credential_id = '$credentials_id'";

        if (mysqli_query($con, $score_query)) {
            echo "<script>alert('Credentials Successfully Updated');</script>";
            header("location: show.php?id=$credentials_id");
        } else {
            echo "<script>alert('Error Updating Scores: " . mysqli_error($con) . "');</script>";
        }
    } else {
        echo "<script>alert('Update Failed: " . mysqli_error($con) . "');</script>";
    }
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