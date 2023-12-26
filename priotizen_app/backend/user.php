<?php
require('connection.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $query = "SELECT * FROM account WHERE email = '$email' AND passcode = '$password' limit 1";
    $result = mysqli_query($conn,$query);
    $arr  = array();
    if($result){
        if(mysqli_num_rows($result) > 0){
            $assoc = mysqli_fetch_assoc($result);
            if($assoc['account_type'] == 'user'){
                $queryVerify = "SELECT v.* , a.account_type, a.account_status, a.isfirstlogin, a.id as id from verified v inner join account a on v.app_id = a.account_id where v.email  = '$email'";
                $resultVerify = mysqli_query($conn,$queryVerify);
                $assoc = mysqli_fetch_assoc($resultVerify);
                extract($assoc);
                $arr["message"] = "Successful";
                $arr["valid_id"] = $valid_id;
                $arr["app_id"] = $app_id;
                $arr["photo"] = $photo;
                $arr["uniqueDownload"] =  $fname."_".$bdate;
                $arr["account_type"] = $account_type;
                $arr["account_name"] = $fname;
                $arr["account_id"] = $id;
                $_SESSION['photo'] = $photo;
                $_SESSION['account_id'] = $id;
                $arr["isfirstlogin"] = $isfirstlogin;
                $arr["isVerified"] = $account_status;
            }  else if($assoc['account_type'] == 'company'){
                $arr["account_type"] = $assoc['account_type'];
                $queryAccount = "SELECT c.*, a.isfirstlogin FROM company c inner join account a on c.store_id= a.account_id where a.email = '$email'";
                $resultAcccount = mysqli_query($conn, $queryAccount);
                $assocAccount = mysqli_fetch_assoc($resultAcccount);
                $arr["message"] = "Successful";
                $arr['company_id'] = $assocAccount['store_id'];
                $arr["isfirstlogin"] = $assocAccount['isfirstlogin'];
            }else{
                $arr["message"] = "Successful";
                $arr["account_type"] = "admin";
                $query = "SELECT * FROM account where email = '$email' and passcode = '$password'";
                $result = mysqli_query($conn,$query);
                $assoc = mysqli_fetch_assoc($result);
                $arr["id"] = $assoc['account_id'];
            }
            echo json_encode($arr);
        }else{
            echo json_encode(mysqli_error($conn));
        }
     

    }else{
        // echo json_encode("No user Found");
        echo json_encode(mysqli_error($conn));

    }
}

if($_SERVER["REQUEST_METHOD"] =="POST"){
    $id = $_POST["id"];
    $pass = $_POST["pass"];
    $update = "UPDATE account set isfirstlogin=1 , passcode = '$pass' where account_id = '$id'";
    $query = mysqli_query($conn, $update);
    if($query){
        echo json_encode("Successful");
    }else{
        echo json_encode("Error");
    }
}
?>