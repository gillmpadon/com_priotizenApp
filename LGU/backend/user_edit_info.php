<?php
require('connection.php');
if($_SERVER["REQUEST_METHOD"] =="POST"){
    $admin_id = $_POST["admin_id"];
    $fname = $_POST["fname"];
    $mi = $_POST["mi"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $status_rs = $_POST["status_rs"];
    $bdate = $_POST["bdate"];
    $address = $_POST["brgy"];
    $email = $_POST["email"];
    $valid_id = $_POST["valid_id"];
    $app_id = $_POST["app_id"];
    $nationality = $_POST["nationality"];
    $number = $_POST["number"];
    $conditions = $_POST["conditions"];
    $family_name = $_POST["family_name"];
    $family_contact = $_POST["family_contact"];
    $brgy =  $_POST["brgy"];
    $street = $_POST["street"];
    $municipality = $_POST["municipality"];
    $house = $_POST["house"];
    if(isset($_FILES["image"])){
        $images = $_FILES["image"];
        $targetDir = '../../priotizen_app/user_img/';
        $originalFilename = basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($originalFilename, PATHINFO_EXTENSION));
        $newFilename = $fname . "_dp.". $extension;
        $targetFile = $targetDir . $newFilename;
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)){
                $arr = "Successful";
                $photo = " , photo = '$newFilename' ";
            }else{
                $arr = "Error";
            }
        }else{
            $photo = "  ";
        }

        $query = "UPDATE verified set fname = '$fname', mi = '$mi' , lname = '$lname', gender = '$gender',
        address = '$address' , valid_id = '$valid_id', conditions = '$conditions',bdate = '$bdate', nationality= '$nationality', email = '$email',
        family_name = '$family_name', family_contact = '$family_contact'  $photo where app_id = '$app_id'";
        $result = mysqli_query($conn, $query);
        
        $query2= "INSERT INTO user_history(user_id, admin_id, action, time_edited) VALUES ('$app_id','$admin_id','Edited',NOW())";
        $query3 = "UPDATE address set brgy = '$brgy', street = '$street', house = '$house' where user_id = '$app_id'";
        $result3 = mysqli_query($conn, $query3);
        $result2 = mysqli_query($conn, $query2);
        if($result && $result2 && $result3){
            $arr = "Successful";
        }else{
            $arr = "Error";
        }

        echo json_encode($arr);
}


?>