<?php
session_start();

// Clear PHP session
session_unset();
session_destroy();

// Clear JavaScript local storage
echo '<script>localStorage.clear()</script>';

// Redirect to login page or any desired page
header('Location: signin.php');
exit();
?>