<?php
require('connection.php'); //$conn
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $pass = $_POST['pass'];
    $query = "UPDATE account set passcode = '$pass' where account_id = '$id'";
    $result = mysqli_query($conn, $query);
    if($result){
        echo json_encode("Success");
    }else{
        echo json_encode("Error");
    }

}

?>