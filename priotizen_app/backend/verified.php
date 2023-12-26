<?php
require('connection.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['verify'])){
        $user_id = $_POST['verify'];
        $checkUser = "SELECT * FROM account where account_id = '$user_id'";
        $result2 = mysqli_query($conn, $checkUser);
        if(mysqli_num_rows($result2)>0){
            $query1 = "UPDATE account set account_status = 'Verified' where account_id = '$user_id'  ";
            $result1 = mysqli_query($conn, $query1);
            if($result1){
                echo json_encode("Success");
            }else{
                echo json_encode("Error");
            }
        }else{
            echo json_encode("Error");
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = $_REQUEST['id'];
    $type = $_REQUEST['type'];
    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $query = "SELECT * from valid_id where user_id = '$id' and user_type = '$type' and fname = '$fname' and lname = '$lname'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)>0){
        echo json_encode("Success");
    }else{
        echo json_encode("Error");
    }
}
?>