<?php
require_once '../include/db.inc.php';
header('Content-Type: application/json');

$username = $_GET['username'] ?? '';
$sql = "SELECT id FROM users WHERE LOWER(username) = LOWER(?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
echo json_encode($result->fetch_assoc() ?: []);
?>