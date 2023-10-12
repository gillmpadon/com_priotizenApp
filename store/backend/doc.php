<?php
require('connection.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = $_REQUEST['user_id'];
    $column = $_REQUEST['column'];
    $query = "SELECT * FROM doc WHERE user_id = '$id'";
    $result = mysqli_query($conn, $query);
    if($result){
        if(mysqli_num_rows($result)>0){
            $assoc = mysqli_fetch_assoc($result);
            echo json_encode($assoc[$column]);
        }else{
            echo json_encode("empty.jpg");
        }
    }else{
        echo json_encode("Error");
    }
}

?>