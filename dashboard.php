<?php
include "../php/db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>

<h2>Welcome Admin: <?php echo $_SESSION['admin']; ?></h2>

<ul>
    <li><a href="../index.php">Upload Files</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>

</body>
</html>
