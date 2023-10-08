<?php

require('connection.php');
$column = $_REQUEST['column'];
$user_id = $_REQUEST['user_id'];

$query = "SELECT * FROM doc WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);
$assoc = mysqli_fetch_assoc($result);
echo json_encode($assoc[$column]);
?>