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
            if($fetch['email'] == $email && $fetch['passcode'] == $password && $fetch['account_type'] =="admin"){
                $arr[] = "Successful";
                $arr[] = $fetch['id'];
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
        $query = "SELECT v.brgy, v.id ,v.fname, v.lname, v.number, v.mi, a.account_status , v.gender, v.conditions from verified v INNER JOIN account a on v.id = a.id where 1=1  ".$filter.$brgy.$condition;

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
    $query = "DELETE FROM verified WHERE id = '$user_id'";
    $result = mysqli_query($conn, $query);
    if($result){
        $query = "DELETE FROM account WHERE id = '$user_id'";
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
        $address = $_POST['address'];
        $number = $_POST['number'];
        $condition = $_POST['condition'];
        $email = $_POST['email'];
        $brgy = $_POST['brgy'];
        $family_contact = $_POST['family_contact'];
        $family_name = $_POST['family_name'];
        $app_id = $_POST['app_id'];
        $valid_id = $_POST['valid_id'];


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
        $query = "INSERT INTO verified (fname, mi, lname, email, bdate, status_rs, conditions, gender, number, address, photo, valid_id , app_id, family_name, family_contact, brgy ) 
        VALUES ('$fname', '$mi', '$lname','$email', '$bdate', '$status', '$condition', '$gender', '$number', '$address', '$newFilename', '$valid_id','$app_id','$family_name', '$family_contact','$brgy')";
        $result = mysqli_query($conn,$query);

        $accountQuery = "INSERT INTO account(email, passcode) values('$email','$lname')";
        $accountResult = mysqli_query($conn,$accountQuery);
            if($result and $accountResult){
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

if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    $action = $_REQUEST['action'];
    $query = "DELETE FROM verified where conditions like '$action'";
    $result = mysqli_query($conn, $query);
    if($result){
        echo json_encode("Success");
    }else{
        echo json_encode("Error");
    }
}


?>