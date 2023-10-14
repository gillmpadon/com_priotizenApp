<?php
require('connection.php');
if($_SERVER["REQUEST_METHOD"] =="POST"){
    $id = $_POST["id"];
    $fname = $_POST["fname"];
    $mi = $_POST["mi"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $status_rs = $_POST["status_rs"];
    $bdate = $_POST["bdate"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $valid_id = $_POST["valid_id"];
    $app_id = $_POST["app_id"];
    $nationality = $_POST["nationality"];
    $number = $_POST["number"];
    $conditions = $_POST["conditions"];
    $family_name = $_POST["family_name"];
    $family_contact = $_POST["family_contact"];
    
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

        $query = "UPDATE verified set fname = '$fname', mi = '$mi' , lname = '$lname', gender = '$gender',
        address = '$address' , app_id = '$app_id' , valid_id = '$valid_id', conditions = '$conditions', email = '$email',
        family_name = '$family_name', family_contact = '$family_contact' , photo = '$newFilename' where id = '$id'";
        $result = mysqli_query($conn, $query);
        if($result){
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
            $arr = "Error";
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