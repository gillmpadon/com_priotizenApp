<?php
require('connection.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $name = $_REQUEST['name'];
    $status = $_REQUEST['status'];
    $filter = " and conditions like '$status'";
    $query = "SELECT v.*, v.conditions, v.app_id as user_id from verified v INNER JOIN account a on v.app_id = a.account_id ";
    if(empty($name)){
        $query =$query."where conditions like '$status'";
    }else{
        $query = $query."WHERE fname LIKE '%$name%' or lname LIKE '%$name%' ";
        $query = $query.$filter;
    }
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo json_encode($query);
    }else{
        if(mysqli_num_rows($result)>0){
            $newArr = array();
            while($row = mysqli_fetch_assoc($result)){
                $arr = array();
                $arr['id'] = $row['user_id'];
                $arr['name'] = $row['fname']." ".$row['mi']." ".$row['lname'];
                $arr['email'] = $row['email'];
                $arr['status'] = $row['conditions'];
                $arr['query'] = $query;
                $newArr[] = $arr;
            }
            echo json_encode($newArr);
        }else{
            // echo json_encode($query);
            echo json_encode($query);
            
        }
    }
}
?>