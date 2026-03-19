<?php
include __DIR__ . "/dp.php";

header('Content-Type: application/json');

$sql = "SELECT filename, filepath, category FROM upload";
$result = $conn->query($sql);

$files = [];

while ($row = $result->fetch_assoc()) {
    $files[] = [
        "name" => $row["filename"],   // match JS
        "path" => $row["filepath"],   // match JS
        "category" => $row["category"]
    ];
}

echo json_encode($files);
?>