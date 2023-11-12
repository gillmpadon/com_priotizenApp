<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SETTINGS</title>
    <link rel="stylesheet" href="css/root.css"><link rel="icon" type="image/png" href="../LGU/assets/img/favicon.ico">
    <link rel="stylesheet" href="css/setting.css">
    <script src="script/script.js"></script>
    <style>
        .container{
            width: 19em;
        }
        .entry{
            background: var(--secondary);
            color: var(--textInput);

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
                <p class="title">NOTIFICATION</p>
                <p>Before and after a purchase is made, users who have enabled the purchase notification will receive real-time alerts or notifications. It gives quick access to details about the transaction, such as the description of the item purchased, the price paid, and the time paid. This function improves user interaction, provides users with transactional information, and aids in more efficient purchase tracking.</p>
           </div>
           <div class="entry">
                <p class="title">ID INFORMATION</p>
                <p>The ID information with the QR code creates a special QR code with the PWD and senior citizen's necessary identifying information. It normally contains details like name, birthdate, ID number, and other pertinent information. By scanning the QR code that can be seen in the web-based system, this feature enables the admin to quickly authenticate and safeguard their identity.</p>
            </div>
            <div class="entry">
                <p class="title">PROFILE INFO</p>
                <p>Users can examine their personal information in a system through their profile information, but because the information is already saved there for security reasons, they can only modify their display picture. Typically, it contains details like a person's name, phone number, address, and more. Users may now examine their detailed profiles, which can be utilized internally or shared with others for a variety of functions.</p>
            </div>
            <div class="entry">
                <p class="title">PURCHASES HISTORY</p>
                <p>The user's previous system transactions or purchases are tracked and stored in the purchasing history. It offers a comprehensive list of the things purchased, including dates of purchase, essential information, and special discounts for PWD or senior citizen users. Users can use this to review their spending habits, keep track of their expenses, and base decisions on their past purchases.</p>
            </div>
            <div class="entry">
                <p class="title">PAY NOW</p>
                <p>Users have a quick and easy way to start a financial transaction thanks to the "Pay Now" button. Once the payment has been made physically, the user can click the button and the administrator can click the receive button to confirm the transaction's success. This turns the transaction button green.</p>
            </div>
            <div class="entry">
                <p class="title">CONRIMED</p>
                <p>The purchase confirm button allows users to finalize and confirm their purchase after reviewing the details of their selected items. It is typically displayed during the checkout process on a platform or application. This feature ensures that users have a deliberate step to verify their purchase decision before proceeding, reducing the likelihood of accidental or unintended purchases.</p>
            </div>
        </div>
        
    </div>
</body>
</html>