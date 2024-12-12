<?php
// session_start();

//change from include to require once
require_once('../config/dbcon.php');
require_once('../functions/myFunctions.php');

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

    $cred_query_run = mysqli_query($con, $creds_query);

    if (mysqli_query($con, $creds_query)) {
        // Get the last inserted ID
        $credentialId = mysqli_insert_id($con);

        // Insert into `credential_scores` table
        $score_query = "INSERT INTO credential_scores (credential_id, grad_school_score, grad_honors_score, past_exp_score, 
        seminars_attended_score, special_skills_score, certificates_score, total_score)
        VALUES ('$credentialId', '$gradSchoolScore', '$gradHonorsScore', '$pastExpScore', '$seminarsScore', '$skillsScore', 
        '$certificatesScore', '$totalScore')";

        mysqli_query($con, $score_query);

        echo "<script>alert('Application Submitted Successfully with a total score of $totalScore');</script>";
        header('location: index.php');
        exit();
    } else {
        echo "<script>alert('Submission Failed');</script>";
    }

}
if (isset($_POST['edit_credentials'])) {
    $credentials_id = mysqli_real_escape_string($con, $_POST['credentials_id']);  // Get credentials ID from the form

    // Personal Information (same as before)
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

    // Family Information (same as before)
    $father_fname = mysqli_real_escape_string($con, $_POST['father_fname']);
    $father_mname = mysqli_real_escape_string($con, $_POST['father_mname']);
    $father_sname = mysqli_real_escape_string($con, $_POST['father_sname']);
    $mother_fname = mysqli_real_escape_string($con, $_POST['mother_fname']);
    $mother_mname = mysqli_real_escape_string($con, $_POST['mother_mname']);
    $mother_sname = mysqli_real_escape_string($con, $_POST['mother_sname']);

    // Educational Background (same as before)
    $elem_school = mysqli_real_escape_string($con, $_POST['elem_school']);
    $sec_school = mysqli_real_escape_string($con, $_POST['sec_school']);
    $col_school = mysqli_real_escape_string($con, $_POST['col_school']);
    $grad_school = mysqli_real_escape_string($con, $_POST['grad_school']);
    
    // Additional Information (same as before)
    $past_exp = mysqli_real_escape_string($con, $_POST['past_exp']);
    $seminars_attended = mysqli_real_escape_string($con, $_POST['seminars_attended']);
    $special_skills = mysqli_real_escape_string($con, $_POST['special_skills']);

    // Fetch existing certificates if any (to retain old ones if no new files are uploaded)
    $existingCertificatesQuery = "SELECT certificates FROM credentials WHERE id = '$credentials_id'";
    $existingCertificatesResult = mysqli_query($con, $existingCertificatesQuery);
    $existingCertificatesRow = mysqli_fetch_assoc($existingCertificatesResult);
    $existingCertificates = json_decode($existingCertificatesRow['certificates'], true);  // Decode the existing certificates JSON

    // Prepare to handle file uploads
    $uploadDir = 'uploads/certificates/';
    $uploadedFiles = $existingCertificates ?: [];  // Start with existing files (if any)

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

    // Score Calculation Logic (same as before)
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