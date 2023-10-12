<?php
require('connection.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
      if(isset($_REQUEST['password'])){
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $query = "SELECT * FROM account WHERE email = '$email' AND passcode = '$password'";
        $result = mysqli_query($conn, $query);
        $fetch = mysqli_fetch_array($result);
        $arr = array();
        if($fetch['email'] == $email && $fetch['passcode'] == $password){
            $arr[] = "Successful";
            $arr[] = $fetch['id'];
        }else{
            $arr[] = "Error";
        }
        echo json_encode($arr);

      }
      else{
        $filter = $_REQUEST['filter'];
        $brgy = $_REQUEST['brgy'];
        $condition = $_REQUEST['condition'];
        if($brgy!='' and $filter==''){
            $brgy = " where brgy like '$brgy'";
            $query = "SELECT v.brgy, v.id ,v.fname, v.lname, v.number, v.mi, a.account_status , v.gender, v.conditions from verified v INNER JOIN account a on v.id = a.id $brgy ";
        }else if($condition!='' and $filter!=''){
            $brgy = " where brgy like '$brgy' ";
            $condition = " and conditions like '$condition'";
            $query = "SELECT v.brgy, v.id ,v.fname, v.lname, v.number, v.mi, a.account_status , v.gender, v.conditions from verified v INNER JOIN account a on v.id = a.id $brgy $condition";
        }else if($condition!='' and $filter==''){
            $condition = " where conditions like '$condition'";
            $query = "SELECT v.brgy, v.id,v.fname, v.lname, v.number, v.mi, a.account_status, v.gender, v.conditions from verified v INNER JOIN account a on v.id = a.id $condition ";
        }else if($brgy=='' and $condition==''){
            $brgy = " ";
            $condition = " ";
            $query = "SELECT v.brgy, v.id ,v.fname, v.lname, v.number, v.mi, a.account_status , v.gender, v.conditions from verified v INNER JOIN account a on v.id = a.id 
        where v.fname like '%$filter%' or v.mi like '%$filter%' or v.lname like '%$filter%' or a.account_status like '%$filter%' or v.gender like '%$filter%' or v.conditions like '%$filter%' $brgy ";
        }
        if($filter=='' and $brgy=='' and $conditions==''){
            $query = "SELECT v.brgy, v.id ,v.fname, v.lname, v.number, v.mi, a.account_status , v.gender, v.conditions from verified v INNER JOIN account a on v.id = a.account_id $brgy ";
        }
        $result = mysqli_query($conn,$query);
        if(!$result){
            // echo json_encode(mysqli_error($conn));
            echo json_encode($query);

        }else{
            if(mysqli_num_rows($result)>0){
                $arr = array();
                while($row = mysqli_fetch_assoc($result)){
                    $arr[] = $row;
                }
                echo json_encode($arr);
            }else{
                // echo json_encode("Error");
                echo json_encode($query);
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

if($_SERVER["REQUEST_METHOD"] =="PUT"){
    $data = json_decode(file_get_contents("php://input"),true);
    if(isset($data['verify'])){
        $id = $data['verify'];
        $query = "UPDATE account SET account_status = 'Verified' WHERE account_id = '$id'";
        $result = mysqli_query($conn, $query);
        if($result){
            echo json_encode("Successful");
        }else{
            echo json_encode("Error");
        }
    }else{
        extract($data);
        $query = "UPDATE verified set fname = '$fname', mi = '$mi' , lname = '$lname', gender = '$gender',
        address = '$address' , app_id = '$app_id' , valid_id = '$valid_id', conditions = '$conditions', email = '$email',
        family_name = '$family_name', family_contact = '$family_contact'  where id = '$id'";
        $result = mysqli_query($conn, $query);
        if($result){
            echo json_encode("Success");
        }else{
            echo json_encode("Error");
        }

    }
}

?>