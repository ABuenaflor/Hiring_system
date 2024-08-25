<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="index.php">
        <span class="ms-5 font-weight-bold text-white">DWCL HR</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">

      <li>
    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link text-white">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
        </div>
        <span class="nav-link-text ms-1">Applications</span>
    </a>
    <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
        <li>
            <a href="applications.php" class="nav-link text-white"> <span class="nav-link-text ms-1">Show List of Applicants</span></a>
        </li>
        <li class="w-100">
            <a href="filter_applicants.php" class="nav-link text-white"> <span class="nav-link-text ms-1">Filter Applicants</span></a>
        </li>
        
    </ul>
</li>

        <!-- remove dating ranking sidenav  
        <li class="nav-item">
          <a class="nav-link text-white " href="ranking.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Rankings</span>
          </a>
        </li>
-->

<!-- add dropdown  -->
        <li>
          <a href="#submenu2" data-bs-toggle="collapse" class="nav-link text-white">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Ranking</span>
          </a>
          <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="add_employee_ranking.php" class="nav-link text-white"> <span class="nav-link-text ms-1">Add Employee</span></a>
                </li>
                <li>
                    <a href="department.php" class="nav-link text-white"> <span class="nav-link-text ms-1">Department</span></a>
                </li>
                <li>
                    <a href="campus.php" class="nav-link text-white"> <span class="nav-link-text ms-1">Campus</span></a>
                </li>
                <li>
                    <a href="academic_rank.php" class="nav-link text-white"> <span class="nav-link-text ms-1">Academic Rank</span></a>
                </li>
                <li>
                    <a href="position.php" class="nav-link text-white"> <span class="nav-link-text ms-1">Add Position</span></a>
                </li>
                <li>
                    <a href="ranking.php" class="nav-link text-white"> <span class="nav-link-text ms-1">Show List of Employees</span></a>
                </li>
                <li>
                    <a href="rank_employee_ranking.php" class="nav-link text-white"> <span class="nav-link-text ms-1">Rank Employee</span></a>
                </li>
                
            </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/tables.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Generation of Reports</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/tables.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Accounts</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" 
        href="../logout.php">Logout</a>
      </div>
    </div>
  </aside>

