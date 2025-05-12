<?php
include_once '../../databaseConfig/databaseConnection.php';
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
try{
$query = "SELECT 
    al.id AS attendance_id,
    al.cadet_id,
    ci.gender,
    al.log_date,
    al.time_in,
    al.time_out
FROM 
    attendance_logs al
JOIN 
    cadet_info ci ON al.cadet_id = ci.cadet_id;";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$users = $result->fetch_all(MYSQLI_ASSOC);
$female_attendance_count = 0;
$male_attendance_count = 0;
$male_absence_count = 0;
$female_absence_count = 0;
foreach ($users as $male) {
    if($male['gender'] == "Male" && $male['time_in'] != null && $male['time_out'] != null){
        $male_attendance_count++;
    }else{
        $male_absence_count++;
    }
}
foreach ($users as $female) {
    if($female['gender'] == "Male" && $female['time_in'] != null && $female['time_out'] != null){
        $female_attendance_count++;
    }else{
        $female_absence_count++;
    }
}


echo json_encode(array(
    "status" => "success",
    "male_attendance_count" => $male_attendance_count,
    "male_absence_count" => $male_absence_count,
    "female_attendance_count" => $female_attendance_count,
    "female_absence_count" => $female_absence_count,
));
$stmt->close();
}catch (Exception $e) {
    echo json_encode(array(
        "status" => "error",
        "message" => "Error fetching attendance logs: " . $e->getMessage())
    );
 $stmt->close();
}

?>