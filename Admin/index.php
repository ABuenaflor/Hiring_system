<?php
    include("../config/dbcon.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Include Chart.js -->
    <style>
        /* Basic styling for the modal */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <?php include("includes/header.php");?>

        <div class="container">
            <?php 
            if (isset($_GET['status'])) {
                $status = $_GET['status'];
                $query = "SELECT * FROM user WHERE status = ?";
                
                $stmt = $con->prepare($query);
                $stmt->bind_param("s", $status);
                $stmt->execute();
                $result = $stmt->get_result();
            
                $users = [];
                while ($row = $result->fetch_assoc()) {
                    $users[] = $row;
                }
            
                echo json_encode($users);
                $stmt->close();
            }
                $queries = [
                    "SELECT job_type, COUNT(*) as applicant_count FROM credentials GROUP BY job_type",
                    "SELECT job_schedule, COUNT(*) as applicant_count FROM credentials GROUP BY job_schedule",
                    "SELECT campus_name, COUNT(*) as applicant_count FROM credentials GROUP BY campus_name",
                    "SELECT department, COUNT(*) as applicant_count FROM credentials GROUP BY department",
                    "SELECT status, COUNT(*) as user_count FROM user GROUP BY status"  // New query for user status

                ];
                $data = [];
                foreach ($queries as $query) {
                    $result = $con->query($query);
                    
                    if ($result === false) {
                        die("Query failed: " . $con->error);
                    }
                    
                    $counts = [];
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $counts[] = $row;
                        }
                    }
                    $data[] = $counts; // Store the result for each query
                }
             
                $job_types = [];
                $job_counts = [];
                if (!empty($data[0])) {
                    foreach ($data[0] as $row) {
                        $job_types[] = $row['job_type'];
                        $job_counts[] = $row['applicant_count'];
                    }
                }
                
                $job_schedules = [];
                $schedule_counts = [];
                if (!empty($data[1])) {
                    foreach ($data[1] as $row) {
                        $job_schedules[] = $row['job_schedule'];
                        $schedule_counts[] = $row['applicant_count'];
                    }
                }
                
                $campus_names = [];
                $campus_counts = [];
                if (!empty($data[2])) {
                    foreach ($data[2] as $row) {
                        $campus_names[] = $row['campus_name'];
                        $campus_counts[] = $row['applicant_count'];
                    }
                }
                
                $departments = [];
                $department_counts = [];
                if (!empty($data[3])) {
                    foreach ($data[3] as $row) {
                        $departments[] = $row['department'];
                        $department_counts[] = $row['applicant_count'];
                    }
                }
             // Prepare data for user status chart
                $status_labels = [];
                $status_counts = [];
                if (!empty($data[4])) {
                    foreach ($data[4] as $row) {
                        // Change the labels here: if status is 'enabled', set it to 'Disabled'
                        // If status is 'disabled', set it to 'Enabled'
                        if ($row['status'] === 'enabled') {
                            $status_labels[] = 'Disabled'; // Change 'enabled' to 'Disabled'
                        } else {
                            $status_labels[] = 'Enabled'; // Change 'disabled' to 'Enabled'
                        }
                        $status_counts[] = $row['user_count'];
                    }
                }
             
             $con->close();
            ?>
           <h2>Applicant by Job Type</h2>
    <canvas id="jobTypeChart" width="400" height="200"></canvas>
    
    <h2>Applicant by Job Schedule</h2>
    <canvas id="jobScheduleChart" width="400" height="200"></canvas>
    
    <h2>Applicant by Campus Name</h2>
    <canvas id="campusChart" width="400" height="200"></canvas>
    
    <h2>Applicant by Department</h2>
    <canvas id="departmentChart" width="400" height="200"></canvas>

    <h2>User Accounts Status</h2>
    <canvas id="statusChart" width="400" height="200"></canvas>  <!-- New Chart for User Status -->

    <!-- Modal for displaying user details -->
    <div id="userModal" class="modal">
        <div class="modal-content">
            <span id="closeModal" style="cursor:pointer; float:right;">&times;</span>
            <h2>User Details</h2>
            <table id="userDetailsTable" border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- User details will be populated here -->
                </tbody>
            </table>
        </div>
    </div>
    <script>
        // Job Type Chart
        const ctxJobType = document.getElementById('jobTypeChart').getContext('2d');
        const jobTypeChart = new Chart(ctxJobType, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($job_types); ?>,
                datasets: [{
                    label: 'Number of Applicants by Job Type',
                    data: <?php echo json_encode($job_counts); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Job Schedule Chart
        const ctxJobSchedule = document.getElementById('jobScheduleChart').getContext('2d');
        const jobScheduleChart = new Chart(ctxJobSchedule, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($job_schedules); ?>,
                datasets: [{
                    label: 'Number of Applicants by Job Schedule',
                    data: <?php echo json_encode($schedule_counts); ?>,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Campus Chart
        const ctxCampus = document.getElementById('campusChart').getContext('2d');
        const campusChart = new Chart(ctxCampus, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($campus_names); ?>,
                datasets: [{
                    label: 'Number of Applicants by Campus Name',
                    data: <?php echo json_encode($campus_counts); ?>,
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Department Chart
        const ctxDepartment = document.getElementById('departmentChart').getContext('2d');
        const departmentChart = new Chart(ctxDepartment, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($departments); ?>,
                datasets: [{
                    label: 'Number of Applicants by Department',
                    data: <?php echo json_encode($department_counts); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        // User Accounts Status Chart
        const ctxStatus = document.getElementById('statusChart').getContext('2d');
        const statusChart = new Chart(ctxStatus, {
            type: 'bar', // You can change this to 'bar', 'line', etc.
            data: {
                labels: <?php echo json_encode($status_labels); ?>,
                datasets: [{
                    label: 'User Accounts Status',
                    data: <?php echo json_encode($status_counts); ?>,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', // Color for disabled accounts
                        'rgba(255, 99, 132, 0.2)'  // Color for enabled accounts
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Enabled vs Disabled User Accounts'
                    }
                }
            }
        });

        // Add click event listener to the status chart
        statusChart.canvas.onclick = function(evt) {
            const activePoints = statusChart.getElementsAtEventForMode(evt, 'nearest', { intersect: true }, true);
            if (activePoints.length) {
                const firstPoint = activePoints[0];
                const status = statusChart.data.labels[firstPoint.index]; // Get the status clicked
                const userStatus = status === 'Enabled' ? 'enabled' : 'disabled'; // Adjust status for query

                // Fetch user details based on the clicked status
                fetch(`fetch_user_details.php?status=${userStatus}`)
                    .then(response => response.json())
                    .then(data => {
                        const tableBody = document.querySelector("#userDetailsTable tbody");
                        tableBody.innerHTML = ""; // Clear previous entries
                        data.forEach(user => {
                            const row = document.createElement("tr");
                            row.innerHTML = `
                                <td>${user.id}</td>
                                <td>${user.name}</td>
                                <td>${user.email}</td>
                                <td>${user.status}</td>
                            `;
                            tableBody.appendChild(row);
                        });

                        // Show the modal
                        document.getElementById("userModal").style.display = "block";
                    });
            }
        };

        // Close modal event
        document.getElementById("closeModal").onclick = function() {
            document.getElementById("userModal").style.display = "none";
        };

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            const modal = document.getElementById("userModal");
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };
    </script>
        </div>
    </div>
</body>
</html>