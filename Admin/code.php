<?php
session_start();

//change from include to require once
require_once('../config/dbcon.php');
require_once('../functions/myFunctions.php');

if(isset($_POST['submit_credentials'])){

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
    $image = $_FILES['image']['name'];

    $path = "./uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $experience = $_POST['experience'];
    $education = $_POST['education'];
    $tech_skills = $_POST['tech_skills'];
    $soft_skills = $_POST['soft_skills'];
    $interview = $_POST['interview'];
    $saw_score = $_POST['saw_score'];

    $date_applied= $_POST['date_applied'];
    $job_type = $_POST['job_type'];
    $job_schedule = $_POST['job_schedule'];
    $department = $_POST['department'];

    $creds_query = "INSERT INTO credentials (first_name, middle_name, last_name, date_of_birth, place_of_birth, sex,
    civil_status, citizenship, height, weight, blood_type, pag_ibig, philhealth, tin, sss, residential_address, permanent_address,
    contact_number, email_address, religion, father_fname, father_mname, father_sname, mother_fname, mother_mname, mother_sname,
    elem_school, elem_year_graduated, elem_inclusive_dates, elem_honors_received, sec_school, sec_year_graduated, sec_inclusive_dates,
    sec_honors_received, col_school, course, col_year_graduated, col_inclusive_dates, col_honors_received, grad_school, grad_year_graduated,
    grad_inclusive_dates, grad_honors_received, past_exp, seminars_attended, special_skills, image, experience, education, tech_skills, soft_skills, interview, saw_score,
    date_applied, job_type, job_schedule, department  ) 
    VALUES ('$first_name', '$middle_name',
    '$last_name', '$date_of_birth', '$place_of_birth', '$sex', '$civil_status', '$citizenship', '$height', '$weight', '$blood_type',
    '$pag_ibig', '$philhealth', '$tin', '$sss', '$residential_address', '$permanent_address', '$contact_number', '$email_address',
    '$religion', '$father_fname', '$father_mname', '$father_sname', '$mother_fname', '$mother_mname', '$mother_sname', '$elem_school',
    '$elem_year_graduated', '$elem_inclusive_dates', '$elem_honors_received', '$sec_school', '$sec_year_graduated', '$sec_inclusive_dates',
    '$sec_honors_received', '$col_school','$course', '$col_year_graduated', '$col_inclusive_dates', '$col_honors_received', '$grad_school',
    '$grad_year_graduated', '$grad_inclusive_dates', '$grad_honors_received', '$past_exp', '$seminars_attended', '$special_skills',
    '$filename', '$experience', '$education', '$tech_skills' ,'$soft_skills', '$interview', '$saw_score','$date_applied', '$job_type', '$job_schedule', '$department')";

    $cred_query_run = mysqli_query($con, $creds_query);

    if($cred_query_run){
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect('index.php', "Added Succesfully");

    }else{
        redirect('index.php', "Something went wrong");
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

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    $experience = $_POST['experience'];
    $education = $_POST['education'];
    $tech_skills = $_POST['tech_skills'];
    $soft_skills = $_POST['soft_skills'];
    $interview = $_POST['interview'];
    $saw_score = $_POST['saw_score'];

    $date_applied= $_POST['date_applied'];
    $job_type = $_POST['job_type'];
    $job_schedule = $_POST['job_schedule'];
    $department = $_POST['department'];
    $remarks = $_POST['remarks'];
    
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
     image = '$update_filename' , experience='$experience', education='$education', tech_skills='$tech_skills', soft_skills='$soft_skills',
     interview='$interview', saw_score='$saw_score', date_applied='$date_applied', job_type='$job_type', job_schedule='$job_schedule',
     department='$department', remarks='$remarks' WHERE id = '$credentials_id' ";

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

    $saw_score = ($experience_points * $weights['experience_weight']) +
                 ($education_points * $weights['education_weight']) +
                 ($tech_skills_points * $weights['tech_skills_weight']) +
                 ($soft_skills_points * $weights['soft_skills_weight']) +
                 ($interview_points * $weights['interview_weight']);

    // Update the credentials with the calculated SAW score
    $query = "UPDATE credentials SET experience='$experience', education='$education', tech_skills='$tech_skills', soft_skills='$soft_skills', interview='$interview', saw_score='$saw_score' WHERE id='$credentials_id'";

    if (mysqli_query($con, $query)) {
        $_SESSION['message'] = "Updated Successfully";
        header("Location: edit-credentials.php?id=".$credentials_id);
        exit(0);
    } else {
        $_SESSION['message'] = "Something Went Wrong";
        header("Location: edit-credentials.php?id=".$credentials_id);
        exit(0);
    }
}
if(isset($_POST['add_employee'])){

    $fullName = $_POST['fullname'];
    $department = $_POST['department'];
    $campus = $_POST['campus'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $mobile_num = $_POST['mobile_num'];
    $birth_date= $_POST['birth_date'];
    $date_hired= $_POST['date_hired'];
    $address= $_POST['address'];

    $add_emp_query = "INSERT INTO employees (fullName, department_id, campus_id, position_id, email, mobile_num, birth_date, date_hired, address)
    VALUES ('$fullName', '$department', '$campus', '$position', '$email', '$mobile_num', '$birth_date', '$date_hired', '$address')";
    
    $add_emp_query_run = mysqli_query($con, $add_emp_query);

    if($add_emp_query_run){
        echo "<script>alert('Added Succesfully')</script>";
        $_SESSION['message'] = "Added Successfully";
        showMessage();

        redirect('add_employee_ranking.php', "Added Succesfully");

    }else{
        $_SESSION['message'] = "Something went wrong";
        redirect('add_employee_ranking.php', "Something went wrong");
    }
    }


    if(isset($_POST['submit_basic_ed_score'])){
        $educ_attain_sr = $_POST ['educ_attain_sr'];
        $educ_attain_drc = $_POST['educ_attain_drc'];
        $educ_attain_bertc = $_POST['educ_attain_bertc'];

        $deg_cred_pts = $_POST['deg_cred_pts'];
        $deg_sr = $_POSt['deg_sr'];
        $deg_drc = $_POST['deg_drc'];
        $deg_bertc = $_POST['deg_bertc'];

        $bac_cred_pts = $_POST['bac_cred_pts'];
        $bac_sr = $_POST['bac_sr'];
        $bac_drc = $_POST['bac_drc'];
        $bac_bertc = $_POST['bac_bertc'];

        $bse_cred_pts = $_POST['bse_cred_pts'];
        $bse_sr = $_POST['bse_sr'];
        $bse_drc = $_POST['bse_drc'];
        $bse_bertc = $_POST['bse_bertc'];

        $bs_cred_pts = $_POST['bs_cred_pts'];
        $bs_sr = $_POST['bs_sr'];
        $bs_drc = $_POST['bs_drc'];
        $bs_bertc = $_POST['bs_bertc'];

        $cs_cred_pts = $_POST['cs_cred_pts'];
        $cs_sr = $_POST['cs_sr'];
        $cs_drc = $_POST['cs_drc'];
        $cs_bertc = $_POST['cs_bertc'];

        $prof_cred_pts = $_POST['prof_cred_pts'];
        $prof_sr = $_POST['prof_sr'];
        $prof_drc = $_POSt['prof_drc'];
        $prof_bertc = $_POST['prof_bertc'];

        $adv_cred_pts = $_POST['adv_cred_pts'];
        $adv_sr = $_POSt['adv_sr'];
        $adv_drc = $_POST['adv_drc'];
        $adv_bertc = $_POST['adv_bertc'];

        $ma_cred_pts = $_POST['ma_cred_pts'];
        $ma_sr = $_POST['ma_sr'];
        $ma_drc= $_POST['ma_drc'];
        $ma_bertc = $_POST['ma_bertc'];

        $ms_cred_pts = $_POST['ms_cred_pts'];
        $ms_sr = $_POST['ms_sr'];
        $ms_drc = $_POST['ms_drc'];
        $ms_bertc = $_POST['ms_bertc'];

        $seminar_cred_pts = $_POST['seminar_cred_pts'];
        $seminar_sr = $_POST['seminar_sr'];
        $seminar_drc = $_POST['seminar_drc'];
        $seminar_bertc = $_POST['seminar_bertc'];

        $intnl_cred_pts = $_POST['intnl_cred_pts'];
        $intnl_sr = $_POST['intnl_sr'];
        $intnl_drc = $_POST['intnl_drc'];
        $intnl_bertc = $_POST['intnl_bertc'];

        $natnl_cred_pts = $_POST['natnl_cred_pts'];
        $natnl_sr = $_POST['natnl_sr'];
        $natnl_drc = $_POST['natnl_drc'];
        $natnl_bertc = $_POST['natnl_bertc'];

        $regnl_cred_pts = $_POST['regnl_cred_pts'];
        $regnl_sr = $_POST['regnl_sr'];
        $regnl_drc = $_POST['regnl_drc'];
        $regnl_bertc = $_POST['regnl_bertc'];

        $local_cred_pts = $_POST['local_cred_pts'];
        $local_sr = $_POST['local_sr'];
        $local_drc = $_POST['local_drc'];
        $local_bertc = $_POST['local_bertc'];

        $trainr_cred_pts = $_POST['trainr_cred_pts'];
        $trainr_sr = $_POST['trainr_sr'];
        $trainr_drc = $_POST['trainr_drc'];
        $trainr_bertc = $_POST['trainr_bertc'];

        $rsrc_cred_pts = $_POST['rsrc_cred_pts'];
        $rsrc_sr = $_POST['rsrc_sr'];
        $rsrc_drc = $_POST['rsrc_drc'];
        $rsrc_bertc = $_POST['rsrc_bertc'];

        $faci_cred_pts = $_POST['faci_cred_pts'];
        $faci_sr = $_POST['faci_sr'];
        $faci_drc = $_POST['faci_drc'];
        $faci_bertc = $_POST['faci_bertc'];

        $cert_cred_pts = $_POST['cert_cred_pts'];
        $cert_sr = $_POST['cert_sr'];
        $cert_drc = $_POST['cert_drc'];
        $cert_bertc = $_POST['cert_bertc'];

        $teach_sr = $_POST['teach_sr'];
        $teach_drc = $_POST['teach_drc'];
        $teach_bertc = $_POST['teach_bertc'];

        $status_cred_pts = $_POST['status_cred_pts'];
        $status_sr = $_POST['status_sr'];
        $status_drc = $_POST['status_drc'];
        $status_bertc = $_POST['status_bertc'];

        $fulltime_cred_pts = $_POST['fulltime_cred_pts'];
        $fulltime_sr = $_POST['fulltime_sr'];
        $fulltime_drc = $_POST['fulltime_drc'];
        $fulltime_bertc = $_POST['fulltime_bertc'];

        $parttime_cred_pts = $_POST['parttime_cred_pts'];
        $parttime_sr = $_POST['parttime_sr'];
        $parttime_drc = $_POST['parttime_drc'];
        $parttime_bertc = $_POST['parttime_bertc'];

        $onesubs_cred_pts = $_POST['onesubs_cred_pts'];
        $onesubs_sr = $_POST['onesubs_sr'];
        $onesubs_drc = $_POST['onesubs_drc'];
        $onesubs_bertc = $_POST['onesubs_bertc'];

        $threesubs_cred_pts = $_POST['threesubs_cred_pts'];
        $threesubs_sr = $_POST['threesubs_sr'];
        $threesubs_drc = $_POST['threesubs_drc'];
        $threesubs_bertc = $_POST['threesubs_bertc'];

        $outside_cred_pts = $_POSt['outside_cred_pts'];
        $outside_sr = $_POST['outside_sr'];
        $outside_drc = $_POST['outside_drc'];
        $outside_bertc = $_POSt['outside_bertc'];

        $faculty_sr = $_POST['faculty_sr'];
        $faculty_drc = $_POST['faculty_drc'];
        $faculty_bertc = $_POST['faculty_bertc'];

        $threeyrs_cred_pts = $_POST['threeyrs_cred_pts'];
        $threeyrs_sr = $_POST['threeyrs_sr'];
        $threeyrs_drc = $_POST['threeyrs_drc'];
        $threeyrs_bertc = $_POST['threeyrs_bertc'];

        $very_sr = $_POST['very_sr'];
        $very_drc = $_POST['very_drc'];
        $very_bertc = $_POST['very_bertc'];

        $satisf_sr = $_POST['satisf_sr'];
        $satisf_drc = $_POST['satisf_drc'];
        $satisf_bertc = $_POST['satisf_bertc'];

        $org_cred_pts = $_POST['org_cred_pts'];
        $org_sr = $_POST['org_sr'];
        $org_drc = $_POSt['org_drc'];
        $org_bertc = $_POST['org_bertc'];

        $interntl_cred_pts = $_POST['interntl_cred_pts'];
        $interntl_sr = $_POST['interntl_sr'];
        $interntl_drc = $_POST['interntl_drc'];
        $interntl_bertc = $_POST['interntl_bertc'];

        $nationl_cred_pts = $_POST['nationl_cred_pts'];
        $nationl_sr = $_POST['nationl_sr'];
        $nationl_drc = $_POPST['nationl_drc'];
        $nationl_bertc = $_POST['nationl_bertc'];

        $regionl_cred_pts = $_POST['regionl_cred_pts'];
        $regionl_sr = $_POST['regionl_sr'];
        $regionl_drc = $_POST['regionl_drc'];
        $regionl_bertc = $_POST['regionl_bertc'];

        $prvncl_cred_pts = $_POST['prvncl_cred_pts'];
        $prvncl_sr = $_POSt['prvncl_sr'];
        $prvncl_drc = $_POST['prvncl_drc'];
        $prvncl_bertc = $_POST['prvncl_bertc'];

        $coach_cred_pts = $_POST['coach_cred_pts'];
        $coach_sr = $_POST['coach_sr'];
        $coach_drc = $_POST['coach_drc'];
        $coach_bertc = $_POST['coach_bertc'];

        $area_cred_pts= $_POST['area_cred_pts'];
        $area_sr = $_POST['area_sr'];
        $area_drc = $_POST['area_drc'];
        $area_bertc = $_POST['area_bertc'];

        $comm_cred_pts = $_POST['comm_cred_pts'];
        $comm_sr = $_POST['comm_sr'];
        $comm_drc = $_POST['comm_drc'];
        $comm_bertc = $_POST['comm_bertc'];

        $chair_cred_pts = $_POST['chair_cred_pts'];
        $chair_sr = $_POST['chair_sr'];
        $chair_drc = $_POST['chair_drc'];
        $chair_bertc = $_POST['chair_bertc'];

        $other_cred_pts = $_POST['other_cred_pts'];
        $other_sr = $_POST['other_sr'];
        $other_drc = $_POST['other_drc'];
        $other_bertc = $_POST['other_bertc'];

        $memb_cred_pts = $_POST['memb_cred_pts'];
        $memb_sr = $_POST['memb_sr'];
        $memb_drc = $_POSt['memb_drc'];
        $memb_bertc = $_POST['memb_bertc'];

        $award_inter_cred_pts = $_POST['award_inter_cred_pts'];
        $award_inter_sr = $_POSt['award_inter_sr'];
        $award_inter_drc = $_POST['award_inter_drc'];
        $award_inter_bertc = $_POST['award_inter_bertc'];

        $award_ntnl_cred_pts = $_POST['award_ntnl_cred_pts'];
        $award_ntnl_sr = $_POST['award_ntnl_sr'];
        $award_ntnl_drc = $_POST['award_ntnl_drc'];
        $award_ntnl_bertc = $_POST['award_ntnl_bertc'];

        $award_regnl_cred_pts = $_POST['award_regnl_cred_pts'];
        $award_regnl_sr = $_POST['award_regnl_sr'];
        $award_regnl_drc = $_POST['award_regnl_drc'];
        $award_regnl_bertc = $_POST['award_regnl_bertc'];

        $div_cred_pts = $_POST['div_cred_pts'];
        $div_sr = $_POST['div_sr'];
        $div_drc = $_POST['div_drc'];
        $div_bertc = $_POST['div_bertc'];

        $main_cred_pts = $_POST['main_cred_pts'];
        $main_sr = $_POST['main_sr'];
        $main_drc = $_POST['main_drc'];
        $main_bertc = $_POST['main_bertc'];

        $co_cred_pts = $_POST['co_cred_pts'];
        $co_sr = $_POST['co_sr'];
        $co_drc = $_POST['co_drc'];
        $co_bertc = $_POST['co_bertc'];

       $enum_cred_pts = $_POST['enum_cred_pts'];
       $enum_sr = $_POST ['enum_sr'];
        $enum_drc = $_POST['enum_drc'];
        $enum_bertc = $_POST['enum_bertc'];

        $lead_cred_pts = $_POST['lead_cred_pts'];
        $lead_sr = $_POST['lead_sr'];
        $lead_drc = $_POST['lead_drc'];
        $lead_bertc = $_POST['lead_bertc'];

        $report_cred_pts = $_POST['report_cred_pts'];
        $report_sr = $_POST['report_sr'];
        $report_drc = $_POST['report_drc'];
        $report_bertc = $_POST['report_bertc'];

        $add_cred_pts = $_POST['add_cred_pts'];
        $add_sr = $_POSt['add_sr'];
        $add_drc = $_POST['add_drc'];
       $add_bertc =$_POST ['add_bertc'];

       $pts_cred_pts =$_POST ['pts_cred_pts'];
        $pts_sr = $_POST['pts_sr'];
        $pts_drc = $_POST['pts_drc'];
        $pts_bertc = $_POST['pts_bertc'];

        $overall_sr = $_POST['overall_sr'];
        $overall_drc =$_POST['overall_drc'];
        $overall_bertc = $_POST['overall_bertc'];

       $grand_percent = $_POST ['grand_percent'];
        $grand_cred_pts =$_POSt['grand_cred_pts'];
       $grand_sr = $_POST ['grand_sr'];
        $grand_drc = $_POST['grand_drc'];
        $grand_bertc = $_POST['grand_bertc'];

        $basic_ed_score_query = "INSERT INTO basic_ed_score (educ_attain_sr, educ_attain_drc,educ_attain_bertc, deg_cred_pts,
         deg_sr,deg_drc,deg_bertc,bac_cred_pts,bac_sr,bac_drc,bac_bertc,bse_cred_pts,bse_sr,bse_drc,bse_bertc,bs_cred_pts,bs_sr,
         bs_drc,bs_bertc,cs_cred_pts,cs_sr,cs_drc,cs_bertc,prof_cred_pts,prof_sr,prof_drc,prof_bertc,adv_cred_pts,adv_sr,adv_drc,
         adv_bertc,ma_cred_pts,ma_sr,ma_drc,ma_bertc,ms_cred_pts,ms_sr,ms_drc,ms_bertc,seminar_cred_pts,seminar_sr,seminar_drc,seminar_bertc,
         intnl_cred_pts,intnl_sr,intnl_drc,intnl_bertc,natnl_cred_pts,natnl_sr,natnl_drc,natnl_bertc,regnl_cred_pts,regnl_sr,regnl_drc,
         regnl_bertc,local_cred_pts,local_sr,local_drc,local_bertc,trainr_cred_pts,trainr_sr,trainr_drc,trainr_bertc,rsrc_cred_pts,
         rsrc_sr,rsrc_drc,rsrc_bertc,faci_cred_pts,faci_sr,faci_drc,faci_bertc,cert_cred_pts,cert_sr,cert_drc,cert_bertc,teach_sr,teach_drc,
         teach_bertc,status_cred_pts,status_sr,status_drc,status_bertc,fulltime_cred_pts,fulltime_sr,fulltime_drc,fulltime_bertc,parttime_cred_pts,
         parttime_sr,parttime_drc,parttime_bertc,onesubs_cred_pts,onesubs_sr,onesubs_drc,onesubs_bertc,threesubs_cred_pts,threesubs_sr,threesubs_drc,
         threesubs_bertc,outside_cred_pts,outside_sr,outside_drc,outside_bertc,faculty_sr,faculty_drc,faculty_bertc,threeyrs_cred_pts,threeyrs_sr,threeyrs_drc,
         threeyrs_bertc,very_sr,very_drc,very_bertc,satisf_sr,satisf_drc,satisf_bertc,org_cred_pts,org_sr,org_drc,org_bertc,interntl_cred_pts,interntl_sr,
         interntl_drc,interntl_bertc,nationl_cred_pts,nationl_sr,nationl_drc,nationl_bertc,regionl_cred_pts,regionl_sr,regionl_drc,regionl_bertc,prvncl_cred_pts,
         prvncl_sr,prvncl_drc,prvncl_bertc,coach_cred_pts,coach_sr,coach_drc,coach_bertc,area_cred_pts,area_sr,area_drc,area_bertc,comm_cred_pts,comm_sr,comm_drc,comm_bertc,
         chair_cred_pts,chair_sr,chair_drc,chair_bertc,other_cred_pts,other_sr,other_drc,other_bertc,memb_cred_pts,memb_sr,memb_drc,memb_bertc,
         award_inter_cred_pts,award_inter_sr,award_inter_drc,award_inter_bertc,award_ntnl_cred_pts,award_ntnl_sr,award_ntnl_drc,award_ntnl_bertc,award_regnl_cred_pts,award_regnl_sr,
         award_regnl_drc,award_regnl_bertc,div_cred_pts,div_sr,div_drc,div_bertc,main_cred_pts,main_sr,main_drc,main_bertc,co_cred_pts,co_sr,co_drc,co_bertc,
         enum_cred_pts,enum_sr,enum_drc,enum_bertc,lead_cred_pts,lead_sr,lead_drc,lead_bertc,report_cred_pts,report_sr,report_drc,report_bertc,
         add_cred_pts,add_sr,add_drc,add_bertc,pts_cred_pts,pts_sr,pts_drc,pts_bertc,overall_sr,overall_drc,overall_bertc,grand_percent,
         grand_cred_pts,grand_sr,grand_drc,grand_bertc) VALUES ('$educ_attain_sr','$educ_attain_drc','$educ_attain_bertc','$deg_cred_pts','$deg_sr',
         '$deg_drc','$deg_bertc','$bac_cred_pts','$bac_sr','$bac_drc','$bac_bertc','$bse_cred_pts','$bse_sr','$bse_drc','$bse_bertc','$bs_cred_pts','$bs_sr','$bs_drc','$bs_bertc','$cs_cred_pts',
         '$cs_sr','$cs_drc','$cs_bertc','$prof_cred_pts','$prof_sr','$prof_drc','$prof_bertc','$adv_cred_pts','$adv_sr','$adv_drc','$adv_bertc','$ma_cred_pts','$ma_sr','$ma_drc','$ma_bertc',
         '$ms_cred_pts','$ms_sr','$ms_drc','$ms_bertc','$seminar_cred_pts','$seminar_sr','$seminar_drc','$seminar_bertc','$intnl_cred_pts','$intnl_sr','$intnl_drc','$intnl_bertc',
         '$natnl_cred_pts','$natnl_sr','$natnl_drc','$natnl_bertc','$regnl_cred_pts','$regnl_sr','$regnl_drc','$regnl_bertc','$local_cred_pts','$local_sr','$local_drc','$local_bertc','$trainr_cred_pts','$trainr_sr',
         '$trainr_drc','$trainr_bertc','$rsrc_cred_pts','$rsrc_sr','$rsrc_drc','$rsrc_bertc','$faci_cred_pts','$faci_sr','$faci_drc','$faci_bertc','$cert_cred_pts','$cert_sr','$cert_drc','$cert_bertc','$teach_sr','$teach_drc',
         '$teach_bertc','$status_cred_pts','$status_sr','$status_drc','$status_bertc','$fulltime_cred_pts','$fulltime_sr','$fulltime_drc','$fulltime_bertc','$parttime_cred_pts','$parttime_sr','$parttime_drc','$parttime_bertc',
         '$onesubs_cred_pts','$onesubs_sr','$onesubs_drc','$onesubs_bertc','$threesubs_cred_pts','$threesubs_sr','$threesubs_drc','$threesubs_bertc','$outside_cred_pts','$outside_sr','$outside_drc','$outside_bertc','$faculty_sr',
         '$faculty_drc','$faculty_bertc','$threeyrs_cred_pts','$threeyrs_sr','$threeyrs_drc','$threeyrs_bertc','$very_sr','$very_drc','$very_bertc','$satisf_sr','$satisf_drc','$satisf_bertc','$org_cred_pts','$org_sr',
         '$org_drc','$org_bertc','$interntl_cred_pts','$interntl_sr','$interntl_drc','$interntl_bertc','$nationl_cred_pts','$nationl_sr','$nationl_drc','$nationl_bertc','$regionl_cred_pts','$regionl_sr','$regionl_drc','$regionl_bertc',
         '$prvncl_cred_pts','$prvncl_sr','$prvncl_drc','$prvncl_bertc','$coach_cred_pts','$coach_sr','$coach_drc','$coach_bertc','$area_cred_pts','$area_sr','$area_drc','$area_bertc','$comm_cred_pts',
         '$comm_sr','$comm_drc','$comm_bertc','$chair_cred_pts','$chair_sr','$chair_drc','$chair_bertc','$other_cred_pts','$other_sr','$other_drc','$other_bertc','$memb_cred_pts','$memb_sr','$memb_drc','$memb_bertc',
         '$award_inter_cred_pts','$award_inter_sr','$award_inter_drc','$award_inter_bertc','$award_ntnl_cred_pts','$award_ntnl_sr','$award_ntnl_drc','$award_ntnl_bertc','$award_regnl_cred_pts','$award_regnl_sr','$award_regnl_drc',
         '$award_regnl_bertc','$div_cred_pts','$div_sr','$div_drc','$div_bertc','$main_cred_pts','$main_sr','$main_drc','$main_bertc','$co_cred_pts','$co_sr','$co_drc','$co_bertc','$enum_cred_pts','$enum_sr','$enum_drc','$enum_bertc',
         '$lead_cred_pts','$lead_sr','$lead_drc','$lead_bertc','$report_cred_pts','$report_sr','$report_drc','$report_bertc','$add_cred_pts','$add_sr','$add_drc','$add_bertc','$pts_cred_pts','$pts_sr','$pts_drc','$pts_bertc','$overall_sr',
         '$overall_drc','$overall_bertc','$grand_percent','$grand_cred_pts','$grand_sr','$grand_drc','$grand_bertc')";

        $basic_ed_score_query_run= mysqli_query($con, $basic_ed_score_query);

        if($basic_ed_score_query_run){
            redirect('basic_ed_ranking.php', "Added Succesfully");
        }else{
            redirect('basic_ed_ranking.php', "Something went wrong");
        }


    }
    
    if(isset($_POST['add_dept'])){
        $dept_name = $_POST['dept_name'];

        $add_dept_query = "INSERT INTO department (dept_name) VALUES ('$dept_name')";
        $add_dept_query_run = mysqli_query($con, $add_dept_query);

        if($add_dept_query){
            $_SESSION['message'] = "Added Successfully";
            showMessage();
    
            redirect('department.php', "Added Succesfully");
    
        }else{
            $_SESSION['message'] = "Something went wrong";
            redirect('department.php', "Something went wrong");
        }
    }

    if(isset($_POST['edit_dept'])) {
        $dept_id = $_POST['dept_id']; 
        $dept_name = $_POST['dept_name'];
    
        $update = $con->prepare("UPDATE department SET dept_name = ? WHERE dept_id = ?");
        $update->execute(array($dept_name, $dept_id));
        header('location:department.php');
    
    }

    if(isset($_POST['add_campus'])){
        $campus_name = $_POST['campus_name'];

        $add_campus_query = "INSERT INTO campus (campus_name) VALUES ('$campus_name')";
        $add_campus_query_run = mysqli_query($con, $add_campus_query);

        if($add_campus_query){
            $_SESSION['message'] = "Added Successfully";
            showMessage();
    
            redirect('campus.php', "Added Succesfully");
    
        }else{
            $_SESSION['message'] = "Something went wrong";
            redirect('campus.php', "Something went wrong");
        }
    }
    if(isset($_POST['add_position'])){
        $position_name = $_POST['position_name'];

        $add_position_query = "INSERT INTO position (position_name) VALUES ('$position_name')";
        $add_position_query_run = mysqli_query($con, $add_position_query);

        if($add_position_query){
            $_SESSION['message'] = "Added Successfully";
            showMessage();
    
            redirect('position.php', "Added Succesfully");
    
        }else{
            $_SESSION['message'] = "Something went wrong";
            redirect('position.php', "Something went wrong");
        }
    }

    if(isset($_POST['add_acad_rank'])){
        $acad_rank_name = $_POST['acad_rank_name'];

        $add_acad_rank_query = "INSERT INTO academic_rank (acad_rank_name) VALUES ('$acad_rank_name')";
        $add_acad_rank_query_run = mysqli_query($con, $add_acad_rank_query);

        if($add_position_query){
            $_SESSION['message'] = "Added Successfully";
            showMessage();
    
            redirect('academic_rank.php', "Added Succesfully");
    
        }else{
            $_SESSION['message'] = "Something went wrong";
            redirect('academic_rank.php', "Something went wrong");
        }
    }
    if(isset($_POST['add_inst_role'])){
        $inst_role_name = $_POST['inst_role_name'];

        $add_inst_query = "INSERT INTO institutional_roles (inst_role_name) VALUES ('$inst_role_name')";
        $add_inst_query_run = mysqli_query($con, $add_inst_query);

        if($add_inst_query){
            $_SESSION['message'] = "Added Successfully";
            showMessage();
    
            redirect('add_inst_role.php', "Added Succesfully");
    
        }else{
            $_SESSION['message'] = "Something went wrong";
            redirect('add_inst_role.php', "Something went wrong");
        }
    }
    if(isset($_POST['add_acad_role'])){
        $acad_role_name = $_POST['acad_role_name'];

        $add_acad_query = "INSERT INTO academic_roles (acad_role_name) VALUES ('$acad_role_name')";
        $add_acad_query_run = mysqli_query($con, $add_acad_query);

        if($add_acad_query){
            $_SESSION['message'] = "Added Successfully";
            showMessage();
    
            redirect('add_acad_role.php', "Added Succesfully");
    
        }else{
            $_SESSION['message'] = "Something went wrong";
            redirect('add_acad_role.php', "Something went wrong");
        }
    }

    if(isset($_POST['add_job_posting'])){
        $campus = $_POST['campus'];
        $department = $_POST['dept'];
        $acad_role = $_POST['acad_role'];
        $inst_role = $_POST['inst_role'];
        $qualifications = $_POST['qualifications'];
    
        $add_job_posting_query = "INSERT INTO job_posting (campus_id, dept_id, acad_role_id, inst_role_id, qualifications) 
                                  VALUES ('$campus', '$department', '$acad_role', '$inst_role', '$qualifications')";
        
        if (mysqli_query($con, $add_job_posting_query)) {
            echo "<script>alert('Job posting added successfully!');</script>";
            redirect('job_posting.php', "Added Succesfully");

        } else {
            echo "<script>alert('Error adding job posting. Please try again.');</script>";
        }
    
        // Close connection
        mysqli_close($con);
    }
    

/* Update Password */

/* if (!isset($_SESSION['id']) || !isset($_SESSION['username'])) {
    echo "<script>alert('Session not set. Please log in again.');</script>";
    header("Location: user_accounts.php");
    exit();
}

if (isset($_POST['old_password']) && isset($_POST['new_pass']) && isset($_POST['confirm_new_pass'])) {

    function validate($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    $op = validate($_POST['old_password']);
    $np = validate($_POST['new_pass']);
    $c_np = validate($_POST['confirm_new_pass']);

    // Validate inputs
    if (empty($op)) {
        header("Location: edit_pass.php?error=Old Password is required");
        exit();
    } elseif (empty($np)) {
        header("Location: edit_pass.php?error=New Password is required");
        exit();
    } elseif ($np !== $c_np) {
        header("Location: edit_pass.php?error=The confirmation password does not match");
        exit();
    } else {
        // Hash the passwords (use stronger hashing, like password_hash())
        $op = md5($op);
        $np = md5($np);

        $id = $_SESSION['id'];

        // Check if the old password is correct
        $sql = "SELECT password FROM user WHERE id='$id' AND password='$op'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) === 1) {
            // Update the new password in the database
            $sql_2 = "UPDATE user SET password='$np' WHERE id='$id'";
            if (mysqli_query($con, $sql_2)) {
                echo "<script>alert('Your password has been changed successfully');</script>";
                header("Location: edit_pass.php?success=Your password has been changed successfully");
                exit();
            } else {
                header("Location: edit_pass.php?error=Error updating password");
                exit();
            }
        } else {
            header("Location: edit_pass.php?error=Incorrect old password");
            exit();
        }
    }
} else {
    header("Location: edit_pass.php");
    exit();
} */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['change_pass'])) {
        $old_password = $_POST["old_password"];
        $new_password = $_POST["new_pass"];
        $confirm_new_password = $_POST["confirm_new_pass"];
        $user_id = $_POST['id']; // Assuming you're passing the user ID in the form

        // Check if old password matches
        $check_old_password = mysqli_query($con, "SELECT * FROM user WHERE id='$user_id' AND password='$old_password'");
        if (mysqli_num_rows($check_old_password) > 0) {
            // Old password is correct, update new password
            if ($new_password === $confirm_new_password) {
                $update_password = mysqli_query($con, "UPDATE user SET password='$new_password' WHERE id='$user_id'");
                if ($update_password) {
                    $_SESSION['password_changed'] = true;
                    redirect('edit_pass.php?id=' . $user_id, "Password updated successfully!");
                } else {
                    echo "<script>alert('Failed to update password. Please try again later.'); window.location.href='edit_pass.php?id=" . $user_id . "'</script>";
                }
            } else {
                echo "<script>alert('New password and confirm password do not match. Please try again.'); window.location.href='edit_pass.php?id=" . $user_id . "'</script>";
            }
        } else {
            echo "<script>alert('Incorrect old password. Please try again.'); window.location.href='edit_pass.php?id=" . $user_id . "'</script>";
        }
    }
}


?>