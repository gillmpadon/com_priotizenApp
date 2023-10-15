<?php
require('./backend/connection.php');
$id = $_GET['profile'];
$query = "SELECT * FROM doc where user_id = '$id' limit 1";
$result = mysqli_query($conn, $query);
$imgPsa; 
$imgMed ;
if($result){
    if(mysqli_num_rows($result)>0){
        $assoc = mysqli_fetch_assoc($result);
        $imgPsa = $assoc['psa'];
        $imgMed = $assoc['med'];
    }else{
        $imgPsa = "empty.jpg";
        $imgMed = "empty.jpg";
    }
}else{
    $imgPsa = "empty.jpg";
    $imgMed = "empty.jpg";
}

$user_id = $_GET['profile'];
$comQuery = "SELECT concat(fname, ' ',lname) as name , email , photo from verified where app_id = '$user_id'";
$comResult = mysqli_query($conn, $comQuery);
$name = "empty";
$email = "empty";
$img = "empty.jpg";
if($comResult){
    if(mysqli_num_rows($comResult)>0){
        $comAssoc = mysqli_fetch_assoc($comResult);
        $name = $comAssoc['name'];
        $email = $comAssoc['email'];
        $img = $comAssoc['photo'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../priotizen_app/css/root.css">
    <link rel="stylesheet" href="../priotizen_app/css/profile.css">
    <script src="./script/script.js"></script>
    <style>
        body, html{
            margin: 0;
            padding: 0;
        }
        .dashentry{
            width: 10em;
            height: 2.5em;
            color: gray;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--inputDiv);
            margin: auto;
            margin-bottom:1em;
            border-radius: .3em;
        }
        .modal{
            background: rgba(0, 0, 0, 1);
            height: 100%;
            width: 100%;
            z-index: 1;
            text-align: center;
        }
        .modal img{
            width: 90%;
            height: 60%;
            object-fit: cover;
        }
        .modal svg{
            color: var(--svgColor);
        }
        .head{
            width: 91%;
            height: 2em;
            position: relative;
            margin: auto;
            padding-top: 1em;
        }
        .head p{
            color: aliceblue;
        }
    </style>
</head>
<body>
    <div class="modal" style="display: none;">
        <div class="head" style="display: flex; align-items: center; justify-content: space-between;">
            <svg onclick="closeModal()" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32"><path fill="currentColor" d="M16 2C8.2 2 2 8.2 2 16s6.2 14 14 14s14-6.2 14-14S23.8 2 16 2zm0 26C9.4 28 4 22.6 4 16S9.4 4 16 4s12 5.4 12 12s-5.4 12-12 12z"/><path fill="currentColor" d="M21.4 23L16 17.6L10.6 23L9 21.4l5.4-5.4L9 10.6L10.6 9l5.4 5.4L21.4 9l1.6 1.6l-5.4 5.4l5.4 5.4z"/></svg>
            <p id="modalName">Profile</p>
            <p></p>
        </div>

        <br>
        <img id="modalPicture" src="" alt="">
    </div>
    <div class="container">
       
        <div class="head" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2em;">
            <svg onclick="window.location.href='profile.php'" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="m4 10l9 9l1.4-1.5L7 10l7.4-7.5L13 1z"/></svg> 
            <p>Profile</p>
            <p></p>
        </div>
        <div class="avatar">
            <img src="../priotizen_app/user_img/<?php echo $img ?>" alt="image" style="border-radius: .5em;">
            <p><?php echo $name ?></p>
            <p><?php echo $email ?></p>
        </div>
        <br>
        <div class="dashboard">
            <div class="dashentry" onclick="openModal(1,'<?php echo $imgPsa?>')">
                PSA
            </div>
            <div class="dashentry" onclick="openModal(2,'<?php echo $imgMed?>')">
                MED CERT
            </div>
        </div>
       
    </div>
    <script>
        const modal = document.querySelector('.modal')
        const modalPicture = document.querySelector("#modalPicture")
        const modalName = document.querySelector("#modalName")
        function openModal(num, file){
            modal.style.display = 'block';
            const message = num==1 ? 'PSA' : 'MED';
            modalPicture.src = `../priotizen_app/documents/${file}`
            modalName.textContent = message
        }
        function closeModal(){
            modal.style.display = 'none';
        }
    </script>
</body>
</html>