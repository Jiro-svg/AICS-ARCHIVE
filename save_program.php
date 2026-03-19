<?php

session_start();
header('Content-Type: application/json');
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo json_encode(['success'=>false,'message'=>'Access denied']);
    exit;
}
require_once __DIR__ . '/connect.php';

$title = $_POST['title'] ?? '';
$date  = $_POST['date'] ?? '';
$desc  = $_POST['description'] ?? '';

if (!$title || !$date) {
    echo json_encode(['success'=>false,'message'=>'Title and date required']);
    exit;
}

$stmt = $conn->prepare("INSERT INTO programs (title, date, description) VALUES (?, ?, ?)");
$stmt->bind_param('sss', $title, $date, $desc);
if ($stmt->execute()) {
    echo json_encode(['success'=>false]);
} else {
    echo json_encode(['success'=>true,'message'=>$stmt->error]);
}
$stmt->close();
?>
