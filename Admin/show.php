<?php 
//session_start();

//changed from include to require once
require_once ("code.php");
include_once("../functions/myFunctions.php"); 
/* require_once("includes/header.php"); */ ?>
<style>
     .certificate-container {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        padding: 20px;
        margin: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .certificate-container h2 {
        color: #333;
        font-size: 24px;
        margin-bottom: 15px;
    }

    .certificate-container p {
        font-size: 16px;
        color: #555;
    }

    .certificate-item {
        background-color: #fff;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .certificate-link {
        font-size: 16px;
        color: #0066cc;
        text-decoration: none;
        font-weight: bold;
    }

    .certificate-link:hover {
        text-decoration: underline;
        color: #004d99;
    }

    .certificate-container p, .certificate-item {
        color: #333;
    }
</style>
<body>
    <div class="wrapper">
    <?php
            include("includes/header.php"); 
        ?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
            </div>
        </div>
    </div>
</div>
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                    if(isset($_GET['id']))
                    {
                        $id = $_GET['id'];
                        $credentials = getByID('credentials', $id);

                        if(mysqli_num_rows($credentials)>0)
                        {

                        $data = mysqli_fetch_array($credentials);
                ?>  
                    
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Personal Credentials</h4>
                        </div>
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                                <div class="row-mb-3">
                                    <div class="col-md-4">
                                        <label for="">Date of Application</label>
                                        <input type="date" name="date_applied" value="<?=$data['date_applied']?>" placeholder="Enter Date" class="form-control">
                                    </div>
                                </div>
                            </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                            <div class="col-md-4 mb-3">
                                                <input type="hidden" name="credentials_id" value="<?=$data['id']?>">
                                                <label for="">First Name</label>
                                                <input type="text" name="first_name" value="<?=$data['first_name']?>" placeholder="Enter First Name" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Middle Name</label>
                                                <input type="text" name="middle_name" value="<?=$data['middle_name']?>"placeholder="Enter Middle Name" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Last Name</label>
                                                <input type="text" name="last_name" value="<?=$data['last_name']?>" placeholder="Enter Last Name" class="form-control">
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="">Date of Birth</label>
                                                <input type="date" name="date_of_birth" value="<?=$data['date_of_birth']?>" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Place of Birth</label>
                                                <input type="text" name="place_of_birth" value="<?=$data['place_of_birth']?>" placeholder="Enter Place of Birth" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">Sex</label>
                                                <select name="sex" id="" value="<?=$data['sex']?>" class="form-control">
                                                    <option selected>Choose</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">Civil Status</label>
                                                <input type="text" name="civil_status" value="<?=$data['civil_status']?>" placeholder="Enter Civil Status"  class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">Citizenship</label>
                                                <input type="text" name="citizenship" value="<?=$data['citizenship']?>" placeholder="Enter Citizenship"  class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">Height in Centimeters</label>
                                                <input type="text" name="height" value="<?=$data['height']?>" placeholder="Enter Height"  class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">Weight</label>
                                                <input type="text" name="weight" value="<?=$data['weight']?>" placeholder="Enter Weight"  class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">Blood Type</label>
                                                <input type="text" name="blood_type" value="<?=$data['blood_type']?>" placeholder="Enter Blood Type"  class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">PAG-IBIG</label>
                                                <input type="text" name="pag_ibig" value="<?=$data['pag_ibig']?>" placeholder="Enter PAG-IBIG Number"  class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">PhilHealth</label>
                                                <input type="text" name="philhealth" value="<?=$data['philhealth']?>" placeholder="Enter PhilHealth Number"  class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">TIN</label>
                                                <input type="text" name="tin" value="<?=$data['tin']?>" placeholder="Enter TIN Number"  class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">SSS</label>
                                                <input type="text" name="sss" value="<?=$data['sss']?>" placeholder="Enter SSS Number"  class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Residential Address</label>
                                                <textarea  class="form-control" name="residential_address"  placeholder="Enter Residential Address" id=""><?=$data['sss']?></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Permanent Address</label>
                                                <textarea  class="form-control" name="permanent_address"  placeholder="Enter Permanent Address" id=""><?=$data['permanent_address']?></textarea>
                                            </div>
                                            <div class="col-md-4 mb-3s">
                                                <label for="">Contact Number</label>
                                                <input type="text" name="contact_number" value="<?=$data['contact_number']?>" placeholder="Enter Contact Number"  class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Email Address</label>
                                                <input type="text" name="email_address" value="<?=$data['email_address']?>" placeholder="Enter Email Address"  class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Religion</label>
                                                <input type="text" name="religion" value="<?=$data['religion']?>" placeholder="Enter Religion"  class="form-control">
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Family Background</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">

                                    <h3>Father</h3>
                                        <div class="col-md-4 pt-2">       
                                            <label for="">First Name</label>
                                            <input type="text" name="father_fname" value="<?=$data['father_fname']?>" placeholder="Enter First Name"  class="form-control">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                                <label for="">Middle Name</label>
                                                <input type="text" name="father_mname" value="<?=$data['father_mname']?>" placeholder="Enter Middle Name"  class="form-control">
                                        </div>
                                        <div class="col-md-4 pt-4">
                                                <label for="">Last Name</label>
                                                <input type="text" name="father_sname" value="<?=$data['father_sname']?>" placeholder="Enter Last Name"  class="form-control">
                                        </div>

                                    <h3>Mother</h3>
                                    <div class="col-md-4 pt-2">       
                                            <label for="">First Name</label>
                                            <input type="text" name="mother_fname" value="<?=$data['mother_fname']?>" placeholder="Enter First Name"  class="form-control">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                                <label for="">Middle Name</label>
                                                <input type="text" name="mother_mname" value="<?=$data['mother_mname']?>" placeholder="Enter Middle Name"  class="form-control">
                                        </div>
                                        <div class="col-md-4 pt-2">
                                                <label for="">Last Name</label>
                                                <input type="text" name="mother_sname" value="<?=$data['mother_sname']?>" placeholder="Enter Last Name"  class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Educational Background</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <h3>Elementary</h3>

                                        <div class="col-md-6 pt-2">       
                                            <label for="">Name of School</label>
                                            <input type="text" name="elem_school" value="<?=$data['elem_school']?>" placeholder="Enter School Name"  class="form-control">
                                        </div>
                                        <div class="col-md-2 pt-2">       
                                            <label for="">Year Graduated</label>
                                            <input type="text" name="elem_year_graduated" value="<?=$data['elem_year_graduated']?>" placeholder="Enter Year Graduated"  class="form-control">
                                        </div>
                                        <div class="col-md-2 pt-2">       
                                            <label for="">Inclusive Dates</label>
                                            <input type="text" name="elem_inclusive_dates" value="<?=$data['elem_inclusive_dates']?>" placeholder="Enter Inclusive Dates"  class="form-control">
                                        </div>
                                        <div class="col-md-6 pt-2 mb-3">       
                                            <label for="">Honors Received</label>
                                            <input type="text" name="elem_honors_received" value="<?=$data['elem_honors_received']?>" placeholder="Enter Honors"  class="form-control">
                                        </div>

                                        <h3>Secondary</h3>

                                        <div class="col-md-6 pt-2">       
                                            <label for="">Name of School</label>
                                            <input type="text" name="sec_school" value="<?=$data['sec_school']?>" placeholder="Enter School Name"  class="form-control">
                                        </div>
                                        <div class="col-md-2 pt-2">       
                                            <label for="">Year Graduated</label>
                                            <input type="text" name="sec_year_graduated" value="<?=$data['sec_year_graduated']?>" placeholder="Enter Year Graduated"  class="form-control">
                                        </div>
                                        <div class="col-md-2 pt-2">       
                                            <label for="">Inclusive Dates</label>
                                            <input type="text" name="sec_inclusive_dates" value="<?=$data['sec_inclusive_dates']?>" placeholder="Enter Inclusive Dates"  class="form-control">
                                        </div>
                                        <div class="col-md-6 pt-2 mb-3">       
                                            <label for="">Honors Received</label>
                                            <input type="text" name="sec_honors_received" value="<?=$data['sec_honors_received']?>" placeholder="Enter Honors"  class="form-control">
                                        </div>

                                        <h3>Tertiary</h3>

                                        <div class="col-md-6 pt-2 ">       
                                            <label for="">Name of School</label>
                                            <input type="text" name="col_school" value="<?=$data['col_school']?>" placeholder="Enter School Name"  class="form-control">
                                        </div>
                                        <div class="col-md-6 pt-2 ">       
                                            <label for="">Course</label>
                                            <input type="text" name="course" value="<?=$data['course']?>" placeholder="Enter Course"  class="form-control">
                                        </div>
                                        <div class="col-md-4 pt-2">       
                                            <label for="">Year Graduated</label>
                                            <input type="text" name="col_year_graduated" value="<?=$data['col_year_graduated']?>" placeholder="Enter Year Graduated"  class="form-control">
                                        </div>
                                        <div class="col-md-4 pt-2">       
                                            <label for="">Inclusive Dates</label>
                                            <input type="text" name="col_inclusive_dates" value="<?=$data['col_inclusive_dates']?>" placeholder="Enter Inclusive Dates"  class="form-control">
                                        </div>
                                        <div class="col-md-4 pt-2 mb-3">       
                                            <label for="">Honors Received</label>
                                            <input type="text" name="col_honors_received" value="<?=$data['col_honors_received']?>" placeholder="Enter Honors"  class="form-control">
                                        </div>

                                        <h3>Graduate</h3>

                                        <div class="col-md-6 pt-2 ">       
                                            <label for="">Name of School</label>
                                            <input type="text" name="grad_school" value="<?=$data['grad_school']?>" placeholder="Enter School Name"  class="form-control">
                                        </div>
                                        <div class="col-md-2 pt-2">       
                                            <label for="">Year Graduated</label>
                                            <input type="text" name="grad_year_graduated" value="<?=$data['grad_year_graduated']?>" placeholder="Enter Year Graduated"  class="form-control">
                                        </div>
                                        <div class="col-md-2 pt-2">       
                                            <label for="">Inclusive Dates</label>
                                            <input type="text" name="grad_inclusive_dates" value="<?=$data['grad_inclusive_dates']?>" placeholder="Enter Inclusive Dates"  class="form-control">
                                        </div>
                                        <div class="col-md-6 pt-2">       
                                            <label for="">Honors Received</label>
                                            <input type="text" name="grad_honors_received" value="<?=$data['grad_honors_received']?>" placeholder="Enter Honors"  class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Past Work Experiences</h4>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-8 mb-3">
                                        <label for="">Past Work Experience</label>
                                        <textarea  class="form-control" name="past_exp" placeholder="Enter Past Experiences" id=""><?=$data['past_exp']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Seminars Attended</h4>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-8 mb-3">
                                        <label for="">Seminars Attended</label>
                                        <textarea  class="form-control" name="seminars_attended" placeholder="Enter Seminars Attended" id=""><?=$data['seminars_attended']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Special Skills</h4>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-8 mb-3">
                                        <label for="">Special Skills</label>
                                        <textarea  class="form-control" name="special_skills"  placeholder="Enter Special Skills" id=""><?=$data['special_skills']?></textarea>
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label for="">Certificates</label>
                                        <?php
                                        // Get the user ID from the URL query string
                                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                                            $user_id = $_GET['id']; // Get the user_id from the URL (e.g., show.php?id=24)
                                        } else {
                                            // Handle the case where there is no valid user_id in the URL
                                            echo "Invalid or missing user ID.";
                                            exit;
                                        }

                                        // SQL query to fetch certificates for the given user_id
                                        $sql = "SELECT certificates FROM credentials WHERE id = '$user_id'";
                                        $result = mysqli_query($con, $sql);

                                        if (!$result) {
                                            die("SQL Error: " . mysqli_error($con)); // Show SQL errors
                                        }

                                        if (mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);
                                            $certificates = $row['certificates']; // Get the JSON string

                                            // Decode the JSON into an associative array
                                            $certificatesArray = json_decode($certificates, true);

                                            // Check if decoding was successful
                                            if ($certificatesArray === null) {
                                                // Optionally handle the error
                                                echo "Error decoding JSON: " . json_last_error_msg();
                                            } else {
                                                // Display certificates in a styled format
                                                echo "<div class='certificate-container'>";
                                                echo "<h2>Certificates</h2>";
                                                echo "<p>Below are the certificates associated with this user:</p>";
                                                
                                                $certificateCount = 1; // Counter for "Certificate 1", "Certificate 2", etc.
                                                foreach ($certificatesArray as $file) {
                                                    echo "<div class='certificate-item'>";
                                                    // Change the link text to "Certificate X"
                                                    echo "<a href='../" . htmlspecialchars($file) . "' target='_blank' class='certificate-link'>Certificate " . $certificateCount . "</a>";
                                                    echo "</div>";
                                                    $certificateCount++; // Increment the counter
                                                }
                                                
                                                echo "</div>";
                                            }
                                        } else {
                                            echo "<div class='certificate-container'>";
                                            echo "<p>No certificates found for this user.</p>";
                                            echo "</div>";
                                        }
                                        ?>


                                    </div> 
                                </div>
                            </div>
                            <div class="card">
                            <div class="card-header">
                                <h4>Desired Job Position</h4>
                            </div>

                            <div class="card-body">

                           <div class="col-md-8 mb-5">
                                <div class="col-md-6 mb-3">
                                    <h5>Job Type</h5>
                                    <select class="form-select" name="academic_role">
                                        <option value="Academic" <?= $data['academic_role'] == 'Academic' ? 'selected' : '' ?>>Academic</option>
                                        <option value="Non Academic" <?= $data['academic_role'] == 'Non Academic' ? 'selected' : '' ?>>Non Academic</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <h5>Job Schedule</h5>
                                    <select class="form-select" name="campus_name">
                                        <option value="Full Time Faculty" <?= $data['campus_name'] == 'Full Time Faculty' ? 'selected' : '' ?>>Full Time Faculty</option>
                                        <option value="Part Time Faculty" <?= $data['campus_name'] == 'Part Time Faculty' ? 'selected' : '' ?>>Part Time Faculty</option>
                                    </select>
                                </div>

                                    
                                        <h5>Department</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <select class="form-select" name="department">
                                                <option value="Grade School Department" <?= $data['department'] == 'Grade School Department' ? 'selected' : '' ?>>Grade School Department</option>
                                                <option value="Junior High School Department" <?= $data['department'] == 'Junior High School Department' ? 'selected' : '' ?>>Junior High School Department</option>
                                                <option value="Senior High School Department" <?= $data['department'] == 'Senior High School Department' ? 'selected' : '' ?>>Senior High School Department</option>
                                                <option value="College Department" <?= $data['department'] == 'College Department' ? 'selected' : '' ?>>College Department</option>
                                                <option value="Graduate School" <?= $data['department'] == 'Graduate School' ? 'selected' : '' ?>>Graduate School</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                        </div>

                        <?php

                        if (isset($_GET['id'])) {
                            $applicantId = intval($_GET['id']); // Ensure it's an integer for security

                            // Fetch data from `credential_scores` table
                            $query = "SELECT * FROM credential_scores WHERE credential_id = ?";
                            $stmt = $con->prepare($query);
                            $stmt->bind_param("i", $applicantId);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $scoreData = $result->fetch_assoc();

                            if ($scoreData) {
                                // Extract scores
                                $gradSchoolScore = $scoreData['grad_school_score'];
                                $gradHonorsScore = $scoreData['grad_honors_score'];
                                $pastExpScore = $scoreData['past_exp_score'];
                                $seminarsScore = $scoreData['seminars_attended_score'];
                                $skillsScore = $scoreData['special_skills_score'];
                                $certificatesScore = $scoreData['certificates_score'];
                                $totalScore = $scoreData['total_score'];

                                // Assign weights to each criterion
                                $weights = [
                                    'grad_school_score' => 0.2,
                                    'grad_honors_score' => 0.2,
                                    'past_exp_score' => 0.2,
                                    'seminars_attended_score' => 0.2,
                                    'special_skills_score' => 0.1,
                                    'certificates_score' => 0.1
                                ];

                                // Calculate weighted average using SAW
                                $weightedAverage = (
                                    ($gradSchoolScore * $weights['grad_school_score']) +
                                    ($gradHonorsScore * $weights['grad_honors_score']) +
                                    ($pastExpScore * $weights['past_exp_score']) +
                                    ($seminarsScore * $weights['seminars_attended_score']) +
                                    ($skillsScore * $weights['special_skills_score']) +
                                    ($certificatesScore * $weights['certificates_score'])
                                );
                            } else {
                                echo "No scores found for this applicant.";
                            }
                        } else {
                            echo "Invalid applicant ID.";
                        }
                        ?>


<div class="card">
    <div class="card-header">
        Summary of Points
    </div>
    <div class="card-body">
        <?php if (isset($scoreData)): ?>
            <p><strong>Grad School Score:</strong> <?= $gradSchoolScore ?></p>
            <p><strong>Grad Honors Score:</strong> <?= $gradHonorsScore ?></p>
            <p><strong>Past Experience Score:</strong> <?= $pastExpScore ?></p>
            <p><strong>Seminars Attended Score:</strong> <?= $seminarsScore ?></p>
            <p><strong>Special Skills Score:</strong> <?= $skillsScore ?></p>
            <p><strong>Certificates Score:</strong> <?= $certificatesScore ?></p>
            <p><strong>Total Score:</strong> <?= $totalScore ?></p>
            <p><strong>Weighted Average Score:</strong> <?= number_format($weightedAverage, 2) ?></p>
        <?php else: ?>
            <p>No score data available for this applicant.</p>
        <?php endif; ?>
        <textarea class="form-control" name="remarks" placeholder="Enter Remarks" id=""><?= isset($data['remarks']) ? $data['remarks'] : '' ?></textarea>
    </div>
</div>
                        <div class="card">
                                <div class="card-header">
                                    Deans' Remarks
                                </div>
                                <div class="card-body">                                       
                                        <textarea  class="form-control" name="remarks" placeholder="Enter Remarks" id=""><?=$data['remarks']?></textarea>
                                    
                                </div>
                            </div>

                           
                            <div class="col-md-12">
                                <button class="btn btn-primary" name="edit_credentials" type="submit" id="updateButton" >Update</button>
                            </div>
                        </form>
                    <?php
                        }else{
                            echo "Credentials Not Found";
                        }
                        }else{
                            echo "ID missing from URL";
                        }
                    ?>
                    <?php include("includes/footer.php"); ?>

            </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const experienceInput = document.querySelector('input[name="experience"]');
    const educationInput = document.querySelector('input[name="education"]');
    const techSkillsInput = document.querySelector('input[name="tech_skills"]');
    const softSkillsInput = document.querySelector('input[name="soft_skills"]');
    const interviewInput = document.querySelector('input[name="interview"]');
    const sawScoreInput = document.querySelector('input[name="saw_score"]');

    function calculateSAWScore() {
        const experience = parseFloat(experienceInput.value) || 0;
        const education = parseFloat(educationInput.value) || 0;
        const techSkills = techSkillsInput.value.length; // Example: count characters
        const softSkills = softSkillsInput.value.length; // Example: count characters
        const interviewScore = parseFloat(interviewInput.value) || 0;

        // Example weights (you can adjust these based on your criteria)
        const weights = {
            experience: 0.25,
            education: 0.25,
            techSkills: 0.2,
            softSkills: 0.2,
            interviewScore: 0.1
        };

        const sawScore = (experience * weights.experience) +
                         (education * weights.education) +
                         (techSkills * weights.techSkills) +
                         (softSkills * weights.softSkills) +
                         (interviewScore * weights.interviewScore);

        sawScoreInput.value = sawScore.toFixed(2); // Display score with two decimal places
    }

    // Add event listeners to input fields
    experienceInput.addEventListener('input', calculateSAWScore);
    educationInput.addEventListener('input', calculateSAWScore);
    techSkillsInput.addEventListener('input', calculateSAWScore);
    softSkillsInput.addEventListener('input', calculateSAWScore);
    interviewInput.addEventListener('input', calculateSAWScore);
});
</script>
</body>



        </div>
    </div>



