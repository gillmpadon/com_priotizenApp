<?php
require('connection.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $filter = $_REQUEST['filter'];
    $query = "SELECT u.action, u.time_edited, a.name as admin_name,v.conditions, concat(v.lname,' ',v.fname) as user_name  from user_history u inner join admin a on u.admin_id = a.admin_id inner join verified v on u.user_id = v.app_id  
    where v.fname like '%$filter%' or v.lname like '%$filter%' or a.name like '%$filter%' or u.action like '%$filter%'
    order by u.id desc ";
    $result = mysqli_query($conn, $query);
    $mainArr = array();
    if(mysqli_num_rows($result)>0){
        $counter=1;
        while ($row = mysqli_fetch_assoc($result)) {
            $arr = array();
            $user_name = $row['user_name'];
            $admin_name = $row['admin_name'];
            $action = $row['action'];
            $conditions = $row['conditions'];
            $time_done = $row['time_edited'];
            $dateTime = new DateTime($time_done);
            $newDate = $dateTime -> format('F j g:i A');
            $arr['user_name'] = $user_name;
            $arr['admin_name'] = $admin_name;
            $arr['action'] = $action;
            $arr['conditions'] = $conditions;
            $arr['time_done'] = $newDate;
            $mainArr[] = $arr;
        }
    }else{
            $mainArr['Error']="Error";
    }
    echo json_encode($mainArr);
}
?>