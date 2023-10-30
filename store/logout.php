<?php
session_start();
session_destroy();
echo "<script>localStorage.clear()</script>";
echo "<script>window.location.href='../priotizen_app/signin.php';</script>";
?>