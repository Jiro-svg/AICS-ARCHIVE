<?php
$conn = new mysqli("localhost", "root", "", "grading_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
?>
