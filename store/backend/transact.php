<?php
require('./connection.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $company_id = $_POST['company_id'];
    $user_id = $_POST['user_id'];
    $money = $_POST['money'];
    $payment = $_POST['payment'];
    $discount = $_POST['discount'];
    $uid = uniqid();

    $images = $_FILES["image"];
    $targetDir = '../../priotizen_app/receipt_img/';
    $originalFilename = basename($_FILES["image"]["name"]);
    $extension = strtolower(pathinfo($originalFilename, PATHINFO_EXTENSION));
    $newFilename = "receipt_".$user_id . "." . $extension;
    $targetFile = $targetDir . $newFilename;
    $arr = array();
    $query = "INSERT INTO receipt(receipt_id, price, discount, img_receipt, company_id, user_id) values('$uid', '$money','$discount','$newFilename', '$company_id','$user_id')";
    $result = mysqli_query($conn,$query);
    if($result){
        $queryNotif = "INSERT INTO notification(user_id,company_id,reciept_id) values('$user_id','$company_id','$uid')";
        $resultNotif = mysqli_query($conn,$queryNotif);
            if($resultNotif){
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)){
                    $arr[] = "Successfully";
                }else{
                    $arr[] = mysqli_error($conn);
                }
            }else{
                // $arr[] = "Error";
                $arr[] = mysqli_error($conn);

            }
    }else{
            // $arr[] = "Error";
            $arr[] = mysqli_error($conn);

    }
    echo json_encode($arr);
}
?>