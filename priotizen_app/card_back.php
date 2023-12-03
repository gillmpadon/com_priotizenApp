<?php
require('connection.php');
session_start();
$account_id = $_SESSION['account_id'];
$query = "SELECT * FROM verified where app_id = '$account_id'";
$result = mysqli_query($conn, $query);
$assoc = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARD BACK</title>
    <link rel="stylesheet" href="css/root.css"><link rel="icon" type="image/png" href="../LGU/assets/img/favicon.ico">
    <link rel="stylesheet" href="css/card_front.css">
    <script src="script/script.js"></script>
    <script src="qrcode/qrcode.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <style>
        .container{
            width: 19em;
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
            <div class="svgHead" id="download-back">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#7d848d" d="M6 20q-.825 0-1.413-.588T4 18v-3h2v3h12v-3h2v3q0 .825-.588 1.413T18 20H6Zm6-4l-5-5l1.4-1.45l2.6 2.6V4h2v8.15l2.6-2.6L17 11l-5 5Z"/></svg>
            </div>
        </div>

        <div class="dashboard" id="card-back">
            <div class="logo">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"><path fill="white" d="M17.998 8.064L6.003 8.11l-.277-3.325A3 3 0 0 1 8.17 1.482l.789-.143a17.031 17.031 0 0 1 6.086 0l.786.143a3 3 0 0 1 2.443 3.302Z"/><path fill="white" d="M6.009 8.109a5.994 5.994 0 0 0 11.984-.045Z" opacity=".25"/><path fill="white" d="m17.198 13.385l-4.49 4.49a1 1 0 0 1-1.415 0l-4.491-4.49a9.945 9.945 0 0 0-4.736 7.44a1 1 0 0 0 .994 1.108h17.88a1 1 0 0 0 .994-1.108a9.945 9.945 0 0 0-4.736-7.44Z"/><path fill="white" d="M15.69 12.654a6.012 6.012 0 0 1-7.381 0a10.004 10.004 0 0 0-1.507.73l4.491 4.492a1 1 0 0 0 1.414 0l4.491-4.491a10.005 10.005 0 0 0-1.507-.731Z" opacity=".5"/></svg> -->
                <img src="../assets/logo.png" id="" style="height: 3em; width: 3em;" />

                <p style="color: white;">Priotizen</p>
            </div>
            <div class="qrContainer" id="qrcode"></div>
            <div class="information">
                <div class="entry emergency">
                    <div class="intro" id="contact">
                        <p>Emergency Contact</p>
                    </div>
                </div>
                <div class="entry emergency">
                    <div class="intro">
                        <p>Family Name</p>
                        <p>:</p>
                    </div>
                    <p><?php echo $assoc['family_name']; ?></p>
                </div>
                <div class="entry emergency">
                    <div class="intro">
                        <p>Family No.</p>
                        <p>:</p>
                    </div>
                    <p><?php echo $assoc['family_contact']; ?></p>
                </div>
            </div>
            <svg id="bgSvg" width="261" height="435" viewBox="0 0 291 490" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_7049_2)">
                <rect width="291" height="490" fill="white"/>
                <path d="M291 485.667H0V460.75C154.059 454.25 245.353 485.667 291 373V485.667Z" fill="#2E9DA6"/>
                <path d="M291 490H0V465.084C154.059 458.584 245.353 490 291 377.333V490Z" fill="#000F30"/>
                <path d="M291 5.823H0V101.32C159.051 193.905 238.221 89.6738 291 101.32V5.823Z" fill="#2E9DA6"/>
                <path d="M291 0H0V95.4967C159.051 188.082 238.221 83.8508 291 95.4967V0Z" fill="#000F30"/>
                </g>
                <defs>
                <clipPath id="clip0_7049_2">
                <rect width="291" height="490" fill="white"/>
                </clipPath>
                </defs>
            </svg>
         
        </div>
        <div class="buttonNav">
            <button class="notActive"  onclick="goPage('card_front')">FRONT</button>
            <button class="active"  onclick="goPage('card_back')">BACK</button>
        </div>
        
    </div>
    <script>
         
        var qrContainer = document.getElementById('qrcode');
            const valid_id = localStorage.getItem('qrcode_valid_id');
            const app_id = localStorage.getItem('qrcode_app_id');
            var text = `https://pig-tidy-gradually.ngrok-free.app/edsa-priotizen/priomanage_web/index.php?app_id=${encodeURIComponent(app_id)}&valid_id=${encodeURIComponent(valid_id)}`;
            console.log(text);
            qrContainer.innerHTML = "";
            var qrcode = new QRCode(qrContainer, {
                text: text,
                width: 190,
                height: 190,
            });
            
            const downloadButton = document.getElementById('download-back');
            const cardContainer = document.getElementById('card-back');
            downloadButton.addEventListener('click', function () {
                html2canvas(cardContainer).then(function (canvas) {
                    const link = document.createElement('a');
                    link.href = canvas.toDataURL('image/png');
                    link.download = '<?php echo $assoc['fname'] ?>-card-back.png';
                    link.click();
                });
            });
    </script>
</body>
</html>