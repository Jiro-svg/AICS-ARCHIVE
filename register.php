<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

   
    $checkUser = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($checkUser) > 0) {
        echo "<script>alert('Username already taken!'); window.history.back();</script>";
        exit();
    }

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Registration successful! You can now log in.'); window.location.href='../auth.html';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
