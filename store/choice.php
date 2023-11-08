<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SETTINGS</title>
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/setting.css">
    <script src="script/script.js"></script>
    <style>
        .dashboard{
            padding-top: 3em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="head">
            <div class="svgHead" onclick="goPage('profile')">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="m4 10l9 9l1.4-1.5L7 10l7.4-7.5L13 1z"/></svg> 
            </div>
            <p>SETTINGS</p>
            <div class="svgHead" style="visibility: hidden;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g transform="translate(20 0) scale(-1 1)"><path fill="currentColor" d="m4 10l9 9l1.4-1.5L7 10l7.4-7.5L13 1z"/></g></svg>
            </div>
        </div>

        <div class="dashboard">
           <div class="entry">
                <button onclick="goPage('setting')">Manual</button>
            </div>
            <div class="entry">
                <button onclick="goPage('changepass_reg')">Change Password</button>
            </div>
        </div>
        
    </div>
</body>
</html>