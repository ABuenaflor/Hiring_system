<?php
session_start();
include("../config/dbcon.php");

if (isset($_POST['submit_basic_ed_score'])) {
    // Ensure that 'emp_id' is set before processing
    if (isset($_POST['emp_id'])) {
        $emp_id = (int)$_POST['emp_id'];  // Cast emp_id to int for safety

        // Process the form data
        foreach ($_POST['drc_points'] as $criteria_id => $drc_points) {
            // Get BERTC points, if provided, else set as NULL
            $bertc_points = isset($_POST['bertc_points'][$criteria_id]) && $_POST['bertc_points'][$criteria_id] !== '' 
                ? (int)$_POST['bertc_points'][$criteria_id] 
                : NULL;

            // Check if record exists for the given criteria_id, sop_id, and emp_id
            $check_query = "SELECT * FROM tbl_basic_ed_score WHERE criteria_id = ? AND sop_id = ? AND emp_id = ?";
            $stmt = mysqli_prepare($con, $check_query);
            $sop_id = 1;  // Example sop_id (replace with dynamic value if needed)
            mysqli_stmt_bind_param($stmt, "iii", $criteria_id, $sop_id, $emp_id); // Correct for 3 parameters
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                // If record exists, update the points
                $update_query = "
                    UPDATE tbl_basic_ed_score 
                    SET drc_points = ?, bertc_points = ?
                    WHERE criteria_id = ? AND sop_id = ? AND emp_id = ?
                ";
                $stmt = mysqli_prepare($con, $update_query);
                mysqli_stmt_bind_param($stmt, "iiiii", $drc_points, $bertc_points, $criteria_id, $sop_id, $emp_id); // Correct for 5 parameters
                if (mysqli_stmt_execute($stmt)) {
                    $_SESSION['message'] = "Record updated successfully!";
                } else {
                    $_SESSION['message'] = "Error updating record: " . mysqli_error($con);
                }
            } else {
                // If no record exists, insert a new record
                $insert_query = "
                    INSERT INTO tbl_basic_ed_score (criteria_id, sop_id, emp_id, drc_points, bertc_points)
                    VALUES (?, ?, ?, ?, ?)
                ";
                $stmt = mysqli_prepare($con, $insert_query);
                mysqli_stmt_bind_param($stmt, "iiiii", $criteria_id, $sop_id, $emp_id, $drc_points, $bertc_points); // Correct for 5 parameters
                if (mysqli_stmt_execute($stmt)) {
                    $_SESSION['message'] = "Record inserted successfully!";
                } else {
                    $_SESSION['message'] = "Error inserting record: " . mysqli_error($con);
                }
            }
        }
    } else {
        $_SESSION['message'] = "Invalid form data.";
    }

    // Redirect after form submission, ensuring emp_id is included in the URL
    header("Location: basic_ed_ranking.php?emp_id=" . urlencode($emp_id));
    exit();
}
?>
