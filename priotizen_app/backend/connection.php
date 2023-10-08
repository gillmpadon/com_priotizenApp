<?php
$conn = mysqli_connect("localhost", "root", "", "priotizen");

// Check Connection
if(mysqli_connect_errno()){
    // Connection Failed
    echo 'Failed to connect to MySQL '. mysqli_connect_errno();
}