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
            <div class="svgHead" onclick="goPage('attach_med')">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><g fill="currentColor"><path d="M18.986 16.471a4.596 4.596 0 0 0 3.748-1.331l7.405-7.405a4.585 4.585 0 0 0 1.356-3.231a4.478 4.478 0 0 0-1.316-3.222a4.473 4.473 0 0 0-3.188-1.317h-.033a4.587 4.587 0 0 0-3.23 1.356l-7.405 7.405a4.601 4.601 0 0 0-1.269 4.157a.536.536 0 0 0 1.049-.209a3.53 3.53 0 0 1 .976-3.192l7.405-7.405a3.521 3.521 0 0 1 2.482-1.043c.975 0 1.805.35 2.458 1.003s1.01 1.527 1.004 2.458a3.525 3.525 0 0 1-1.044 2.482l-7.405 7.405a3.546 3.546 0 0 1-2.879 1.024a.538.538 0 0 0-.588.475a.534.534 0 0 0 .474.59zm-3.846 6.802a4.57 4.57 0 0 0 1.229-4.334a.53.53 0 0 0-.646-.394a.534.534 0 0 0-.394.645a3.51 3.51 0 0 1-.946 3.328l-7.405 7.405a3.521 3.521 0 0 1-2.482 1.043a3.373 3.373 0 0 1-2.458-1.003a3.413 3.413 0 0 1-1.003-2.458a3.528 3.528 0 0 1 1.043-2.483l7.405-7.405a3.516 3.516 0 0 1 2.906-1.021a.546.546 0 0 0 .592-.471a.536.536 0 0 0-.471-.592a4.592 4.592 0 0 0-3.783 1.327l-7.405 7.405a4.589 4.589 0 0 0-1.356 3.231a4.478 4.478 0 0 0 1.316 3.222c.85.85 1.98 1.317 3.188 1.317h.033a4.587 4.587 0 0 0 3.23-1.356l7.407-7.406z"/><path d="M22.734 8.872a.534.534 0 0 0-.756 0l-13.5 13.5a.534.534 0 1 0 .756.756l13.5-13.5a.534.534 0 0 0 0-.756z"/></g></svg>
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