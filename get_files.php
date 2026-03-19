<?php
header("Content-Type: application/json");

$baseDir = "../upload/";
$category = isset($_GET['category']) ? $_GET['category'] : 'all';

$files = [];

if ($category === 'all') {
    $categories = array_diff(scandir($baseDir), ['.', '..']);
    foreach ($categories as $cat) {
        $catPath = $baseDir . $cat . "/";
        if (is_dir($catPath)) {
            $catFiles = array_diff(scandir($catPath), ['.', '..']);
            foreach ($catFiles as $file) {
                $files[] = ["name" => $file, "path" => $catPath . $file];
            }
        }
    }
} else {
    $catPath = $baseDir . $category . "/";
    if (is_dir($catPath)) {
        $catFiles = array_diff(scandir($catPath), ['.', '..']);
        foreach ($catFiles as $file) {
            $files[] = ["name" => $file, "path" => $catPath . $file];
        }
    }
}

echo json_encode($files);
?>
