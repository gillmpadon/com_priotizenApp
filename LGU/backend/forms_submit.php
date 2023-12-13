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
    $arr['certificate'] = $assoc['certificate'];
    echo json_encode($arr);
}

function insertImage($name, $id){
    if(isset($_FILES[$name])){
        $images = $_FILES[$name];
        $targetDir = '../../priotizen_app/documents/';
        $originalFilename = basename($_FILES[$name]["name"]);
        $extension = strtolower(pathinfo($originalFilename, PATHINFO_EXTENSION));
        $newFilename = $name."_$originalFilename".".". $extension;
        $targetFile = $targetDir . $newFilename;
        if(move_uploaded_file($_FILES[$name]["tmp_name"], $targetFile)){
            return $newFilename;
        }else{
            return "unknown.jpg";
        }
    }else{
        return "unknown.jpg";
    }
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data = $_POST['data'];
    $id = $_POST['user_id'];
    $action = $_POST['action'];
    $admin_id = $_POST['admin_id'];
    $query1 = "INSERT INTO user_history(user_id, admin_id,action) values('$id', '$admin_id', 'Edited')";
    if(isset($_POST['senior'])){
        $query = "UPDATE test SET all_data = '$data' WHERE user_id = '$id'";
    }else{
        if($action=='edit'){
            if(!isset($_POST['noimage'])){
                $query = "UPDATE test SET all_data = '$data' WHERE user_id = '$id'";
            }else{
                $certificate = insertImage('certificate', $id);
                $query = "UPDATE test SET all_data = '$data', certificate = '$certificate' WHERE user_id = '$id'";
            }
        }else{
            $certificate = insertImage('certificate', $id);
            $query = "UPDATE test SET all_data = '$data', certificate = '$certificate' WHERE user_id = '$id'";
        }
    }
    $result = mysqli_query($conn,$query);
    $result1 = mysqli_query($conn,$query1);
    if($result && $result1){
        echo json_encode("Successful");
    }else{
        echo json_encode(mysqli_error($conn));

    }

}

?>