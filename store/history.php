<?php
require('./backend/connection.php');
if(isset($_GET['company_id'])){
    $_SESSION['company_id'] = $_GET['company_id'];
}
$company_id = $_SESSION['company_id'];
$query = "select r.price, r.discount, r.img_receipt as receipt, v.lname, n.status, r.date as date  from receipt r inner join verified v on r.user_id = v.app_id inner join notification n on r.receipt_id = n.reciept_id where  n.company_id = '$company_id' ";
$result = mysqli_query($conn, $query);
if (!$result) {
    echo  mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
 <link rel="icon" type="image/png" href="../LGU/assets/img/favicon.ico">

    <title>Notification</title>
    <link rel="stylesheet" href="../priotizen_app/css/root.css">
    <link rel="stylesheet" href="../priotizen_app/css/notification.css">
    <script src="./script/script.js"></script>
    <style>
      .container{
        position: relative;
        width: 19em;
      }
    </style>
</head>
<body>
    <div class="container">
        <div class="head"  style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1em;">
            <svg onclick="goPage('profile')" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M24 0v24H0V0h24ZM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036c-.01-.003-.019 0-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.016-.018Zm.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01l-.184-.092Z"/><path fill="currentColor" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2ZM8.5 9.5a3.5 3.5 0 1 1 7 0a3.5 3.5 0 0 1-7 0Zm9.758 7.484A7.985 7.985 0 0 1 12 20a7.985 7.985 0 0 1-6.258-3.016C7.363 15.821 9.575 15 12 15s4.637.821 6.258 1.984Z"/></g></svg>
            <p>history</p>
            <svg onclick="goPage('add_entry')" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256"><g id="galaAdd0" fill="none" stroke="currentColor" stroke-dasharray="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="4" stroke-opacity="1" stroke-width="16"><circle id="galaAdd1" cx="128" cy="128" r="112"/><path id="galaAdd2" d="M 79.999992,128 H 176.0001"/><path id="galaAdd3" d="m 128.00004,79.99995 v 96.0001"/></g></svg>
        </div>
        <div class="notifications">
            <?php
            if( mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    extract($row);
                    ?>
                <div class="entry" >
                <div class="entryImages">
                    <img src="../priotizen_app/receipt_img/<?php echo $receipt; ?>" alt="An Image">
                </div>
                <div class="info">
                    <p><?php echo $lname; ?></p>
                    <div class="details">
                        <div class="names">
                            <p>discount:</p>
                            <p>price:</p>
                            <p>time:</p>
                            <p>date:</p>
                        </div>
                        <div class="amounts">
                        <p>PHP<?php 
                            $discount = ((float)$row['discount'])/100 * ((float) $row['price']) ;
                            echo $discount; ?></p>
                            <p>P<?php echo $price; ?></p>
                            <p><?php
                            $time = date('g:i A', strtotime($date)); 
                            echo $time; ?> </p>
                            <p><?php
                            $formatted_date = date('M d', strtotime($date));
                            echo $formatted_date; ?> </p>
                        </div>
                    </div>
                    <button class="<?php echo $status=="Pending"? "paynow":"completed"; ?>" id="paynowBtn"><?php echo $status; ?></button>
                </div>
            </div>
            <?php
                }}
                else{
                    echo "  <p style='text-align:center; color:white;'>NO RECORDS FOR TODAY</p>";
                }
            ?>
      
        </div>
        <div class="buttonNav">
            <button class="notActive" onclick="goPage('entry')">ENTRY</button>
            <button class="active" onclick="goPage('history')">HISTORY</button>
        </div>
        
    </div>
 
</body>
</html>


