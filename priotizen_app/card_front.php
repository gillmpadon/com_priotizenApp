<?php
require('connection.php');
session_start();
$account_id = $_SESSION['account_id'];
$query = "SELECT v.*, t.signature FROM verified v inner join test t on v.app_id = t.user_id where v.app_id = '$account_id'";
$result = mysqli_query($conn, $query);
$assoc = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARD FRONT</title>
    <link rel="stylesheet" href="css/root.css">
    <link rel="icon" type="image/png" href="../LGU/assets/img/favicon.ico">
    <link rel="stylesheet" href="css/card_front.css">
    <script src="script/script.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <style>
        .container{
            width: 19em;
        }
        .information{
            position: relative;
        }
        #signature{
            position: absolute;
            height: 2em;
            width: 5em;
            mix-blend-mode: multiply;
            z-index: 100;
            top: 100%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="head">
            <div class="svgHead" onclick="goPage('profile')">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="m4 10l9 9l1.4-1.5L7 10l7.4-7.5L13 1z"/></svg> 
            </div>
            <p>ID INFORMATION</p>
            <div class="svgHead" id="download-front">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#7d848d" d="M6 20q-.825 0-1.413-.588T4 18v-3h2v3h12v-3h2v3q0 .825-.588 1.413T18 20H6Zm6-4l-5-5l1.4-1.45l2.6 2.6V4h2v8.15l2.6-2.6L17 11l-5 5Z"/></svg>
            </div>
        </div>

        <div class="dashboard" id="card-front">
            <div class="logo">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"><path fill="white" d="M17.998 8.064L6.003 8.11l-.277-3.325A3 3 0 0 1 8.17 1.482l.789-.143a17.031 17.031 0 0 1 6.086 0l.786.143a3 3 0 0 1 2.443 3.302Z"/><path fill="white" d="M6.009 8.109a5.994 5.994 0 0 0 11.984-.045Z" opacity=".25"/><path fill="white" d="m17.198 13.385l-4.49 4.49a1 1 0 0 1-1.415 0l-4.491-4.49a9.945 9.945 0 0 0-4.736 7.44a1 1 0 0 0 .994 1.108h17.88a1 1 0 0 0 .994-1.108a9.945 9.945 0 0 0-4.736-7.44Z"/><path fill="white" d="M15.69 12.654a6.012 6.012 0 0 1-7.381 0a10.004 10.004 0 0 0-1.507.73l4.491 4.492a1 1 0 0 0 1.414 0l4.491-4.491a10.005 10.005 0 0 0-1.507-.731Z" opacity=".5"/></svg> -->
                <img src="../assets/logo.png" id="" style="height: 3em; width: 3em;" />
                <p style="color: white;">Priotizen</p>
            </div>
            <div class="images">
                <img src="user_img/<?php echo $assoc['photo'] ?>" alt="">
                <p ><?php echo $assoc['fname']." ".$assoc['mi']." ".$assoc['lname'] ?></p>
                <p><?php echo $assoc['conditions'] ?></p>
            </div>
            <div class="information">
                <div class="entry">
                    <div class="intro">
                        <p>ID NO</p>
                        <p>:</p>
                    </div>
                    <p><?php echo $assoc['app_id']?></p>
                </div>
                <div class="entry">
                    <div class="intro">
                        <p>DOB</p>
                        <p>:</p>
                    </div>
                    <p><?php echo date('m/d/Y', strtotime($assoc['bdate']));?></p>
                </div>
               
                <div class="entry">
                    <div class="intro">
                        <p>Nationality</p>
                        <p>:</p>
                    </div>
                    <p style="text-transform: capitalize;"><?php echo $assoc['nationality']?></p>
                </div>
                <div class="entry">
                    <div class="intro">
                        <p>Status</p>
                        <p>:</p>
                    </div>
                    <p style="text-transform: capitalize;"><?php echo $assoc['status_rs']?></p>
                </div>
                <div class="entry">
                    <div class="intro">
                        <p>Phone</p>
                        <p>:</p>
                    </div>
                    <p><?php echo $assoc['number']?></p>
                </div>
             
                <div class="signature">
                    <p>Signature</p>
                </div>
                <img src="./documents/<?php echo $assoc['signature']?>" id="signature" alt="">
            </div>
            <svg id="bgSvg" width="261" height="435" viewBox="0 0 291 490" fill="red" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_7049_2)">
                <rect width="291" height="490" fill="white"></rect>
                <path d="M291 485.667H0V460.75C154.059 454.25 245.353 485.667 291 373V485.667Z" fill="#2E9DA6"></path>
                <path d="M291 490H0V465.084C154.059 458.584 245.353 490 291 377.333V490Z" fill="black"></path>
                <path d="M291 5.823H0V101.32C159.051 193.905 238.221 89.6738 291 101.32V5.823Z" fill="#2E9DA6"></path>
                <path d="M291 0H0V95.4967C159.051 188.082 238.221 83.8508 291 95.4967V0Z" fill="black"></path>
                </g>
                <defs>
                <clipPath id="clip0_7049_2">
                <rect width="291" height="490" fill="white"></rect>
                </clipPath>
                </defs>
            </svg>
         
        </div>
        <div class="buttonNav">
            <button  class="active"  onclick="goPage('card_front')">FRONT</button>
            <button class="notActive"  onclick="goPage('card_back')">BACK</button>
        </div>
        
    </div>
    <script>
    const downloadButton = document.getElementById('download-front');
    const cardContainer = document.getElementById('card-front');
    const info = localStorage.getItem('download_info');
    console.log(info);
    downloadButton.addEventListener('click', function () {
        const fullname = document.getElementById('fullname');
        html2canvas(cardContainer).then(function (canvas) {
            const link = document.createElement('a');
            link.href = canvas.toDataURL('image/png');
            link.download = '<?php echo  $assoc['fname'] ?>-card-front.png';
            link.click();
        });
    });
    </script>
</body>
</html>