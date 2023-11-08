<?php
require('connection.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $app_id = $_POST['app_id'];
    $fname = $_POST['fname'];
    $mi = $_POST['mi'];
    $lname = $_POST['lname'];
    $bdate = $_POST['bdate'];
    $email = $_POST['email'];
    $status_rs = $_POST['status_rs'];
    $number = $_POST['number'];
    $query = "UPDATE verified set fname = '$fname' , mi = '$mi' , lname = '$lname' , bdate = '$bdate',
    email = '$email' , status_rs = '$status_rs' , number = '$number' where app_id = '$app_id'";
    $result = mysqli_query($conn,$query);
    if($result){
        echo json_encode("Successful");
    }else{
        echo json_encode(mysqli_error($conn));
    }
}
?>