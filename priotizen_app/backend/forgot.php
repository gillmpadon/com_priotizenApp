<?php
require('connection.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_REQUEST['app_id'])){
        $app_id = $_REQUEST['app_id'];
        $pass = $_REQUEST['pass'];
        $query = "UPDATE account set passcode = '$pass' WHERE account_id = '$app_id'";
        $result = mysqli_query($conn, $query);
        if($result){
            echo json_encode("Success");
        }else{
            echo json_encode("Error");
        }
    }else{
        $email = $_REQUEST['email'];
        $psn = $_REQUEST['psn'];
        $query = "SELECT * from verified where email='$email' and valid_id = '$psn'";
        $result = mysqli_query($conn, $query);
        $arr = array();
        if($result){
            if(mysqli_num_rows($result)==1){
                $assoc = mysqli_fetch_assoc($result);
                $arr[] = "Success";
                $arr[] = $assoc['app_id'];
                $arr[] = $assoc['lname'];
            }else{
                $arr[] = "Error";
            }
        }else{
            $arr[] = "Error";
        }
        echo json_encode($arr);
        }
}

?>