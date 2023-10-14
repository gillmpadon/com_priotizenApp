<?php
require('connection.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['verify'])){
        $user_id = $_POST['verify'];
        $admin_id = $_POST['admin_id'];
        $query1 = "UPDATE account set account_status = 'Completed' where account_id = '$user_id'  ";
        $query2 = "UPDATE user_history set action = 'Edited' , time_edited = NOW(),  admin_id = '$admin_id' where user_id = '$user_id'"; 
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