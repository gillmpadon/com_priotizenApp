<?php
require('connection.php');
session_start();
$id = $_SESSION['account_id'];

$query = "SELECT n.id as receipt_id , n.user_id as user_id, c.name as company, n.status as status, r.price as price,r.img_receipt as receipt, r.discount as discount, r.date as time_date from notification n INNER JOIN receipt r on n.reciept_id = r.id INNER JOIN company c on n.company_id=c.id where n.user_id = '$id' ";
$queryResults = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Information</title>
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/history.css">
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

        <?php 
        if(mysqli_num_rows($queryResults)>0){
            $rowNum = mysqli_num_rows($queryResults);
            $firstEntry = 0;
            while($row = mysqli_fetch_assoc($queryResults)) { 
            ?>
            <?php if($firstEntry==0){?>
            <div class="board">
                <div class="date">
                    <?php 
                    $date = date('F j D',strtotime($row['time_date']));
                    echo $date;  ?>
                </div>
                <div class="twoEntry">
            <?php }?>
            <?php $firstEntry+=1; ?>
                    <div class="entry" onclick="view(<?php echo $row['receipt_id']?>)">
                        <div class="images">
                            <img src="receipt_img/<?php echo $row['receipt'] ?> ?>" alt="">
                        </div>
                        <div class="entry_info">
                            <p id="title"><?php echo $row['company'] ?></p>
                           <div class="info">
                            <p>Discount:</p>
                            <p><?php echo $row['discount'] ?>%</p>
                           </div>
                           <div class="info">
                            <p>Cash:</p>
                            <p>P<?php echo $row['price'] ?></p>
                           </div>
                           <div class="info">
                            <p>Time:</p>
                            <?php 
                            $time = date('g:i A', strtotime($row['time_date']));?>
                            <p><?php echo $time; ?></p>
                           </div>
                        </div>
                    </div>
            <?php if($rowNum==1 or $firstEntry==2){ $firstEntry=0; ?>  
            </div>
            </div>
            <?php }?>

           <?php }}else{?> 
            <p style='text-align:center; color:white;'>NO RECORDS FOR TODAY</p>
        <?php }?>


        </div>
    </div>
    <script>
        const view = (num) => window.location.href = 'history_view.php?view='+num;
    </script>
</body>
</html>