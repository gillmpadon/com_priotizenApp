<?php
require('./backend/connection.php');
$query = "SELECT app_id, valid_id from verified";
$result = mysqli_query($conn, $query);
$app_idArr = array();
while ($row = mysqli_fetch_array($result)){
    $app_idArr[] = $row['app_id']." ".$row['valid_id'];
}
$all_id = json_encode($app_idArr);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
 <link rel="icon" type="image/png" href="../LGU/assets/img/favicon.ico">

    <title>Notification</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="./css/toast.css">
    <link rel="stylesheet" href="../priotizen_app/css/root.css">
    <link rel="stylesheet" href="../priotizen_app/css/notification.css">

    <style>
      .container{
        position: relative;
        /* width: 19em; */
      }
      .section{
        position: relative;
        height:80%;
      }
      
    </style>
</head>
<body>
<ul class="notifications"></ul>
    <div class="container">
        <div class="head"  style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1em;">
            <svg onclick="goPage('signin')" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z"/><path fill="currentColor" d="M3.076 5.617A1 1 0 0 1 4 5h10a7 7 0 1 1 0 14H5a1 1 0 1 1 0-2h9a5 5 0 1 0 0-10H6.414l1.793 1.793a1 1 0 0 1-1.414 1.414l-3.5-3.5a1 1 0 0 1-.217-1.09Z"/></g></svg>
            <p>Scan</p>
            <svg style='visibility:hidden' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256"><g id="galaAdd0" fill="none" stroke="currentColor" stroke-dasharray="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="4" stroke-opacity="1" stroke-width="16"><circle id="galaAdd1" cx="128" cy="128" r="112"/><path id="galaAdd2" d="M 79.999992,128 H 176.0001"/><path id="galaAdd3" d="m 128.00004,79.99995 v 96.0001"/></g></svg>
        </div>
        <div class="section"> 
            <div id="reader"> </div> 
        </div> 
      
    </div> 
        
        
    </div>
    <script
        src="https://unpkg.com/html5-qrcode"> 
    </script> 

    <!-- <script src="./script/scanscript.js"></script>  -->
    <script>
   // script.js file 

    function goPage(str){
        window.location.href = `${str}.php`
    }

    const notifications = document.querySelector(".notifications"),
    buttons = document.querySelectorAll(".buttons .btn");

    // Object containing details for different types of toasts
    const toastDetails = {
        timer: 5000,
        success: {
            icon: 'fa-circle-check',
        },
        error: {
            icon: 'fa-circle-xmark',
        },
        warning: {
            icon: 'fa-triangle-exclamation',
        },
        info: {
            icon: 'fa-circle-info',
        }
    }

    const removeToast = (toast) => {
        toast.classList.add("hide");
        if(toast.timeoutId) clearTimeout(toast.timeoutId); // Clearing the timeout for the toast
        setTimeout(() => toast.remove(), 500); // Removing the toast after 500ms
    }

    const createToast = (id, message) => {
        // Getting the icon and text for the toast based on the id passed
        const { icon } = toastDetails[id];
        const toast = document.createElement("li"); // Creating a new 'li' element for the toast
        toast.className = `toast ${id}`; // Setting the classes for the toast
        // Setting the inner HTML for the toast
        toast.innerHTML = `<div class="column">
                            <i class="fa-solid ${icon}"></i>
                            <span style="color:black">${message}</span>
                        </div>
                        <i class="fa-solid fa-xmark" onclick="removeToast(this.parentElement)"></i>`;
        notifications.appendChild(toast); // Append the toast to the notification ul
        // Setting a timeout to remove the toast after the specified duration
        toast.timeoutId = setTimeout(() => removeToast(toast), toastDetails.timer);
    }


    function domReady(fn) { 
        if ( 
            document.readyState === "complete" || 
            document.readyState === "interactive"
        ) { 
            setTimeout(fn, 1000); 
        } else { 
            document.addEventListener("DOMContentLoaded", fn); 
        } 
    } 

    domReady(function () { 
        const html5QrCode = new Html5Qrcode("reader");
        const config = { fps: 60, qrbox: { width: 250, height: 250 } };
        let countergreen =1
        let counterRed =1
        function onScanSuccess(decodedText, decodedResult) {
            let all_id = <?php echo $all_id ?>;
            if(decodedText.length>10){
                const newa = (decodedText.substring(decodedText.indexOf('?')+1)).split('&')
                const codeapp_id = newa[0].split("=")[1]
                const codevalid_id = newa[1].split("=")[1]
                if(all_id.includes(`${codeapp_id} ${codevalid_id}`)){
                    if(countergreen!=0){
                        countergreen--
                        createToast('success', 'Success')
                        setTimeout(() => {
                            const ifStore = localStorage.getItem('user_uid')
                            window.location.href= `add_entry.php?byPass=${ifStore}&user_id=${codeapp_id}`
                        }, 2000);
                    }
                }else{
                    if(counterRed!=0){
                        counterRed--
                        createToast('error', 'Error')
                    }
                }
                
            }else{
                createToast('error', 'Error')
            }
            
        }
        
        function onScanError(errorMessage) {
            alert(`Scan error: ${errorMessage}`, error)
        }
        
        html5QrCode.start( { facingMode: "environment" }, config, onScanSuccess, onScanError);
    });

    </script>
</body>
</html>


