<?php
session_start();

include __DIR__ . "/../db.php";  

if (!$conn) {
    die("Database connection failed!");
}

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']); 
    $stmt = $conn->prepare("SELECT * FROM student WHERE username=? AND password=?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $username;
        header("Location: ../admin/dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid login!'); window.location.href='../index.php';</script>";
        exit();
    }

} else {
    echo "<script>alert('Please enter username and password!'); window.location.href='../index.php';</script>";
    exit();
}
?>
