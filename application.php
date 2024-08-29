<?php 
session_start();
include("includes/header.php"); ?>

<style>
        :root {
  --primary-color: rgb(11, 78, 179);
}

*,
*::before,
*::after {
  box-sizing: border-box;
}

body {
  font-family: Montserrat, "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  margin: 0;
  /*display: grid; */
  /*place-items: center; */
  min-height: 100vh;
}
/* Global Stylings */
label {
  display: block;
  margin-bottom: 0.5rem;
}

input {
  display: block;
  width: 100%;
  padding: 0.75rem;
  border: 1px solid #ccc;
  border-radius: 0.25rem;
}

.width-50 {
  width: 50%;
}

.ml-auto {
  margin-left: auto;
}

.text-center {
  text-align: center;
}

/* Progressbar */
.progressbar {
  position: relative;
  display: flex;
  justify-content: space-between;
  counter-reset: step;
  margin: 2rem 0 4rem;
}

.progressbar::before,
.progress {
  content: "";
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  height: 4px;
  width: 100%;
  background-color: #dcdcdc;
  z-index: -1;
}

.progress {
  background-color: var(--primary-color);
  width: 0%;
  transition: 0.3s;
}

.progress-step {
  width: 2.1875rem;
  height: 2.1875rem;
  background-color: #dcdcdc;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.progress-step::before {
  counter-increment: step;
  content: counter(step);
}

.progress-step::after {
  content: attr(data-title);
  position: absolute;
  top: calc(100% + 0.5rem);
  font-size: 0.85rem;
  color: #666;
}

.progress-step-active {
  background-color: var(--primary-color);
  color: #f3f3f3;
}

/* Form */
.form {
  width: clamp(800px, 30%, 800px);
  margin: 0 auto;
  border: 1px solid #ccc;
  border-radius: 0.35rem;
  padding: 1.5rem;
}

.form-step {
  display: none;
  transform-origin: top;
  animation: animate 0.5s;
}

.form-step-active {
  display: block;
}

.input-group {
  margin: 2rem 0;
}

@keyframes animate {
  from {
    transform: scale(1, 0);
    opacity: 0;
  }
  to {
    transform: scale(1, 1);
    opacity: 1;
  }
}

/* Button */
.btns-group {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1.5rem;
}

.btn {
  padding: 0.75rem;
  display: block;
  text-decoration: none;
  background-color: var(--primary-color);
  color: #f3f3f3;
  text-align: center;
  border-radius: 0.25rem;
  cursor: pointer;
  transition: 0.3s;
}
.btn:hover {
  box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primary-color);
}
    </style>

<div class="py-2">
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


<body>
<form action="code.php" class="form" method="POST" enctype="multipart/form-data">
    <h1 class="text-center">Application Form</h1>
        <div class="progressbar">
            <div class="progress" id="progress"></div>
            <div
            class="progress-step progress-step-active"
            data-title="Personal Credentials"
            ></div>
            <div class="progress-step" data-title="Family Background"></div>
            <div class="progress-step" data-title="Education"></div>
            <div class="progress-step" data-title="Experience, Skills, and Seminars"></div>
            <div class="progress-step" data-title="Desired Position"></div>
        </div>

        <div class="form-step form-step-active">
        <div class="col-md-4">
            <label for="">Date of Application</label>
            <input type="date" name="date_applied" placeholder="Enter Date" class="form-control">
        </div>
        

        <div class="row mb-3">
            <div class="col-md-4 mb-3">
                <label for="">First Name</label>
                <input type="text" name="first_name" placeholder="Enter First Name" class="form-control">
            </div>
        <div class="col-md-4">
                <label for="">Middle Name</label>
                <input type="text" name="middle_name" placeholder="Enter Middle Name" class="form-control">
            </div>
        <div class="col-md-4">
                <label for="">Last Name</label>
                <input type="text" name="last_name" placeholder="Enter Last Name" class="form-control">
        </div>
        <div class="col-md-2 mb-3">
                <label for="">Date of Birth</label>
                <input type="date" name="date_of_birth"  class="form-control">
        </div>
        <div class="col-md-6 mt-4">
                <label for="">Place of Birth</label>
                <input type="text" name="place_of_birth" placeholder="Enter Place of Birth" class="form-control">
        </div>
        <div class="col-md-2 mt-4">
                <label for="">Sex</label>
                    <select name="sex" id="" class="form-control">
                        <option selected>Choose</option>
                        <option value="male" >Male</option>
                        <option value="female">Female</option>
                    </select>
        </div>
        <div class="col-md-2 mt-4">
                <label for="">Civil Status</label>
                <input type="text" name="civil_status" placeholder="Enter Civil Status"  class="form-control">
        </div>
        <div class="col-md-6 mb-3">
                <label for="">Citizenship</label>
                <input type="text" name="citizenship" placeholder="Enter Citizenship"  class="form-control">
        </div>
        <div class="col-md-2">
                 <label for="">Height</label>
                <input type="text" name="height" placeholder="Enter Height"  class="form-control">
                                        </div>
        <div class="col-md-2">
            <label for="">Weight</label>
            <input type="text" name="weight" placeholder="Enter Weight"  class="form-control">
        </div>
        <div class="col-md-2">
            <label for="">Blood Type</label>
            <input type="text" name="blood_type" placeholder="Enter Blood Type"  class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">PAG-IBIG</label>
            <input type="text" name="pag_ibig" placeholder="Enter PAG-IBIG Number"  class="form-control">
        </div>
        <div class="col-md-6">
            <label for="">PhilHealth</label>
            <input type="text" name="philhealth" placeholder="Enter PhilHealth Number"  class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">TIN</label>
            <input type="text" name="tin" placeholder="Enter TIN Number"  class="form-control">
        </div>
        <div class="col-md-6">
            <label for="">SSS</label>
            <input type="text" name="sss" placeholder="Enter SSS Number"  class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Residential Address</label>
            <textarea  class="form-control" name="residential_address"  placeholder="Enter Residential Address" id=""></textarea>
        </div>
        <div class="col-md-6">
            <label for="">Permanent Address</label>
            <textarea  class="form-control" name="permanent_address"  placeholder="Enter Permanent Address" id=""></textarea>
        </div>
        <div class="col-md-4 mb-3s">
            <label for="">Contact Number</label>
            <input type="text" name="contact_number" placeholder="Enter Contact Number"  class="form-control">
        </div>
        <div class="col-md-4">
            <label for="">Email Address</label>
            <input type="text" name="email_address" placeholder="Enter Email Address"  class="form-control">
        </div>
        <div class="col-md-4">
            <label for="">Religion</label>
            <input type="text" name="religion" placeholder="Enter Religion"  class="form-control">
        </div>
        </div>
        
        <div class="">
          <a href="#" class="btn btn-next width-50 ml-auto">Next</a>
        </div>
      </div>
      <!-- End of page 1 -->

            <!-- Page 2 -->
        <div class="form-step">
        <h3>Father's Information</h3>
        <div class="col-md-6 pt-2">       
            <label for="">First Name</label>
            <input type="text" name="father_fname" placeholder="Enter First Name"  class="form-control">
        </div>
        <div class="col-md-6 pt-2">
            <label for="">Middle Name</label>
            <input type="text" name="father_mname" placeholder="Enter Middle Name"  class="form-control">
        </div>
        <div class="col-md-6 pt-4 mb-5">
            <label for="">Last Name</label>
            <input type="text" name="father_sname" placeholder="Enter Last Name"  class="form-control">
        </div>
        <h3>Mother's Information</h3>
        <div class="col-md-6 pt-2">       
            <label for="">First Name</label>
            <input type="text" name="mother_fname" placeholder="Enter First Name"  class="form-control">
        </div>
        <div class="col-md-6 pt-2">
            <label for="">Middle Name</label>
            <input type="text" name="mother_mname" placeholder="Enter Middle Name"  class="form-control">
        </div>
        <div class="col-md-6 pt-2 mb-3">
            <label for="">Last Name</label>
            <input type="text" name="mother_sname" placeholder="Enter Last Name"  class="form-control">
        </div>

    <div class="btns-group">
        <a href="#" class="btn btn-prev">Previous</a>
        <a href="#" class="btn btn-next">Next</a>
    </div>
    </div>
            <!--end of page 2 -->

 <!-- start of page 3 -->
    <div class="form-step">
    <div class="col-md-6 pt-2">    
    <h3>Elementary</h3>   
        <label for="">Name of School</label>
        <input type="text" name="elem_school" placeholder="Enter School Name"  class="form-control">
    </div>
    <div class="col-md-2 pt-2">       
        <label for="">Year Graduated</label>
        <input type="text" name="elem_year_graduated" placeholder="Enter Year Graduated"  class="form-control">
    </div>
    <div class="col-md-2 pt-2">       
        <label for="">Inclusive Dates</label>
        <input type="text" name="elem_inclusive_dates" placeholder="Enter Inclusive Dates"  class="form-control">
    </div>
    <div class="col-md-6 pt-2 mb-3">       
        <label for="">Honors Received</label>
        <input type="text" name="elem_honors_received" placeholder="Enter Honors"  class="form-control">
    </div>
    <h3>Secondary</h3>

    <div class="col-md-6 pt-2">       
        <label for="">Name of School</label>
        <input type="text" name="sec_school" placeholder="Enter School Name"  class="form-control">
    </div>
    <div class="col-md-2 pt-2">       
        <label for="">Year Graduated</label>
        <input type="text" name="sec_year_graduated" placeholder="Enter Year Graduated"  class="form-control">
    </div>
    <div class="col-md-2 pt-2">       
        <label for="">Inclusive Dates</label>
        <input type="text" name="sec_inclusive_dates" placeholder="Enter Inclusive Dates"  class="form-control">
    </div>
    <div class="col-md-6 pt-2 mb-3">       
        <label for="">Honors Received</label>
        <input type="text" name="sec_honors_received" placeholder="Enter Honors"  class="form-control">
    </div>

    <h3>Tertiary</h3>

    <div class="col-md-6 pt-2 ">       
        <label for="">Name of School</label>
        <input type="text" name="col_school" placeholder="Enter School Name"  class="form-control">
    </div>
    <div class="col-md-6 pt-2 ">       
        <label for="">Course</label>
        <input type="text" name="course" placeholder="Enter Course"  class="form-control">
    </div>
    <div class="col-md-4 pt-2">       
        <label for="">Year Graduated</label>
        <input type="text" name="col_year_graduated" placeholder="Enter Year Graduated"  class="form-control">
    </div>
    <div class="col-md-4 pt-2">       
        <label for="">Inclusive Dates</label>
        <input type="text" name="col_inclusive_dates" placeholder="Enter Inclusive Dates"  class="form-control">
    </div>
    <div class="col-md-4 pt-2 mb-3">       
        <label for="">Honors Received</label>
        <input type="text" name="col_honors_received" placeholder="Enter Honors"  class="form-control">
    </div>

    <h3>Graduate</h3>

    <div class="col-md-6 pt-2 ">       
        <label for="">Name of School</label>
        <input type="text" name="grad_school" placeholder="Enter School Name"  class="form-control">
    </div>
    <div class="col-md-2 pt-2">       
        <label for="">Year Graduated</label>
        <input type="text" name="grad_year_graduated" placeholder="Enter Year Graduated"  class="form-control">
    </div>
    <div class="col-md-2 pt-2">       
        <label for="">Inclusive Dates</label>
        <input type="text" name="grad_inclusive_dates" placeholder="Enter Inclusive Dates"  class="form-control">
    </div>
    <div class="col-md-6 pt-2 mb-5">       
        <label for="">Honors Received</label>
        <input type="text" name="grad_honors_received" placeholder="Enter Honors"  class="form-control">
    </div>

    <div class="btns-group">
        <a href="#" class="btn btn-prev">Previous</a>
        <a href="#" class="btn btn-next">Next</a>
    </div>
    </div> 
    
            <!--end of page 3 -->

            <!--start of page 4 -->
    <div class="form-step">
    <div class="col-md-8 mb-3">
        <h3 for="">Past Work Experience</h3>
        <textarea  class="form-control" name="past_exp"  placeholder="Enter Past Experiences" id=""></textarea>
    </div>
    <div class="col-md-8 mb-3">
        <h3 for="">Seminars Attended</h3>
        <textarea  class="form-control" name="seminars_attended"  placeholder="Enter Seminars Attended" id=""></textarea>
    </div>
    <div class="col-md-8 mb-3">
        <h3 for="">Special Skills</h3>
        <textarea  class="form-control" name="special_skills"  placeholder="Enter Special Skills" id=""></textarea>
    </div>
    <div class="col-md-8 mb-3">
        <h3 for="">Certificates</h3>
        <input  type="file" class="form-control" name="image" accept="image/*"></input>
    </div>
    
    <div class="btns-group">
        <a href="#" class="btn btn-prev">Previous</a>
        <a href="#" class="btn btn-next">Next</a>
    </div>
    </div>
<!--end of page 4 -->

<!--start of page 5 -->
<div class="form-step">
<div class="cold-md-8 mb-5">

<div class="col-md-6 mb-3">
    <h5>Institutional Role</h5>
      <select class="form-select" name="job_type">
          <option value="Academic">Academic</option>
          <option value="Non-Academic">Non Academic</option>
      </select>
</div>

<div class="col-md-6 mb-3">
      <h5>Academic Role</h5>
      <select class="form-select" name="job_schedule">
          <option value="Full Time Faculty">Full Time Faculty</option>
          <option value="Part Time Faculty">Part Time Faculty</option>
      </select>
</div>

<div class="col-md-6 mb-3">
      <h5>Campus</h5>
      <select class="form-select" name="campus_name">
          <option value="North Campus">North Campus</option>
          <option value="South Campus">South Capus</option>
      </select>
</div>
          <h5>Department</h5>
          <div class="row">
              <div class="col-md-6">
                  <select class="form-select" name="department">
                      <option value="Grade School">Grade School Department</option>
                      <option value="Junior High">Junior High School Department</option>
                      <option value="Senior High">Senior High School Department</option>
                      <option value="College">College Department</option>
                      <option value="Graduate School">Graduate School</option>
                  </select>
              </div>
          </div>
      </div>

        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <input type="submit" value="Submit" name="submit_credentials" class="btn" />
        </div>
      </div>

</form>
</body>
    <script>
        const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
  });
});

prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum--;
    updateFormSteps();
    updateProgressbar();
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("form-step-active") &&
      formStep.classList.remove("form-step-active");
  });

  formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() {
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active");
    } else {
      progressStep.classList.remove("progress-step-active");
    }
  });

  const progressActive = document.querySelectorAll(".progress-step-active");

  progress.style.width =
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}
    </script>

<?php include("includes/footer.php"); ?>