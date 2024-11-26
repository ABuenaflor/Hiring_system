<?php
// if(!session_id()) {
// session_start();
// }

//change from include to require once
// require_once('../config/dbcon.php');

//pinasok yung function into !function exist
if(!function_exists('getAll')){
    function getAll($table){

        global $con;
        $query = "SELECT * FROM $table";
       return $query_run = mysqli_query($con, $query);
    }
}
function getByID($table, $id) {
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id'";
    return $query_run = mysqli_query($con, $query);
}
    function redirect($url, $message){
        $_SESSION['message'] = $message; 
        header('Location: '.$url);
        exit();
    }
    function normalize($value, $max) {
        return $value / $max;
    }
 // Function to calculate SAW score
function calculate_saw_score($data, $weights) {
    $experience_normalized = normalize($data['experience'], $weights['experience_max']);
    $education_normalized = normalize($data['education'], $weights['education_max']);
    $tech_skills_normalized = normalize($data['tech_skills'], $weights['tech_skills_max']);
    $soft_skills_normalized = normalize($data['soft_skills'], $weights['soft_skills_max']);
    $interview_normalized = normalize($data['interview'], $weights['interview_max']);

    $score = ($experience_normalized * $weights['experience_weight']) +
             ($education_normalized * $weights['education_weight']) +
             ($tech_skills_normalized * $weights['tech_skills_weight']) +
             ($soft_skills_normalized * $weights['soft_skills_weight']) +
             ($interview_normalized * $weights['interview_weight']);

    return $score;
}

$weights = [
    'experience_weight' => 0.35,
    'education_weight' => 0.20,
    'tech_skills_weight' => 0.25,
    'soft_skills_weight' => 0.10,
    'interview_weight' => 0.10,
    'experience_max' => 10, // Adjust max values according to your data
    'education_max' => 5,   // Adjust max values according to your data
    'tech_skills_max' => 100, // Adjust max values according to your data
    'soft_skills_max' => 10, // Adjust max values according to your data
    'interview_max' => 100  // Adjust max values according to your data
];

// Fetch existing records
// $credentials = mysqli_query($con, "SELECT * FROM credentials");

// while ($data = mysqli_fetch_array($credentials)) {
//     $experience['experience'] = $data['experience']; // Adjust as needed
//     $education['education'] = $data['education'];   // Adjust as needed
//     $tech_skills['tech_skills'] = $data['tech_skills']; // Adjust as needed
//     $soft_skills['soft_skills'] = $data['soft_skills']; // Adjust as needed
//     $interview['interview'] = $data['interview'];   // Adjust as needed

//     $saw_score = calculate_saw_score($data, $weights);

//     // Update SAW score in the database
//     $update_query = "UPDATE credentials SET saw_score = '$saw_score' WHERE id = " . $data['id'];
//     mysqli_query($con, $update_query);
// }
    // function get_and_rank_candidates($con) {
    //     $query = "SELECT * FROM credentials ORDER BY saw_score DESC";
    //     $result = mysqli_query($con, $query);
    
    //     $candidates = [];
    //     while($row = mysqli_fetch_assoc($result)) {
    //         $candidates[] = $row;
    //     }
    
    //     return $candidates;
    // }
    // $candidates = get_and_rank_candidates($con);

    function update_candidate_saw_score($con, $candidate_id, $saw_score) {
        if ($candidate_id === NULL) {
            // Handle the case where candidate_id is NULL, e.g., log an error or skip
            error_log("Skipping update for candidate with NULL ID");
            return;
        }
    
        $sql = "UPDATE credentials SET saw_score = ? WHERE id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $saw_score, $candidate_id); // Use 'ss' for string
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    // In myFunctions.php

function showMessage() {
    if(isset($_SESSION['message']) && !empty($_SESSION['message'])) {
        echo '<script type="text/javascript">alert("' . $_SESSION['message'] . '");</script>';
        unset($_SESSION['message']); // Clear the message after displaying it
    }
}

define('DBINFO', 'mysql:host=localhost;dbname=notifications');
define('DBUSER','root');
define('DBPASS','');
function fetchAll($query){
    $con = new PDO(DBINFO, DBUSER, DBPASS);
    $stmt = $con->query($query);
    return $stmt->fetchAll();
}
function performQuery($query){
    $con = new PDO(DBINFO, DBUSER, DBPASS);
    $stmt = $con->prepare($query);
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    
    ?>