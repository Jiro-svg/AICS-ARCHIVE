<?php
include "../php/db.php";

session_destroy();

header("Location: ../index.php");
exit();
?>
