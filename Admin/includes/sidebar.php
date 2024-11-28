<?php 
?>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

*,
::after,
::before {
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    font-size: 0.875rem;
    opacity: 1;
    overflow-y: scroll;
    margin: 0;
}

a {
    cursor: pointer;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
}

li {
    list-style: none;
}

h4 {
    font-family: 'Poppins', sans-serif;
    font-size: 1.275rem;
    color: var(--bs-emphasis-color);
}

/* Layout for admin dashboard skeleton */

.wrapper {
  align-items: stretch;
    display: flex;
    width: 100%;
    top: 0;
    left: 0;
    right: 0;

}

#sidebar {
    max-width: 264px;
    min-width: 264px;
    background: var(--bs-dark);
    transition: all 0.35s ease-in-out;
}

.main {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    min-width: 0;
    overflow: hidden;
    transition: all 0.35s ease-in-out;
    width: 100%;
    background: var(--bs-dark-bg-subtle);
    position: fixed;
    top: 0;
    left: 264px; /* Adjust this value based on your sidebar width */
    right: 0;
    bottom: 0;
}

/* Sidebar Elements Style */

.sidebar-logo {
    padding: 1.15rem;
}

.sidebar-logo a {
    color: #e9ecef;
    font-size: 1.15rem;
    font-weight: 600;
}

.sidebar-nav {
    list-style: none;
    margin-bottom: 0;
    padding-left: 0;
    margin-left: 0;
}

.sidebar-header {
    color: #e9ecef;
    font-size: .75rem;
    padding: 1.5rem 1.5rem .375rem;
}

a.sidebar-link {
    padding: .625rem 1.625rem;
    color: #e9ecef;
    position: relative;
    display: block;
    font-size: 0.875rem;
}

.sidebar-link[data-bs-toggle="collapse"]::after {
    border: solid;
    border-width: 0 .075rem .075rem 0;
    content: "";
    display: inline-block;
    padding: 2px;
    position: absolute;
    right: 1.5rem;
    top: 1.4rem;
    transform: rotate(-135deg);
    transition: all .2s ease-out;
}

.sidebar-link[data-bs-toggle="collapse"].collapsed::after {
    transform: rotate(45deg);
    transition: all .2s ease-out;
}

.avatar {
    height: 40px;
    width: 40px;
}

.navbar-expand .navbar-nav {
    margin-left: auto;
}

.content {
    flex: 1;
    max-width: 100vw;
    width: 100vw;
}

@media (min-width:768px) {
    .content {
        max-width: auto;
        width: auto;
    }
}

.card {
    box-shadow: 0 0 .875rem 0 rgba(34, 46, 60, .05);
    margin-bottom: 24px;
}

.illustration {
    background-color: var(--bs-primary-bg-subtle);
    color: var(--bs-emphasis-color);
}

.illustration-img {
    max-width: 150px;
    width: 100%;
}

/* Sidebar Toggle */

#sidebar.collapsed {
    margin-left: -264px;
}

/* Footer and Nav */

@media (max-width:767.98px) {

    .js-sidebar {
        margin-left: -264px;
    }

    #sidebar.collapsed {
        margin-left: 0;
    }

    .navbar,
    footer {
        width: 100vw;
    }
}

/* Theme Toggler */

.theme-toggle {
    position: fixed;
    top: 50%;
    transform: translateY(-65%);
    text-align: center;
    z-index: 10;
    right: 0;
    left: auto;
    border: none;
    background-color: var(--bs-body-color);
}

html[data-bs-theme="dark"] .theme-toggle .fa-sun,
html[data-bs-theme="light"] .theme-toggle .fa-moon {
    cursor: pointer;
    padding: 10px;
    display: block;
    font-size: 1.25rem;
    color: #FFF;
}

html[data-bs-theme="dark"] .theme-toggle .fa-moon {
    display: none;
}

html[data-bs-theme="light"] .theme-toggle .fa-sun {
    display: none;
}

</style>
<aside id="sidebar" class="js-sidebar" style="position: relative !important;">
    <!-- Content For Sidebar -->

    <div class="container-for-navlinks" style="position: fixed; width: 264px;">
        <div class="h-100">
            <div class="sidebar-logo">
                <a href="#">HR DWCL</a>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Admin Elements
                </li>
                <li class="sidebar-item">
                    <a href="index.php" class="sidebar-link">
                        <i class="fa-solid fa-list pe-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                        aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
                        Applications
                    </a>
                    <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="applications.php" class="sidebar-link">Show List of Applicants</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="filter_applicants.php" class="sidebar-link">Filter Applicants</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse"
                        aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                        Ranking
                    </a>
                    <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                      <!--   <li class="sidebar-item">
                            <a href="add_employee_ranking.php" class="sidebar-link">Add Employee To Rank</a>
                        </li> -->
                        <li class="sidebar-item">
                            <a href="ranking.php" class="sidebar-link">Show List of Employees</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="department.php" class="sidebar-link">Department</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="campus.php" class="sidebar-link">Campus</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="academic_rank.php" class="sidebar-link">Academic Rank</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="position.php" class="sidebar-link">Academic Role</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="post_job_role.php" class="sidebar-link">Add Job Role</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse"
                        aria-expanded="false"><i class="fa-regular fa-user pe-2"></i>
                        Others
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="add_inst_role.php" class="sidebar-link">Institutional Role</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="job_posting.php" class="sidebar-link">Job Posting</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="generate_report.php" class="sidebar-link">Generation of Reports</a>
                        </li>
                       <!--  <li class="sidebar-item">
                            <a href="display_report.php" class="sidebar-link">Report Visualization</a>
                        </li> -->
                        <li class="sidebar-item">
                            <a href="user_accounts.php" class="sidebar-link">Accounts</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="approve_accounts.php" class="sidebar-link">Pending Accounts</a>
                        </li>
                    </ul>
                </li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</aside>

