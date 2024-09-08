<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Our Team</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .bg-image {
            background-image: url('https://placehold.co/400x400.png');
            background-size: cover;
            background-position: center;
            height: 400px;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mb-4">
                <h1 class="display-4">Join Our Team</h1>
                <p class="lead">We are looking for a passionate individual to fill the role of Software Engineer. If you are eager to work in a dynamic environment and contribute to exciting projects, we want to hear from you!</p>
                <ul class="list-unstyled">
                    <li>Collaborate with cross-functional teams</li>
                    <li>Develop and maintain web applications</li>
                    <li>Participate in code reviews and team meetings</li>
                </ul>
                <a href="#" class="btn btn-primary">Apply Now</a>
            </div>
            <div class="col-md-6">
                <div class="bg-image"></div>
            </div>
        </div>
    </div>

    <?php
    // Database connection (adjust these details as needed)
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database_name";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query
    $query = "
        SELECT 
            posting_id,
            campus_id,
            dept_id,
            acad_role_id,
            inst_role_id,
            qualifications
        FROM 
            job_posting
        LIMIT 1
    ";

    // Execute query
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "
                <table id='jobDetailsTable' class='table table-striped'>
                    <thead>
                        <tr>
                            <th>Job Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Posting ID:</strong> {{ posting_id }}</td>
                        </tr>
                        <tr>
                            <td><strong>Campus ID:</strong> {{ campus_id }}</td>
                        </tr>
                        <tr>
                            <td><strong>Department ID:</strong> {{ dept_id }}</td>
                        </tr>
                        <tr>
                            <td><strong>Academic Role ID:</strong> {{ acad_role_id }}</td>
                        </tr>
                        <tr>
                            <td><strong>Institutional Role ID:</strong> {{ inst_role_id }}</td>
                        </tr>
                        <tr>
                            <td><strong>Qualifications:</strong> {{ qualifications }}</td>
                        </tr>
                    </tbody>
                </table>
            ";
        }
    } else {
        echo "<p>No job postings found.</p>";
    }

    // Close connection
    $conn->close();
    ?>
</body>
</html>