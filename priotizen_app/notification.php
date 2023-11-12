<?php
require('connection.php');
session_start();
if(isset($_GET['user_id'])){
    $_SESSION['account_id'] = $_GET['user_id'];
}
$id = $_SESSION['account_id'];
$date = date('F j D');
$query = "SELECT n.reciept_id as receipt_id, n.user_id as user_id, c.name as company, n.status as status, r.price as price, r.discount as discount, r.img_receipt as receipt, r.date as time_date from notification n INNER JOIN receipt r on n.reciept_id = r.receipt_id INNER JOIN company c on n.company_id=c.store_id where DATE(r.date) = CURDATE() and n.user_id = '$id'";
$queryResults = mysqli_query($conn, $query);
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
    <link rel="stylesheet" href="css/confirmation.css" >
    <script src="script/script.js"></script>
    <style>
        .notifications{
            height: 0;

        }
        .container{
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="bodyconfirmation" style="display:none;">
        <div class="confirmation" >
            <div class="cons-text">
                <h1>Confirmation</h1>
                <p>Are you sure you want to proceed to pay?</p>
            </div>
            <div class="cons-buttons">
                <button style="background: red;" onclick="proceedToPay('no')">No</button>
                <button style="background: green;" onclick="proceedToPay('yes')">Yes</button>
            </div>
        </div>
    </div>
    <ul class="notifications" ></ul>
    <div class="container" >
        <div class="head">
            <p>Notification</p>
            <p><span style="font-style: italic; color:white;"><?php echo $date ?></span>  Transactions</p>
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
            echo "<p style='text-align:center;'>NO RECORDS FOR TODAY</p>";
        }
        ?>
            

            
        </div>

        <div class="buttonNav">
            <button class="active" onclick="goPage('notification')">NOTIFICATION</button>
            <button class="notActive"onclick="goPage('profile')">PROFILE</button>
        </div>
        
    </div>
    <script>
        let showConfirmation = false
        function proceedToPay(str){
        const confirmation = document.querySelector('.bodyconfirmation');
           if(str == "yes"){
            const uid = localStorage.getItem('item');
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
                    confirmation.style.display = 'none';
                    paynowBtn.style.background="green";
                    paynowBtn.innerHTML = "COMPLETED"
                }
            });
           }else{
            showConfirmation = false
            confirmation.style.display = 'none';
           }
        }
        function payNow(uid){
            const confirmation = document.querySelector('.bodyconfirmation');
            console.log('status', showConfirmation)
            if(showConfirmation) {
                showConfirmation = false;
                confirmation.style.display = 'none';
                localStorage.removeItem('item');
            }else{
                showConfirmation = true;
                confirmation.style.display = 'block';
                localStorage.setItem('item',uid)
                console.log(localStorage.getItem('item'));
            }
        }
    </script>
</body>
</html>


