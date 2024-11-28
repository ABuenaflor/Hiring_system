<?php 
//session_start();
//include("includes/header.php"); placed inside wrapper
include("../middleware/admin_middleware.php"); 

?>


<?php
function exportCSV($con) {
    $filename = "data_export_" . date('Ymd') . ".csv";
    header("Content-Type: text/csv");
    header("Content-Disposition: attachment; filename=\"$filename\"");

    $output = fopen("php://output", "w");
    
    // Fetching data
    $query = "SELECT * FROM credentials";
    $result = $con->query($query);

    // Fetching field names
    $fields = $result->fetch_fields();
    $headers = [];
    foreach ($fields as $field) {
        $headers[] = $field->name;
    }
    
    // Writing column headers to CSV
    fputcsv($output, $headers);

    // Writing data rows to CSV
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }

    fclose($output);
    exit();
}

if (isset($_POST['export_csv'])) {
    exportCSV($con);
}

require '../vendor/composer/autoload_static.php';

function exportExcel($con) {
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);

    // Fetching data
    $query = "SELECT * FROM credentials";
    $result = $con->query($query);

    // Fetching field names
    $fields = $result->fetch_fields();
    $column = 0;
    foreach ($fields as $field) {
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field->name);
        $column++;
    }

    // Writing data rows
    $rowNumber = 2;
    while ($row = $result->fetch_assoc()) {
        $column = 0;
        foreach ($row as $data) {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $rowNumber, $data);
            $column++;
        }
        $rowNumber++;
    }

    $filename = 'data_export_' . date('Ymd') . '.xlsx';
    header('Content-Type: application/vnd.ms-excel');
    header("Content-Disposition: attachment; filename=\"$filename\"");

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    exit();
}

if (isset($_POST['export_excel'])) {
    exportExcel($con);
}

function exportPDF($con) {
    $pdf = new TCPDF();
    $pdf->AddPage();

    // Setting the title
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 10, 'Data Export', 0, 1, 'C');

    // Fetching data
    $query = "SELECT * FROM credentials";
    $result = $con->query($query);

    // Writing data to PDF
    $pdf->SetFont('helvetica', '', 10);
    $fields = $result->fetch_fields();
    foreach ($fields as $field) {
        $pdf->Cell(30, 10, $field->name, 1);
    }
    $pdf->Ln();
    
    while ($row = $result->fetch_assoc()) {
        foreach ($row as $data) {
            $pdf->Cell(30, 10, $data, 1);
        }
        $pdf->Ln();
    }

    $filename = 'data_export_' . date('Ymd') . '.pdf';
    $pdf->Output($filename, 'D');
    exit();
}

if (isset($_POST['export_pdf'])) {
    exportPDF($con);
}
function printData($con) {
    $query = "SELECT * FROM credentials";
    $result = $con->query($query);

    echo '<table border="1">';
    echo '<tr>';
    
    // Fetching field names
    $fields = $result->fetch_fields();
    foreach ($fields as $field) {
        echo '<th>' . $field->name . '</th>';
    }
    echo '</tr>';
    
    // Fetching rows
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        foreach ($row as $data) {
            echo '<td>' . $data . '</td>';
        }
        echo '</tr>';
    }
    
    echo '</table>';
    echo '<script>window.print();</script>';
}

if (isset($_POST['print_data'])) {
    printData($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export or Print Data</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
    /* Overall container */
    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 30px;
        margin: 20px;
    }

    /* Table Styling */
    .styled-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #f9f9f9;
        margin-bottom: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .styled-table th, .styled-table td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .styled-table th {
        background-color: lightblue;
        color: white;
    }

    .styled-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .styled-table tr:hover {
        background-color: #ddd;
    }

    /* Chart Styling */
    .chart-container {
        max-width: 600px;
        flex-grow: 1;
        padding: 15px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-size: 18px;
        margin-bottom: 10px;
        text-align: center;
    }

    canvas {
        width: 100% !important;
        height: auto !important;
    }
</style>

<body>
    <div class="wrapper">
        <?php
            include("includes/header.php"); 
        ?>
 <header class="cd__intro pt-5">
                    <h1> Export Reports </h1>
                    <p> Reports from Applicants for Basic Education and Tertiary Level </p>
            </header>
<form method="post" action="" class="mt-5">
    <button class="btn btn-primary" type="submit" name="export_csv">Export as CSV</button>
    <button class="btn btn-primary" type="submit" name="export_excel">Export as Excel</button>
    <button class="btn btn-primary" type="submit" name="export_pdf">Export as PDF</button>
    <button class="btn btn-primary" type="submit" name="print_data">Print Data</button>
</form>
<?php
// Fetching the data for the table
$query = "SELECT * FROM credentials ORDER BY date_applied DESC";
$result = $con->query($query);

// Display the table
echo '<div class="container">';
echo '<table class="styled-table">';
echo '<thead>';
echo '<tr>';
echo '<th>ID</th><th>First Name</th><th>Last Name</th><th>Date of Birth</th><th>Position</th><th>Academic Role</th><th>Institutional Role</th><th>Date Applied</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['first_name'] . '</td>';
    echo '<td>' . $row['last_name'] . '</td>';
    echo '<td>' . $row['date_of_birth'] . '</td>';
    echo '<td>' . $row['department'] . '</td>';
    echo '<td>' . $row['academic_role'] . '</td>';
    echo '<td>' . $row['institutional_role'] . '</td>';
    echo '<td>' . $row['date_applied'] . '</td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';

// Query for statistical data
$query = "SELECT date_applied, COUNT(*) as num_applicants FROM credentials GROUP BY date_applied ORDER BY date_applied";
$result = $con->query($query);

// Prepare the data for the chart
$dates = [];
$counts = [];
while ($row = $result->fetch_assoc()) {
    $dates[] = $row['date_applied'];
    $counts[] = $row['num_applicants'];
}
?>

<!-- Chart Section -->
<div class="chart-container">
    <h2>Number of Applicants by Date</h2>
    <canvas id="applicantChart" width="300" height="200"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('applicantChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar', // Bar chart type
        data: {
            labels: <?php echo json_encode($dates); ?>, // Dates
            datasets: [{
                label: 'Number of Applicants',
                data: <?php echo json_encode($counts); ?>, // Applicant counts
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</div> <!-- End of container -->


<?php
// Fetching faculty ranking data
$query = "
    SELECT 
        e.emp_id,
        e.first_name,
        e.last_name,
        e.job_role_id,  -- Assuming this represents the academic position
        e.position_id,  -- Assuming this represents the institutional position
        SUM(b.points) AS total_score
    FROM 
        emp_login e
    LEFT JOIN 
        tbl_basic_ed_score b ON e.emp_id = b.emp_id
    GROUP BY 
        e.emp_id, e.first_name, e.last_name, e.job_role_id, e.position_id
    ORDER BY 
        total_score DESC
";

$result = $con->query($query);

// Display the faculty ranking table
echo '<table class="styled-table">';
echo '<thead>';
echo '<tr>';
echo '<th>Name</th><th>Academic Position</th><th>Institutional Position</th><th>Total Score</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

while ($row = $result->fetch_assoc()) {
    // Fetch the names of the positions
    $academic_position = getAcademicPositionName($row['job_role_id']);
    $institutional_position = getInstitutionalPositionName($row['position_id']);
    
    echo '<tr>';
    echo '<td>' . $row['first_name'] . ' ' . $row['last_name'] . '</td>';
    echo '<td>' . $academic_position . '</td>';
    echo '<td>' . $institutional_position . '</td>';
    echo '<td>' . $row['total_score'] . '</td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';

?>

<?php
// Function to fetch the academic position name
function getAcademicPositionName($job_role_id) {
    global $con;
    // Corrected query to match the actual column name
    $query = "SELECT job_role FROM job_roles WHERE job_id = " . $job_role_id;
    $result = $con->query($query);
    $row = $result->fetch_assoc();
    return $row ? $row['job_role'] : 'N/A';
}

// Function to fetch the institutional position name
function getInstitutionalPositionName($position_id) {
    global $con;
    // Corrected query to match the actual column name
    $query = "SELECT position_name FROM position WHERE position_id = " . $position_id;
    $result = $con->query($query);
    $row = $result->fetch_assoc();
    return $row ? $row['position_name'] : 'N/A';
}
?>


    </div>
  




</body>
</html>
