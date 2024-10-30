<?php
include("config/dbcon.php");

$json_data = file_get_contents("json/rubrics.json");
$rubrics = json_decode($json_data, JSON_OBJECT_AS_ARRAY);

$stmt = $mysqli->prepare("INSERT INTO basiced_score (criteria,weight,criteria_cpoints,sr,drc,bertc) VALUES (?,?,?,?,?,?)");

$stmt->bind_param ("siiiii", $criteria,$criteria,$criteria_cpoints,$sr,$drc,$bertc);

$inserted_rows = 0;

foreach($rubrics as $rubric){
    $criteria = $rubric["criteria"];
    $weight = $rubric["weight"];
    $criteria_cpoints = $rubric["criteria_cpoints"];
    $sr = $rubric["sr"];
    $drc = $rubric["drc"];
    $bertc = $rubric["bertc"];

    $stmt->execute();
    $inserted_rows++;
}

if(count($products)==$inserted_rows){
    echo "success";
}else{
    echo "error";
}
?>