<?php
session_start();
include('config/dbcon.php');
include('functions/myFunctions.php');

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
    date_applied, job_type, job_schedule, department) 
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

?>