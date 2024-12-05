<?php
session_start();
include("../config/dbcon.php");

if (isset($_POST['submit_tertiary_sr'])) {
    if (isset($_POST['emp_id'])) {
        $emp_id = (int)$_POST['emp_id'];
        $sop_id = 1; // Example sop_id

        foreach ($_POST['src_score'] as $criteria_id => $src_score) {
            $points = isset($_POST['points'][$criteria_id]) ? (int)$_POST['points'][$criteria_id] : NULL;
            $crtc_score = isset($_POST['crtc_score'][$criteria_id]) ? (int)$_POST['crtc_score'][$criteria_id] : NULL;

            // Check if record exists
            $check_query = "SELECT * FROM tbl_tertiary_score WHERE criteria_id = ? AND sop_id = ? AND emp_id = ?";
            $stmt = mysqli_prepare($con, $check_query);
            mysqli_stmt_bind_param($stmt, "iii", $criteria_id, $sop_id, $emp_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                // Update existing record
                $update_query = "
                    UPDATE tbl_tertiary_score 
                    SET points = ?, src_score = ?, crtc_score = ?
                    WHERE criteria_id = ? AND sop_id = ? AND emp_id = ?
                ";
                $stmt = mysqli_prepare($con, $update_query);
                mysqli_stmt_bind_param($stmt, "iiiiii", $points, $src_score, $crtc_score, $criteria_id, $sop_id, $emp_id);
                if (!mysqli_stmt_execute($stmt)) {
                    $_SESSION['message'] = "Error updating record: " . mysqli_error($con);
                }
            } else {
                // Insert new record
                $insert_query = "
                    INSERT INTO tbl_tertiary_score (criteria_id, sop_id, emp_id, points, src_score, crtc_score)
                    VALUES (?, ?, ?, ?, ?, ?)
                ";
                $stmt = mysqli_prepare($con, $insert_query);
                mysqli_stmt_bind_param($stmt, "iiiiii", $criteria_id, $sop_id, $emp_id, $points, $src_score, $crtc_score);
                if (!mysqli_stmt_execute($stmt)) {
                    $_SESSION['message'] = "Error inserting record: " . mysqli_error($con);
                }
            }
        }
        $_SESSION['message'] = "Scores successfully saved!";
    } else {
        $_SESSION['message'] = "Invalid form data.";
    }
    header("Location: tertiary_ranking.php?emp_id=" . urlencode($emp_id));
    exit();
}
?>
