<?php 
//session_start();
//changed from include to require once
require_once ("../code.php");
require_once("../functions/myFunctions.php"); 
require_once("includes/header.php"); ?>


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
                                        <input  type="file" class="form-control" name="image" id=""></input>
                                        <label for="">Uploaded Certificate: </label>
                                        <input type="hidden" name="old_image" value="<?=$data['image']?>">
                                        <img src="../uploads/<?=$data['image']?>" height="100px" width="100px" alt="uploaded-image">
                                    </div> 
                                </div>
                            </div>
                            <div class="card">
                            <div class="card-header">
                                <h4>Desired Job Position</h4>
                            </div>
                            <div class="card-body">
                            <h5>Job Type</h5>
                                <div class="form-check" name="job_type">
                                    <input class="form-check-input" type="radio" name="job_type" value="<?=$data['job_type']?>" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Academic
                                    </label>
                                </div>
                                <div class="form-check mb-3" name="job_type">
                                    <input class="form-check-input" type="radio" name="job_type" vale="<?=$data['job_type']?>" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Non-Academic
                                    </label>
                                </div>  
                                <h5>Job Schedule</h5>
                                <div class="form-check" name="job_schedule">
                                    <input class="form-check-input" type="radio" name="job_schedule" value="<?=$data['job_schedule']?>" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Full Time Faculty
                                    </label>
                                </div>
                                <div class="form-check mb-3" name="job_schedule">
                                    <input class="form-check-input" type="radio" name="job_schedule" value="<?=$data['job_schedule']?>" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Part Time Faculty
                                    </label>
                                </div>
                                <div class="cold-md-8">
                                    <h5>Department</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check" name="department">
                                                <input class="form-check-input" type="radio" name="department"  id="gradeSchool" value="<?=$data['department']?>">
                                                <label class="form-check-label" for="gradeSchool">
                                                    Grade School Department
                                                </label>
                                            </div>
                                            <div class="form-check" name="department">
                                                <input class="form-check-input" type="radio" name="department"  id="juniorHigh" value="<?=$data['department']?>">
                                                <label class="form-check-label" for="juniorHigh">
                                                    Junior High School Department
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check" name="department">
                                                <input class="form-check-input" type="radio" name="department"   id="seniorHigh" value="<?=$data['department']?>">
                                                <label class="form-check-label" for="seniorHigh">
                                                    Senior High School Department
                                                </label>
                                            </div>
                                            <div class="form-check" name="department">
                                                <input class="form-check-input" type="radio" name="department"   id="college" value="<?=$data['department']?>">
                                                <label class="form-check-label" for="college">
                                                    College Department
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check" name="department">
                                                <input class="form-check-input" type="radio" name="department"   id="graduateSchool" value="<?=$data['department']?>">
                                                <label class="form-check-label" for="graduateSchool">
                                                    Graduate School
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Criteria</h4>
                                </div>
                            <div class="card-body">
                            <div class="col-md-2">
                                    <label for="">Experience (Years)</label>
                                    <input type="number" name="experience" value="<?=$data['experience']?>" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Education Level</label>
                                    <input type="number" name="education" value="<?=$data['education']?>" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Technical Skills</label>
                                    <input type="text" name="tech_skills" value="<?=$data['tech_skills']?>" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Soft Skills</label>
                                    <input type="text" name="soft_skills" value="<?=$data['soft_skills']?>" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Interview Score</label>
                                    <input type="number" name="interview" value="<?=$data['interview']?>" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="">SAW Score</label>
                                    <input type="text" name="saw_score" class="form-control" readonly>
                                </div>
                            </div>
                            </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary" name="edit_credentials" type="submit">Update</button>
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
            </div>
        </div>
    </div>

<?php include("includes/footer.php"); ?>


