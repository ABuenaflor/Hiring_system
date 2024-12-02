<?php
// session_start();

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


   

    
    if(isset($_POST['add_dept'])){
        $dept_name = $_POST['dept_name'];
        $level = $_POST['level'];

        $add_dept_query = "INSERT INTO department (dept_name,level) VALUES ('$dept_name','$level')";
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
        $job_role = $_POST['job_role'];
    
        $add_job_posting_query = "INSERT INTO job_posting (campus_id, dept_id, acad_role_id, inst_role_id, qualifications, job_role_id) 
                                  VALUES ('$campus', '$department', '$acad_role', '$inst_role', '$qualifications','$job_role')";
        
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

/* if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = intval($_POST['emp_id']);

    // Approve account by updating status to 'active'
    $sql = "UPDATE emp_login SET status = 'active' WHERE emp_id = $user_id";

    if (mysqli_query($con, $sql)) {
        echo "Account approved!";
        header ("Location: approve_accounts.php");
        // Optionally, notify the user via email that their account is approved
    } else {
        echo "Error: " . mysqli_error($con);
    }
} */
if (isset($_POST['emp_id'])) {
    $user_id = intval($_POST['emp_id']);

    // Approve account by updating status to 'active'
    $sql = "UPDATE emp_login SET status = 'active' WHERE emp_id = $user_id";

    if (mysqli_query($con, $sql)) {
        echo "Account approved!";
        header("Location: approve_accounts.php");
        // Optionally, notify the user via email that their account is approved
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

if(isset($_POST['add_job_role'])){
    $job_role = $_POST['job_role'];

    $add_job_role_query = "INSERT INTO job_roles (job_role) VALUES ('$job_role')";
    $add_job_role_query_run = mysqli_query($con, $add_job_role_query);

    if($add_job_role_query){
        $_SESSION['message'] = "Added Successfully";
        showMessage();

        redirect('post_job_role.php', "Added Succesfully");

    }else{
        $_SESSION['message'] = "Something went wrong";
        redirect('post_job_role.php', "Something went wrong");
    }
}

if (isset($_POST['update_basiced_rubrics'])) {
    $id = $_POST['id'];
    $educ_attain = $_POST['educ_attain'];
    $educ_attain_weight = $_POST['educ_attain_weight'];
    $educ_attain_pts = $_POST['educ_attain_pts'];
    $educ_attain_sr = $_POST['educ_attain_sr'];
    $educ_attain_drc = $_POST['educ_attain_drc'];
    $educ_attain_bertc = $_POST['educ_attain_bertc'];

     $update_query = "UPDATE basic_ed_score SET educ_attain = '$educ_attain', educ_attain_weight='$educ_attain_weight', educ_attain_pts='$educ_attain_pts',
    educ_attain_sr='$educ_attain_sr',educ_attain_drc='$educ_attain_drc', educ_attain_bertc='$educ_attain_bertc' WHERE id = '$id' ";

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run){
        echo "<script>alert('Rubrics Updated Successfully');</script>";
        header ("Location: basic_ed_ranking.php");
    }else{
        echo "<script>alert('Error Occured in Updating Rubrics');</script>";
        header ("Location: basic_ed_ranking.php");
    }
}
?>