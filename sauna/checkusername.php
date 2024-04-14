<?php

$username = $_GET['username'];


$stmt = $conn->prepare("SELECT COUNT(*) AS count FROM users WHERE username = ?");
$stmt->bind_param("s", $username);

$stmt->execute();


$result = $stmt->get_result();
$row = $result->fetch_assoc();


$stmt->close();


$conn->close();

$response = array(
    'exists' => $row['count'] > 0
);


header('Content-Type: application/json');
echo json_encode($response);