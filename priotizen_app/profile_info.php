<?php
require('connection.php');
session_start();
$id = $_SESSION['account_id'];
$query = "SELECT * FROM verified where id = $id";
$results = mysqli_fetch_assoc(mysqli_query($conn,$query));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Information</title>
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/profile_info.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="script/script.js"></script>
</head>
<body>
    <div class="container">
        <div class="head">
            <div class="svgHead" onclick="goPage('profile')">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="m4 10l9 9l1.4-1.5L7 10l7.4-7.5L13 1z"/></svg> 
            </div>
            <p>PROFILE INFORMATION</p>
            <div class="svgHead" style="visibility: hidden;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g transform="translate(20 0) scale(-1 1)"><path fill="currentColor" d="m4 10l9 9l1.4-1.5L7 10l7.4-7.5L13 1z"/></g></svg>
            </div>
        </div>
        
        <div class="profile">
            <div class="allnames">
                <div class="entry">
                   <div class="info">
                        <p>First Name</p>
                        <div class="input">
                            <p><?php echo $results['fname'] ?></p>
                        </div>
                   </div>
                   <div class="info">
                    <p>M.I</p>
                    <div class="input">
                        <p><?php echo $results['mi'] ?></p>
                    </div>
                    <div class="info">
                        <p>Last Name</p>
                        <div class="input">
                            <p><?php echo $results['lname'] ?></p>
                        </div>
                    </div>
                </div>
               
                </div>
                <div class="images">
                    <img src="user_img/<?php echo $results['photo'] ?>" alt="">
                </div>
            </div>
        

        <div class="details">
            <div class="entryInfo">
                <p>Email</p>
                <div class="entryInfo_entry">
                    <p><?php echo $results['email'] ?></p>
                </div>
            </div>
            <div class="twoEntry">
                <div class="entryInfo">
                    <p>Birthday</p>
                    <div class="entryInfo_entry">
                        <p><?php echo $date = date('F d, Y', strtotime($results['bdate']) ); ?></p>
                    </div>
                </div>
                <div class="entryInfo">
                    <p>Status</p>
                    <div class="entryInfo_entry">
                        <p><?php echo $results['status_rs'] ?></p>
                    </div>
                </div>
            </div>
            <div class="entryInfo">
                <p>Compelete Address</p>
                <div class="entryInfo_entry">
                    <p><?php echo $results['address'] ?></p>
                </div>
            </div>
            <div class="entryInfo">
                <p>Mobile Number</p>
                <div class="entryInfo_entry">
                    <p>0<?php echo $results['number'] ?></p>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>