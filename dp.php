<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$conn = new mysqli("sql208.infinityfree.com", "if0_41285833", "AICSBACOOR2026", "if0_41285833_AICSarchive");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$conn->set_charset("utf8mb4");
?>
