<?php
session_start();
header('Content-Type: application/json');
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo json_encode(['success'=>false,'message'=>'Access denied']);
    exit;
}
require_once __DIR__ . '/connect.php';

$id = $_POST['id'] ?? '';
$title = $_POST['title'] ?? '';
$date = $_POST['date'] ?? '';
$desc = $_POST['description'] ?? '';

if (!$id || !$title || !$date) {
    echo json_encode(['success'=>false,'message'=>'Missing fields']);
    exit;
}

$stmt = $conn->prepare("UPDATE programs SET title=?, date=?, description=? WHERE id=?");
$stmt->bind_param('sssi', $title, $date, $desc, $id);
if ($stmt->execute()) echo json_encode(['success'=>true]);
else echo json_encode(['success'=>false,'message'=>$stmt->error]);
$stmt->close();
?>
