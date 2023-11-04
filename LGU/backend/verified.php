<?php
require('connection.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['verify'])){
        $user_id = $_POST['verify'];
        $admin_id = $_POST['admin_id'];
        $query1 = "UPDATE account set account_status = 'Verified' where account_id = '$user_id'  ";
        $query2 = "INSERT INTO user_history (user_id, admin_id,action) VALUES ('$user_id', '$admin_id','Edited')";
        $result1 = mysqli_query($conn, $query1);
        $result2 = mysqli_query($conn, $query2);
        if($result1 && $result2){
            echo json_encode("Success");
        }else{
            echo json_encode("Error");
        }
    }
}
?>