<?php
require('connection.php');
session_start();
$id = $_SESSION['account_id'];
$query = "SELECT * FROM doc where user_id = '$id' limit 1";
$assoc = mysqli_fetch_assoc(mysqli_query($conn,$query));
$goHome = false;
$med = $assoc['med'];
$checkmed= false;
if($assoc['psa']!=null && $assoc['med']!=null){
    $goHome = true;
}
if($med!=null){
    $checkmed = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="css/toast.css">
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/profile.css">
    <script src="script/script.js" defer></script>
    <style>
        #fileinput{
            height: 3em;
            border: 1px solid #43689d;
            width: 100%;
            background-color: #43689d;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #fileinput p{
            text-align: center;
            color: white;
        }
    </style>
    
</head>
<body>
    <div class="container">
    <ul class="notifications"></ul>
        <div class="head" style="display:flex; justify-content:space-around; align-items:center; ">
            <div class="svgHead" onclick="goPage('profile')" style="<?php echo $goHome? "":"visibility: hidden;" ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="m4 10l9 9l1.4-1.5L7 10l7.4-7.5L13 1z"/></svg> 
            </div>
            <p>Personal Documents</p>
            <div class="svgHead" onclick="sendAttachment()">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16"><path fill="currentColor" d="M12.49 7.14L3.44 2.27c-.76-.41-1.64.3-1.4 1.13l1.24 4.34c.05.18.05.36 0 .54l-1.24 4.34c-.24.83.64 1.54 1.4 1.13l9.05-4.87a.98.98 0 0 0 0-1.72Z"/></svg>
            </div>
        </div>
        <div class="attach" style="width: 100%; height:80%">
            <img id="previewImage" src="./documents/<?php echo $checkmed? $med :"empty.jpg" ?>" alt="this is an image" style="width: 100%; height:75%; object-fit:cover;">
            <input type="file" name="file" id="file"  style="visibility: hidden;">
            <div id="fileinput">
                <p>Upload Med Certificate</p>
            </div>
        </div>
        
        <div class="buttonNav">
            <button class="active" onclick="goPage('attach_med')">MED CERT</button>
            <button class="notActive" onclick="goPage('attach_psa')">PSA</button>
        </div>
    </div>
    <script>
        const previewImage = document.getElementById('previewImage');
        const fileinput = document.getElementById('fileinput');
        const file = document.getElementById('file');
        fileinput.addEventListener('click', () => {
            file.click();
        })
        file.addEventListener('change',()=>{
            if (file.files && file.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                };
                reader.readAsDataURL(file.files[0]);
            }
        })
        function sendAttachment(){
            const formData = new FormData();
            formData.append('name', localStorage.getItem('account_name'))
            formData.append('doc','med')
            formData.append('user_id', localStorage.getItem('account_id'));
            formData.append('file', file.files[0]);
            fetch('./backend/upload.php', {
                method: 'POST',
                body: formData
            })
          .then(response => response.json())
          .then( result => {
            if(result== "Successful"){
                console.log("okay")
                createToast("success","Successful Upload")
            }else{
                createToast("error","Failed Upload")
                console.log("not")
            }
          })
        }
        console.log(localStorage.getItem('account_id'))
    </script>
</body>
</html>