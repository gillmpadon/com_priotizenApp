<?php
require('connection.php');
session_start();
$app_id = $_SESSION['account_id'];
$query = "SELECT v.*, a.account_status FROM verified v INNER JOIN account a on v.app_id = a.account_id where v.app_id = '$app_id'";
$result = mysqli_query($conn,$query);
if(!$result){
    echo mysqli_error($conn);
}
$assoc = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/root.css"><link rel="icon" type="image/png" href="../LGU/assets/img/favicon.ico">
    <link rel="stylesheet" href="css/profile.css">
    <script src="script/script.js"></script>
    <style>
        .container{
            width: 19em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="head">
            <p>Profile</p>
        </div>
        <div class="avatar">
            <?php
                $photo = $assoc['photo'] ;
                $imagePath = "./user_img/$photo";
                if(file_exists($imagePath)) {
                    echo '<img  src="./user_img/'.$photo.'"  alt="..."/>';
                }else{
                    echo '<img  src="./user_img/empty.jpg"  alt="..."/>';
                }
            ?>
            <p style="line-height:1em;"><?php echo $assoc['fname']." ".$assoc['mi']." ".$assoc['lname'] ?></p>
            <p><?php echo $assoc['number'] ?></p>
            <p style="padding-top: .5em;"><?php echo $assoc['account_status'];?></p>
        </div>
        <br>
        <div class="dashboard" style="margin-top:3em;">
            <div class="entry" onclick="goPage('profile_info')">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"><path fill="white" fill-rule="evenodd" d="M12 1.25a4.75 4.75 0 1 0 0 9.5a4.75 4.75 0 0 0 0-9.5ZM8.75 6a3.25 3.25 0 1 1 6.5 0a3.25 3.25 0 0 1-6.5 0ZM12 12.25c-2.313 0-4.445.526-6.024 1.414C4.42 14.54 3.25 15.866 3.25 17.5v.102c-.001 1.162-.002 2.62 1.277 3.662c.629.512 1.51.877 2.7 1.117c1.192.242 2.747.369 4.773.369s3.58-.127 4.774-.369c1.19-.24 2.07-.605 2.7-1.117c1.279-1.042 1.277-2.5 1.276-3.662V17.5c0-1.634-1.17-2.96-2.725-3.836c-1.58-.888-3.711-1.414-6.025-1.414ZM4.75 17.5c0-.851.622-1.775 1.961-2.528c1.316-.74 3.184-1.222 5.29-1.222c2.104 0 3.972.482 5.288 1.222c1.34.753 1.961 1.677 1.961 2.528c0 1.308-.04 2.044-.724 2.6c-.37.302-.99.597-2.05.811c-1.057.214-2.502.339-4.476.339c-1.974 0-3.42-.125-4.476-.339c-1.06-.214-1.68-.509-2.05-.81c-.684-.557-.724-1.293-.724-2.601Z" clip-rule="evenodd"/></svg>
                <p>Profile</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 512 512"><path fill="none" stroke="white" stroke-linecap="square" stroke-miterlimit="10" stroke-width="48" d="m184 112l144 144l-144 144"/></svg>
            </div>
            <div class="entry svgNotFill" onclick="goPage('choice')">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"><g fill="white"><circle cx="12" cy="12" r="2" stroke="black"/><path fill="gray" d="m5.399 5.88l.25-.434a.5.5 0 0 0-.617.093l.367.34ZM3.4 9.344l-.478-.148a.5.5 0 0 0 .228.58l.25-.432Zm-.002 5.311l-.25-.433a.5.5 0 0 0-.228.581l.478-.148Zm2 3.464l-.367.34a.5.5 0 0 0 .617.093l-.25-.433Zm4.6 2.655h-.5a.5.5 0 0 0 .39.488l.11-.488Zm4.001.002l.111.488a.5.5 0 0 0 .389-.488H14ZM18.6 18.12l-.25.433a.5.5 0 0 0 .617-.093l-.367-.34Zm1.998-3.466l.478.148a.5.5 0 0 0-.228-.58l-.25.432Zm.002-5.311l.25.433a.5.5 0 0 0 .228-.581l-.478.148Zm-2-3.465l.367-.34a.5.5 0 0 0-.617-.093l.25.433ZM14 3.225h.5a.5.5 0 0 0-.389-.487L14 3.225Zm-4-.002l-.111-.488a.5.5 0 0 0-.39.488h.5Zm4 1.849h-.5h.5Zm5 8.66l-.25.433l.25-.433Zm-2 3.464l-.25.433l.25-.433ZM5 13.732l.25.433l-.25-.433Zm2-6.928l-.25.433l.25-.433ZM3.878 9.492a8.49 8.49 0 0 1 1.887-3.273l-.733-.68a9.49 9.49 0 0 0-2.11 3.658l.956.295Zm.76 6.758a8.527 8.527 0 0 1-.761-1.742l-.956.296a9.54 9.54 0 0 0 .852 1.946l.866-.5Zm1.128 1.53a8.53 8.53 0 0 1-1.127-1.53l-.866.5a9.528 9.528 0 0 0 1.259 1.71l.734-.68Zm8.123 2.51a8.49 8.49 0 0 1-3.778-.002l-.222.974a9.491 9.491 0 0 0 4.222.003l-.222-.975Zm6.233-5.782a8.49 8.49 0 0 1-1.887 3.273l.733.68a9.491 9.491 0 0 0 2.11-3.658l-.956-.295Zm-.76-6.758c.324.563.577 1.147.762 1.742l.955-.296a9.529 9.529 0 0 0-.852-1.946l-.866.5Zm-1.128-1.53a8.48 8.48 0 0 1 1.127 1.53l.866-.5a9.524 9.524 0 0 0-1.259-1.71l-.734.68Zm-8.123-2.51a8.49 8.49 0 0 1 3.778.002l.222-.974a9.49 9.49 0 0 0-4.222-.003l.222.975Zm.389 1.362v-1.85h-1v1.85h1ZM7.25 6.37l-1.601-.925l-.5.866l1.6.925l.5-.866Zm-2.5 6.928l-1.601.924l.5.866l1.6-.924l-.5-.866Zm.5-3.464l-1.6-.923l-.5.866l1.6.923l.5-.866Zm5.25 10.94v-1.847h-1v1.847h1Zm-3.75-4.012l-1.601.924l.5.866l1.6-.924l-.5-.866Zm12.101.925l-1.601-.925l-.5.866l1.601.925l.5-.866Zm-4.351 3.09v-1.85h-1v1.85h1ZM20.351 8.91l-1.601.924l.5.866l1.601-.924l-.5-.866Zm.498 5.311L19.25 13.3l-.5.866l1.6.923l.5-.866ZM14.5 5.072V3.225h-1v1.847h1Zm3.851.374l-1.601.925l.5.866l1.601-.925l-.5-.866ZM13.5 5.072c0 1.924 2.083 3.127 3.75 2.165l-.5-.866a1.5 1.5 0 0 1-2.25-1.3h-1Zm5.25 4.763c-1.667.962-1.667 3.368 0 4.33l.5-.866a1.5 1.5 0 0 1 0-2.598l-.5-.866Zm-1.5 6.928c-1.667-.962-3.75.24-3.75 2.165h1a1.5 1.5 0 0 1 2.25-1.299l.5-.866Zm-6.75 2.165c0-1.924-2.083-3.127-3.75-2.165l.5.866a1.5 1.5 0 0 1 2.25 1.3h1Zm-5.25-4.763c1.667-.962 1.667-3.368 0-4.33l-.5.866c1 .577 1 2.02 0 2.598l.5.866ZM9.5 5.072A1.5 1.5 0 0 1 7.25 6.37l-.5.866c1.667.962 3.75-.24 3.75-2.165h-1Z"/></g></svg>
                <p>Settings</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 512 512"><path fill="none" stroke="white" stroke-linecap="square" stroke-miterlimit="10" stroke-width="48" d="m184 112l144 144l-144 144"/></svg>
            </div>
            <div class="entry notFill" onclick="goPage('card_front')">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 48 48"><g fill="black" stroke="white" stroke-linejoin="round" stroke-width="4"><path d="M42 8H6a2 2 0 0 0-2 2v28a2 2 0 0 0 2 2h36a2 2 0 0 0 2-2V10a2 2 0 0 0-2-2Z"/><path d="M36 16h-8v8h8v-8Z"/><path stroke-linecap="round" d="M12 32h24M12 16h6m-6 8h6"/></g></svg>
                <p>ID Information</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 512 512"><path fill="none" stroke="white" stroke-linecap="square" stroke-miterlimit="10" stroke-width="48" d="m184 112l144 144l-144 144"/></svg>
            </div>
            <div class="entry" onclick="goPage('history')">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 32 32"><path fill="gray" d="M28 6H4a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h24a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2Zm0 2v3H4V8ZM4 24V13h24v11Z"/><path fill="gray" d="M6 20h10v2H6z"/></svg>
                <p>Purchase</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 512 512"><path fill="none" stroke="white" stroke-linecap="square" stroke-miterlimit="10" stroke-width="48" d="m184 112l144 144l-144 144"/></svg>
            </div>
            <div class="entry" onclick="goPage('logout')">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"><path fill="gray" d="M5 11h8v2H5v3l-5-4l5-4v3Zm-1 7h2.708a8 8 0 1 0 0-12H4a9.985 9.985 0 0 1 8-4c5.523 0 10 4.477 10 10s-4.477 10-10 10a9.985 9.985 0 0 1-8-4Z"/></svg>
                <p>Logout</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 512 512"><path fill="none" stroke="white" stroke-linecap="square" stroke-miterlimit="10" stroke-width="48" d="m184 112l144 144l-144 144"/></svg>
            </div>
        </div>
        <div class="buttonNav">
            <button class="notActive" onclick="goPage('notification')">NOTIFICATION</button>
            <button class="active" onclick="goPage('profile')">PROFILE</button>
        </div>
    </div>
</body>
</html>