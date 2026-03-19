<?php
include "db.php";

$result = $conn->query(query: "SELECT * FROM upload");

echo "<h2>Uploaded Files</h2>";

while ($row = $result->fetch_assoc()) {
    echo "<a href='".$row['filepath']."' down>".$row['filename']."</a><br>";
}

echo "<br><a href='index.php'>Back</a>";
?>
