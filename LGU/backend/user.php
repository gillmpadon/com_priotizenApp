<?php
require('connection.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
      if(isset($_REQUEST['password'])){
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $query = "SELECT * FROM account WHERE email = '$email' AND passcode = '$password'";
        $result = mysqli_query($conn, $query);
        $arr = array();
        if(mysqli_num_rows($result)>0){
            $fetch = mysqli_fetch_array($result);
            if($fetch['email'] == $email && $fetch['passcode'] == $password && strtolower($fetch['account_type']) =="admin"){
                $arr[] = "Successful";
                $arr[] = $fetch['account_id'];
            }else{
                $arr[] = "Error";
            }
        }
        echo json_encode($arr);

      }
      else{
        $filter = $_REQUEST['filter'];
        $brgy = $_REQUEST['brgy'];
        $condition = $_REQUEST['condition'];
        if($brgy!=""){
            $brgy = " and brgy like '$brgy'";
        }
        if($condition!=""){
            $condition = " and conditions like '%$condition%'";
        }
        if($filter!=""){
            $filter = " and fname like '%$filter%' OR mi like '%$filter%' OR lname like '%$filter%' OR status_rs like '%$filter%' OR gender like '%$filter%' ";
        }
        $query = "SELECT v.id, v.fname, v.lname, v.brgy, v.mi, a.account_status , v.gender, v.conditions, a.account_id from verified v INNER JOIN account a on v.app_id = a.account_id where 1=1  ".$filter.$brgy.$condition;

        $result = mysqli_query($conn,$query);
        if(!$result){
            echo json_encode(mysqli_error($conn));
            // echo json_encode($query);

        }else{
            if(mysqli_num_rows($result)>0){
                $arr = array();
                while($row = mysqli_fetch_assoc($result)){
                    $arr[] = $row;
                }
                echo json_encode($arr );
            }else{
                echo json_encode("Error");
                // echo json_encode($query);
            }
        }
      }
    
}   

if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    $user_id = $_REQUEST['id'];
    $query = "DELETE FROM verified WHERE app_id = '$user_id'";
    $result = mysqli_query($conn, $query);
    if($result){
        $query = "DELETE FROM account WHERE account_id = '$user_id'";
        $result = mysqli_query($conn, $query);
        if($result){
            echo json_encode("Success");
        }else{
            echo json_encode("Error");
        }
    }else{
        echo json_encode("Error");
    }

}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $fname = $_POST['fname'];
        $mi = $_POST['mi'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];    
        $status = $_POST['status'];
        $bdate = $_POST['bdate'];
        $address = $_POST['brgy'];
        $street = $_POST['street'];
        $house = $_POST['house'];
        $number = $_POST['number'];
        $condition = $_POST['condition'];
        $email = $_POST['email'];
        $brgy = $_POST['brgy'];
        $family_contact = $_POST['family_contact'];
        $family_name = $_POST['family_name'];
        $app_id = $_POST['app_id'];
        $valid_id = $_POST['valid_id'];
        $admin_id = $_POST['admin_id'];

        if(isset($_FILES["image"])){
            $images = $_FILES["image"];
            $targetDir = '../../priotizen_app/user_img/';
            $originalFilename = basename($_FILES["image"]["name"]);
            $extension = strtolower(pathinfo($originalFilename, PATHINFO_EXTENSION));
            $newFilename = $fname . "_dp.". $extension;
            $targetFile = $targetDir . $newFilename;
        }else{
            $newFilename = "unkown.jpg";
        }
        $arr;
        $query1 = "INSERT INTO verified (fname, mi, lname, email, bdate, status_rs, conditions, gender, number, address, photo, valid_id, app_id, family_name, family_contact, brgy) VALUES ('$fname', '$mi', '$lname', '$email', '$bdate', '$status', '$condition', '$gender', '$number', '$address', '$newFilename', '$valid_id', '$app_id', '$family_name', '$family_contact', '$brgy')";
        $query2 = "INSERT INTO account (account_id, email, passcode, account_type, account_status) VALUES ('$app_id', '$email', '$lname', 'user', 'Pending')";
        $query3 = "INSERT INTO user_history (user_id, admin_id) VALUES ('$app_id', '$admin_id')";
        $query4 = "INSERT INTO doc (user_id) VALUES ('$app_id')";
        $query5 = "INSERT INTO address(user_id, brgy, street, house) values ('$app_id', '$brgy', '$street', '$house')";
        $query6 = "INSERT INTO test(user_id,all_data,signature)";
        $result1 = mysqli_query($conn, $query1);
        $result2 = mysqli_query($conn, $query2);
        $result3 = mysqli_query($conn, $query3);
        $result4 = mysqli_query($conn, $query4);
        $result5 = mysqli_query($conn, $query5);

        if ($result1 && $result2 && $result3 && $result4 && $result5)  {
                if(isset($_FILES["image"])){
                    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)){
                        $arr = "Successful";
                    }else{
                        $arr = "Error";
                    }}
                else{
                    $arr = "Successful";
                }
            }else{
                $arr = mysqli_error($conn);
            }
        echo json_encode($arr);

}



?>