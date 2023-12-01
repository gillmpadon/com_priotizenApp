<?php
require('connection.php');
$app_id = $_GET['app_id'];
$valid_id = $_GET['valid_id'];
$query = "SELECT v.*, a.account_status  FROM verified v inner join account a on v.app_id = a.account_id where v.app_id = '$app_id' and v.valid_id = '$valid_id'";
$results = mysqli_query($conn, $query);
$verified = false;
if($results){
    if(mysqli_num_rows($results)>0){
        $assoc = mysqli_fetch_assoc($results);
        $fullname_res = $assoc['fname']." ".$assoc['mi']." ".$assoc['lname'];
        $app_id_res =  $assoc['app_id'];
        $photo_res = $assoc['photo'];
        if($assoc['account_status']=="Verified"){
            $verified = true;
        }
    }else{
        $fullname_res = "Unknown User";
        $app_id_res = $app_id;
        $photo_res = "unknown.png";
    }
}else{
    $fullname_res = "Unknown User";
    $app_id_res = $app_id;
    $photo_res = "unknown.png";
}

$user_id = json_encode($app_id);
$isUserVerified = json_encode($verified);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../LGU/assets/img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/style.css">
    <title>VERIFY USER</title>
</head>
<body>
<div class="container">
        <div class="images">
            <img src="../priotizen_app/user_img/<?php echo $photo_res ?>" alt="">
        </div>
        <div class="info">
            <p><?php echo $fullname_res ?></p>
            <p>APP ID: <?php echo $app_id_res ?></p>
        </div>
        <div class="status" id="<?php echo ($verified)? "verified":"notverified" ?>">
            <p style="text-transform: uppercase;"><?php echo ($verified)? "Verified":"Not Verified" ?></p>
        </div>
    </div>
    <script>
        console.log(window.cookie)
        function getCookie(cname) {
            let name = cname + "=";
            let ca = document.cookie.split(';');
            for(let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
                }
            }
            return "";
            }
        const ifStore = getCookie('company')
        const user_id = <?php echo $user_id ?>; 
        const isUserVerified = <?php echo $isUserVerified ?>;
        console.log(ifStore);
        if(ifStore.length!=0 && isUserVerified){
            setTimeout(() => {
                window.location.href =`../store/add_entry.php?byPass=${ifStore}&user_id=${user_id}`
            }, 2000);
        }
    </script>
</body>
</html>