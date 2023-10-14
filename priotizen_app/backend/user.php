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
            if($assoc['account_type'] == 'User'){
                $queryVerify = "SELECT v.* , a.account_type, a.id as id from verified v inner join account a on v.email = a.email where v.email = '$email'";
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
                
                echo json_encode($arr);
            }  else if($assoc['account_type'] == 'Store'){
                $arr["account_type"] = "Store";
                $queryAccount = "SELECT c.* FROM company c inner join account a on c.email= a.email where a.email = '$email'";
                $resultAcccount = mysqli_query($conn, $queryAccount);
                $assocAccount = mysqli_fetch_assoc($resultAcccount);
                $arr["message"] = "Successful";
                $arr['company_id'] = $assocAccount['id'];
                echo json_encode($arr);
            }else{
                $arr["message"] = "Successful";
                $arr["account_type"] = "LGU";
                $query = "SELECT * FROM account where email = '$email' and passcode = '$password'";
                $result = mysqli_query($conn,$query);
                $assoc = mysqli_fetch_assoc($result);
                $arr["id"] = $assoc['id'];
                echo json_encode($arr);
            }
        }else{
            echo json_encode(mysqli_error($conn));
        }
    }else{
        // echo json_encode("No user Found");
        echo json_encode(mysqli_error($conn));

    }
}
?>