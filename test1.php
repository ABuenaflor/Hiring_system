<?php
// Database connection parameters
$servername = "localhost"; // Replace with your server name
$username = "username"; // Replace with your database username
$password = "password"; // Replace with your database password
$dbname = "your_database"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to join the tables
$sql = "
SELECT 
    d.dept_id,
    d.dept_name,
    ar.rank_id,
    ar.rank_name,
    p.position_id,
    p.position_name,
    c.campus_id,
    c.campus_name,
    co.course_id,
    co.course_name,
    s.student_id,
    s.student_name
FROM 
    department d
JOIN 
    academic_rank ar ON d.dept_id = ar.dept_id
JOIN 
    position p ON ar.rank_id = p.rank_id
JOIN 
    campus c ON p.campus_id = c.campus_id  -- Ensure this column exists in the position table
JOIN 
    courses co ON c.campus_id = co.campus_id
JOIN 
    students s ON co.course_id = s.course_id;
";

// Debugging: Print the SQL query
echo $sql; // Uncomment this line to see the query

// Execute the query
$result = $conn->query($sql);

// Check for results
if ($result) {
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Department: " . $row["dept_name"] . " - Rank: " . $row["rank_name"] . " - Position: " . $row["position_name"] . " - Campus: " . $row["campus_name"] . " - Course: " . $row["course_name"] . " - Student: " . $row["student_name"] . "<br>";
        }
    } else {
        echo "0 results"; // No records found
    }
} else {
    echo "Error: " . $conn->error; // Print the error if the query fails
}

// Close the connection
$conn->close();
?>