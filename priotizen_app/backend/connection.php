<?php
$conn = mysqli_connect("localhost", "root", "", "priotizen");
session_start();
// Check Connection
if(mysqli_connect_errno()){
    // Connection Failed
    echo 'Failed to connect to MySQL '. mysqli_connect_errno();
}