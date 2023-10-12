<?php
session_start();
session_destroy();
echo "<script>localStorage.clear()</script>";
header("Location: login.php");
?>