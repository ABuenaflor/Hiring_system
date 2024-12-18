<?php
session_start();
include("../config/dbcon.php");

if (isset($_POST['submit_tertiary_sr'])) {
    if (isset($_POST['emp_id'])) {
        $emp_id = (int)$_POST['emp_id'];
        $sop_id = 1; // Example sop_id

        // Debugging: Check if src_score is part of the POST data (remove this in production)
        echo '<pre>';
        print_r($_POST['src_score']);
        echo '</pre>';

        foreach ($_POST['src_score'] as $criteria_id => $src_score) {
            // Ensure src_score is not empty and convert it to NULL if needed
            $src_score = (empty($src_score)) ? NULL : (int)$src_score;
            $points = isset($_POST['points'][$criteria_id]) && $_POST['points'][$criteria_id] !== '' ? (int)$_POST['points'][$criteria_id] : NULL;
            $crtc_score = isset($_POST['crtc_score'][$criteria_id]) && $_POST['crtc_score'][$criteria_id] !== '' ? (int)$_POST['crtc_score'][$criteria_id] : NULL;

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
                    $_SESSION['message'] = "Error executing query: " . mysqli_error($con);
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
        
        // JavaScript to show alert and redirect
        echo '<script type="text/javascript">
                alert("Scores successfully saved!");
                window.location.href = "tertiary_ranking.php?emp_id=' . $emp_id . '";
              </script>';
        exit();
    } else {
        $_SESSION['message'] = "Invalid form data.";
        
        // JavaScript to show alert and redirect
        echo '<script type="text/javascript">
                alert("Invalid form data.");
                window.location.href = "tertiary_ranking.php?emp_id=' . $emp_id . '";
              </script>';
        exit();
    }
}
?>
