<?php
require('connection.php');
$app_id = $_GET['app_id'];
$valid_id = $_GET['valid_id'];
$query = "SELECT * FROM verified where app_id = $app_id and valid_id = '$valid_id'";
$results = mysqli_query($conn, $query);
$verified = false;
if(mysqli_num_rows($results)>0){
    $assoc = mysqli_fetch_assoc($results);
    $fullname_res = $assoc['fname']." ".$assoc['mi']." ".$assoc['lname'];
    $app_id_res =  $assoc['app_id'];
    $photo_res = $assoc['photo'];
    $verified = true;
}else{
    $fullname_res = "Unknown User";
    $app_id_res = $app_id;
    $photo_res = "unknown.png";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/style.css">
    <title>VERIFY USER</title>
</head>
<body>
<div class="container">
        <div class="images">
            <img src="user_img/<?php echo $photo_res ?>" alt="">
        </div>
        <div class="info">
            <p><?php echo $fullname_res ?></p>
            <p>APP ID: <?php echo $app_id_res ?></p>
        </div>
        <div class="status" id="<?php echo ($verified)? "verified":"notverified" ?>">
            <p style="text-transform: uppercase;"><?php echo ($verified)? "Verified":"Not Verified" ?></p>
        </div>
    </div>
</body>
</html>