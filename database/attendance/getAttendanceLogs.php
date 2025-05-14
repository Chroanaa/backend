<?php
include_once '../../databaseConfig/databaseConnection.php';
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

try {
    $query = "SELECT DISTINCT(log_date) FROM attendance_logs";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    $log_dates = [];
    while ($row = $result->fetch_assoc()) {
        $log_dates[] = $row['log_date'];
    }

  echo json_encode(array(
        "status" => "success",
        "log_dates" => $log_dates
    ));
    $stmt->close();
} catch (Exception $e) {
    echo json_encode(array(
        "status" => "error",
        "message" => "Error fetching attendance logs: " . $e->getMessage()
    ));
    if (isset($stmt)) {
        $stmt->close(); 
    }
}
?>