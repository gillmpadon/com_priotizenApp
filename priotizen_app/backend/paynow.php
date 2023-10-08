<?php
require('connection.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $uid = $_POST['uid'];
    $query = "UPDATE notification set status = 'Completed' WHERE reciept_id ='$uid'";
    $result = mysqli_query($conn, $query);
    if($result){
        echo json_encode("Successful");
    }else{
        echo json_encode("Error");
    }
}
?>