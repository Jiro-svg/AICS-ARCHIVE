<?php
session_start();
header('Content-Type: application/json');
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo json_encode(['success'=>false,'message'=>'Access denied']);
    exit;
}
require_once __DIR__ . '/connect.php';

$input = json_decode(file_get_contents('php://input'), true);
$id = $input['id'] ?? 0;
if (!$id) {
    echo json_encode(['success'=>false,'message'=>'Missing id']);
    exit;
}

$stmt = $conn->prepare("DELETE FROM programs WHERE id = ?");
$stmt->bind_param('i', $id);
if ($stmt->execute()) echo json_encode(['success'=>true]);
else echo json_encode(['success'=>false,'message'=>$stmt->error]);
$stmt->close();
?>
