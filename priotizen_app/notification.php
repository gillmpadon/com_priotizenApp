<?php
require('connection.php');
session_start();
if(isset($_GET['user_id'])){
    $_SESSION['account_id'] = $_GET['user_id'];
}
$id = $_GET['user_id'];
$date = date('F j D');
$query = "SELECT n.reciept_id as receipt_id, n.user_id as user_id, c.name as company, n.status as status, r.price as price, r.discount as discount, r.img_receipt as receipt, r.date as time_date from notification n INNER JOIN receipt r on n.reciept_id = r.receipt_id INNER JOIN company c on n.company_id=c.store_id where n.user_id ='$id' and DATE(r.date) = CURDATE()";
$queryResults = mysqli_query($conn,$query);
$rid;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/notification.css">
    <script src="script/script.js"></script>
</head>
<body>
    <div class="container">
        <div class="head">
            <p>Notification</p>
            <p><?php echo $date ?> Transactions</p>
        </div>
        <div class="notifications">

        <?php 
        if(mysqli_num_rows($queryResults)>0){
            while($row = mysqli_fetch_assoc($queryResults)) { ?>
        
            <div class="entry" >
                <div class="entryImages">
                    <img src="receipt_img/<?php echo $row['receipt'] ?>" alt="An Image">
                </div>
                <div class="info">
                    <p><?php echo $row['company'] ?></p>
                    <div class="details">
                        <div class="names">
                            <p>discount:</p>
                            <p>price:</p>
                            <p>time:</p>
                        </div>
                        <div class="amounts">
                            <p><?php echo $row['discount']; ?> %</p>
                            <p>P<?php echo $row['price']; ?></p>
                            <?php 
                            $time = date('g:i A', strtotime($row['time_date'])); ?>
                            <p><?php echo $time; ?></p>
                        </div>
                    </div>
                    <?php
                    $rid =$row['receipt_id'];
                    ?>
                    <button <?php echo ($row['status']=="Pending")? "":"disabled"; ?> class="<?php echo "btn".$row['receipt_id'] ?> <?php echo ($row['status']=="Pending")? "paynow":"completed"; ?>"  onclick="payNow('<?php echo $row['receipt_id'] ?>')"><?php echo ($row['status']=="Pending")? "Pay Now":"COMPLETED"; ?></button>
                </div>
            </div>
        <?php }
        }else{
            echo "<p style='text-align:center; color:white;'>NO RECORDS FOR TODAY</p>";
        }
        ?>
            

            
        </div>

        <div class="buttonNav">
            <button class="active" onclick="goPage('notification')">NOTIFICATION</button>
            <button class="notActive"onclick="goPage('profile')">PROFILE</button>
        </div>
        
    </div>
    <script>
        function payNow(uid){
            const paynowBtn = document.querySelector(`.btn${uid}`)
            const formData = new FormData();
            formData.append('uid',uid);
            fetch('./backend/paynow.php',{
                method: "POST",
                body: formData
            })
            .then( response => response.json() )
            .then( result => {
                if(result == "Successful"){
                    paynowBtn.style.background="green";
                    paynowBtn.innerHTML = "COMPLETED"
                }
            });
        }
    </script>
</body>
</html>


