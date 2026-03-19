<?php

$targetDir = "uploads/";


if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

if (!empty($_FILES['files']['name'][0])) {
    foreach ($_FILES['files']['name'] as $key => $name) {
        $tmpName = $_FILES['files']['tmp_name'][$key];
        $targetFile = $targetDir . basename($name);

        if (move_uploaded_file($tmpName, $targetFile)) {
            echo "✅ Uploaded: " . htmlspecialchars($name) . "<br>";
        } else {
            echo "❌ Failed to upload: " . htmlspecialchars($name) . "<br>";
        }
    }
} else {
    echo "⚠️ No files selected.";
}
?>
  