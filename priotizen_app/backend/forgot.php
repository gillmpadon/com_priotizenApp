<?php
require('connection.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $emailAcc = $_REQUEST['email'];
    $emailCheck = "SELECT account_type FROM account WHERE email = '$emailAcc'";
    $emailQuery = mysqli_query($conn, $emailCheck);
    if(mysqli_num_rows($emailQuery)>0){
        $emailAssoc = mysqli_fetch_assoc($emailQuery);
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
            if($emailAssoc['account_type'] =='user'){
                $query = "SELECT * from verified where email='$email' and valid_id = '$psn'";
            }else{
                $query = "SELECT a.*, c.name from account a inner join company c on a.account_id=c.store_id where a.email='$email' and a.account_id = '$psn'";
            }
            $result = mysqli_query($conn, $query);
            $arr = array();
            if($result){
                if(mysqli_num_rows($result)==1){
                    $assoc = mysqli_fetch_assoc($result);
                    $arr[] = "Success";
                    if($emailAssoc['account_type'] =='user'){
                        $arr[] = $assoc['app_id'];
                        $arr[] = $assoc['lname'];
                    }else{
                        $arr[] = $assoc['account_id'];
                        $arr[] = $assoc['name'];
                    }
                }else{
                    $arr[] = "Error";
                }
            }else{
                $arr[] = "Error";
            }
            echo json_encode($arr);
            }
    }else{
        echo json_encode('Error');
    }
}
?>