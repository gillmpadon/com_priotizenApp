<?php
require('connection.php');
if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    $action = $_REQUEST['action'];
    $query = "DELETE FROM verified where conditions like '%$action%'";
    $result = mysqli_query($conn, $query);
    if($result){
        echo json_encode("Success");
    }else{
        echo json_encode("Error");
    }
}


?>