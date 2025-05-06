<?php
include_once '../../databaseConfig/databaseConnection.php';
$query = "SELECT * FROM users";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$users = $result->fetch_all(MYSQLI_ASSOC);
var_dump($users);
$stmt->close();
?>