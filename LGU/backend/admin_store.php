<?php
require('connection.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $unique_id = $_POST['unique_id'];
    $admin_id = $_POST['admin_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $account_type = $_POST['account_type'];
    $account_type = strtolower($account_type);
    if(isset($_FILES["image"])){
        $images = $_FILES["image"];
        $targetDir = '../../priotizen_app/user_img/';
        $originalFilename = basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($originalFilename, PATHINFO_EXTENSION));
        $newFilename = $name . ".". $extension;
        $targetFile = $targetDir . $newFilename;
    }else{
        $newFilename = "unkown.jpg";
    }
    $old_account_type =$account_type;
    $account_type = $account_type=="store"? "company" : "admin";
    $query1 = "INSERT INTO $account_type (name, email, number, image, ".$old_account_type."_id) VALUES ('$name', '$email', '$number',  '$newFilename','$unique_id')";
    $query2 = "INSERT INTO account (account_id, email, passcode, account_type) values('$unique_id','$email', '$password', '$account_type')";
    $result1 = mysqli_query($conn, $query1);
    $result2 = mysqli_query($conn, $query2);
    if($result1 && $result2){
        if(isset($_FILES["image"])){
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)){
            $arr = "Successful";
        }else{
            $arr = mysqli_error($conn);
            // $arr = "Error";
        }}else{
            $arr = "Successful";
        }

    }else{
        $arr = mysqli_error($conn);
        // $arr = "Error";
    }
    echo json_encode($arr);
}

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $filter = $_REQUEST['filter'];
    $account = $_REQUEST['type'];
    if($account!=""){
        $account = " and  ac.account_type = '$account' ";
    }else{
        $account = "";
    }
    if($filter!=""){
        $filter = " and  a.name like '%$filter%' or  a.email like '%$filter%' or a.number like '%$filter%' ";
    }else{
        $filter = "";
    }
    $query = "select a.id, a.name, a.email, a.number, ac.account_type from admin a inner join account ac on a.email=ac.email where 1=1 $filter $account
    UNION
    select  a.id, a.name, a.email, a.number , ac.account_type from company a  inner join account ac on a.email=ac.email where 1=1 $filter $account";
    $result = mysqli_query($conn, $query);
    $arr = array();
    if($result){
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $arr[] = $row;
            }
        }else{
            $arr[] = "Error";
        }
    }else{
        $arr[] = "Error";
    }
    echo json_encode($arr);

}

?>