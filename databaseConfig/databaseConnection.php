<?php
$hostname = "database-sia-cis.c7gskq208sgz.ap-southeast-2.rds.amazonaws.com";
$username = "admin";
$password = "05152025CIASIA-admin";
$database = "cis_db";
$port = 3306;
try {
    $conn = new mysqli($hostname, $username, $password, $database, $port);
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    exit;
}
?>