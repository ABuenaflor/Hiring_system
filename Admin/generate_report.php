<?php 
//session_start();
include("includes/header.php"); 
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
</head>

<body>
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
// Include the PHP code here for handling exports and printing
?>

</body>
</html>
