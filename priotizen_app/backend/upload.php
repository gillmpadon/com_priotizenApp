<?php
$conn = mysqli_connect("localhost", "root", "", "priotizen");
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['doc'])){
    $email = $_POST['name'];
    $parts = explode('@', $email);
    $name = $parts[0]; 

    $doc = $_POST['doc'];
    $user_id = $_POST['user_id'];
    $images = $_FILES["file"];
    $targetDir = '../documents/';
    $originalFilename = basename($_FILES["file"]["name"]);
    $extension = strtolower(pathinfo($originalFilename, PATHINFO_EXTENSION));
    $newFilename = $name . "_".$doc."." . $extension;
    $targetFile = $targetDir . $newFilename;
    $query = "UPDATE doc set $doc = '$newFilename' where user_id ='$user_id'";
    $result = mysqli_query($conn,$query);
        if($result){
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)){
                $arr = "Successful";
            }else{
                // $arr = "Error";
                $arr = mysqli_error($conn);
            }
        }else{
            // $arr = "Error";
            $arr = mysqli_error($conn);
        }
    echo json_encode($arr);
}
?>