<?php
require('connection.php');
$app_id = $_GET['app_id'];
$valid_id = $_GET['valid_id'];
$query = "SELECT v.*, a.account_status  FROM verified v inner join account a on v.app_id = a.account_id where v.app_id = '$app_id' and v.valid_id = '$valid_id'";
$results = mysqli_query($conn, $query);
if($results){
    if(mysqli_num_rows($results)==1){
        echo json_encode('successful');
    }else{
        echo json_encode('error');
    }
}else{
    echo json_encode('error');
}
?>