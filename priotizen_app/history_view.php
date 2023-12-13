<?php
require('connection.php');
session_start();
$id = $_SESSION['account_id'];
$reciept_id = $_GET['view'];
$query = "SELECT n.id as receipt_id , n.user_id as user_id, c.name as company, n.status as status, r.price as price, r.receipt_id as receipt_number, r.discount as discount, r.img_receipt as receipt, r.date as time_date from notification n INNER JOIN receipt r on n.reciept_id = r.receipt_id INNER JOIN company c on n.company_id=c.store_id where n.user_id = '$id' and r.id ='$reciept_id'";
$queryResults = mysqli_query($conn,$query);
if(!$queryResults){
    echo mysqli_error($conn);
}
$assocQuery = mysqli_fetch_assoc($queryResults);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Information</title>
    <link rel="stylesheet" href="css/root.css"><link rel="icon" type="image/png" href="../LGU/assets/img/favicon.ico">
    <link rel="stylesheet" href="css/history_view.css">
    <script src="script/script.js"></script>
    <style>
        .info p{
            color: white;
        }
    </style>
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
                <p id="title"><?php echo $assocQuery['company'] ?></p>
                <div class="info">
                    <p>Discount:</p>
                    <p><?php echo $assocQuery['discount'] ?>%</p>
                </div>
                <div class="info">
                    <p>Cash:</p>
                    <p>P<?php echo $assocQuery['price'] ?></p>
                </div>
                <div class="info">
                    <p>Time:</p>
                    <?php 
                    $time = date('g:i A', strtotime($assocQuery['time_date'])); ?>
                    <p><?php echo $time; ?></p>
                </div>
                <div class="info">
                    <p>Receipt:</p>
                    <p><?php echo $assocQuery['receipt_number'] ?></p>
                </div>
            </div>
            <div class="images">
                <img src="receipt_img/<?php echo $assocQuery['receipt'] ?>" alt="">
            </div>
            
        </div>
        
    </div>
</body>
</html>