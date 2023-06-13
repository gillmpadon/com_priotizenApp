<?php
require('connection.php');
session_start();
$id = $_SESSION['account_id'];
$reciept_id = $_GET['view'];
$query = "SELECT n.id as receipt_id , n.user_id as user_id, c.name as company, n.status as status, r.price as price, r.discount as discount, r.img_product as product, r.date as time_date from notification n INNER JOIN receipt r on n.reciept_id = r.id INNER JOIN company c on n.company_id=c.id where n.user_id = $id and n.id = $reciept_id";
$queryResults = mysqli_query($conn,$query);
$assocQuery = mysqli_fetch_assoc($queryResults);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Information</title>
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/history_view.css">
    <script src="script/script.js"></script>
</head>
<body>
    <div class="container">
        <div class="head">
            <div class="svgHead" onclick="goPage('profile')">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="m4 10l9 9l1.4-1.5L7 10l7.4-7.5L13 1z"/></svg> 
            </div>
            <p>PURCHASE HISTORY</p>
            <div class="svgHead" style="visibility: hidden;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g transform="translate(20 0) scale(-1 1)"><path fill="currentColor" d="m4 10l9 9l1.4-1.5L7 10l7.4-7.5L13 1z"/></g></svg>
            </div>
        </div>

        <div class="dashboard">
            <div class="receipt">
                <p id="title"><?php $assocQuery['company'] ?></p>
                <div class="info">
                    <p>Discount:</p>
                    <p><?php $assocQuery['discount'] ?>%</p>
                </div>
                <div class="info">
                    <p>Cash:</p>
                    <p>P<?php $assocQuery['price'] ?></p>
                </div>
                <div class="info">
                    <p>Time:</p>
                    <?php 
                    $time = date('g:i A', strtotime($assocQuery['time_date'])); ?>
                    <p><?php echo $time; ?></p>
                </div>
            </div>
            <div class="images">
                <img src="notification_img/grocery.jpg" alt="">
                <img src="notification_img/receipt.jpeg" alt="">
            </div>
            
        </div>
        
    </div>
</body>
</html>