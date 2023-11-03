<?php
require('connection.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = $_REQUEST['user_id'];
    $query = "SELECT * FROM test where user_id = '$id'";
    $result = mysqli_query($conn, $query);
    $assoc = mysqli_fetch_assoc($result);
    $arr = array();
    $arr['data'] = $assoc['all_data'];
    $arr['signature'] = $assoc['signature'];
    echo json_encode($arr);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data = $_POST['data'];
    $id = $_POST['user_id'];
    $action = $_POST['action'];
    if(isset($_POST['noimage'])){
        if($action == "create"){
            $query = "INSERT INTO test(user_id, all_data) values('$id','$data')";
        }else{
            $query = "UPDATE test SET all_data = '$data' WHERE user_id = '$id'";
        }
        $result = mysqli_query($conn,$query);
        if($result){
            echo json_encode("Successful");
        }else{
            echo json_encode(mysqli_error($conn));
    
        }
    }else{
        if(isset($_FILES["image"])){
            $images = $_FILES["image"];
            $targetDir = '../../priotizen_app/documents/';
            $originalFilename = basename($_FILES["image"]["name"]);
            $extension = strtolower(pathinfo($originalFilename, PATHINFO_EXTENSION));
            $newFilename = "sign_".$id . ".". $extension;
            $targetFile = $targetDir . $newFilename;
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)){
                echo json_encode("Successful");
            }else{
                echo json_encode("Error");
            }
        }else{
            $newFilename = "unknown.jpg";
        }
        if($action == "create"){
            $query = "INSERT INTO test(user_id, all_data, signature) values('$id','$data','$newFilename')";
        }else{
            $query = "UPDATE test SET all_data = '$data', signature = '$newFilename' WHERE user_id = '$id'";
        }
        $result = mysqli_query($conn,$query);
        if($result){
            echo json_encode("Successful");
        }else{
            echo json_encode(mysqli_error($conn));
    
        }
    }
    }

?>