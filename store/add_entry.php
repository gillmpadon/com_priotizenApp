<?php
require('./backend/connection.php');
$user_id = "";
if(isset($_GET['byPass'])){
    $_SESSION['company_id'] = $_GET['byPass'];
    $user_id = $_GET['user_id'];
}
$company_id = json_encode($_SESSION['company_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="icon" type="image/png" href="../LGU/assets/img/favicon.ico">
    <title>Notification</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="css/toast.css">
    <link rel="stylesheet" href="css/entry.css">
    <script src="./script/script.js" defer></script>
    <style>
        .container{
            width:19em;
            margin-top:1em;
        }
    </style>
</head>
<body>
    <ul class="notifications" style="display:none"></ul>
    <div class="container">
        <div class="head">
            <svg onclick="goPage('entry')" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20.25 10a1.25 1.25 0 1 0-2.5 0h2.5Zm-14 0a1.25 1.25 0 1 0-2.5 0h2.5Zm13.866 2.884a1.25 1.25 0 0 0 1.768-1.768l-1.768 1.768ZM12 3l.884-.884a1.25 1.25 0 0 0-1.768 0L12 3Zm-9.884 8.116a1.25 1.25 0 0 0 1.768 1.768l-1.768-1.768ZM7 22.25h10v-2.5H7v2.5ZM20.25 19v-9h-2.5v9h2.5Zm-14 0v-9h-2.5v9h2.5Zm15.634-7.884l-9-9l-1.768 1.768l9 9l1.768-1.768Zm-10.768-9l-9 9l1.768 1.768l9-9l-1.768-1.768ZM17 22.25A3.25 3.25 0 0 0 20.25 19h-2.5a.75.75 0 0 1-.75.75v2.5Zm-10-2.5a.75.75 0 0 1-.75-.75h-2.5A3.25 3.25 0 0 0 7 22.25v-2.5Z"/></svg>
            <p>ADD TRANSACTION</p>
            <p></p>
        </div>
        <div class="content">
            <div class="entry">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M12 1.25a4.75 4.75 0 1 0 0 9.5a4.75 4.75 0 0 0 0-9.5ZM8.75 6a3.25 3.25 0 1 1 6.5 0a3.25 3.25 0 0 1-6.5 0ZM12 12.25c-2.313 0-4.445.526-6.024 1.414C4.42 14.54 3.25 15.866 3.25 17.5v.102c-.001 1.162-.002 2.62 1.277 3.662c.629.512 1.51.877 2.7 1.117c1.192.242 2.747.369 4.773.369s3.58-.127 4.774-.369c1.19-.24 2.07-.605 2.7-1.117c1.279-1.042 1.277-2.5 1.276-3.662V17.5c0-1.634-1.17-2.96-2.725-3.836c-1.58-.888-3.711-1.414-6.025-1.414ZM4.75 17.5c0-.851.622-1.775 1.961-2.528c1.316-.74 3.184-1.222 5.29-1.222c2.104 0 3.972.482 5.288 1.222c1.34.753 1.961 1.677 1.961 2.528c0 1.308-.04 2.044-.724 2.6c-.37.302-.99.597-2.05.811c-1.057.214-2.502.339-4.476.339c-1.974 0-3.42-.125-4.476-.339c-1.06-.214-1.68-.509-2.05-.81c-.684-.557-.724-1.293-.724-2.601Z" clip-rule="evenodd"/></svg>
                <input id="user_id" type="text" placeholder="User ID" value="<?php echo $user_id? $user_id:"User ID" ?> ">
            </div>
            <div class="entry">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256"><path fill="currentColor" d="M128 88a40 40 0 1 0 40 40a40 40 0 0 0-40-40Zm0 64a24 24 0 1 1 24-24a24 24 0 0 1-24 24Zm112-96H16a8 8 0 0 0-8 8v128a8 8 0 0 0 8 8h224a8 8 0 0 0 8-8V64a8 8 0 0 0-8-8Zm-46.35 128H62.35A56.78 56.78 0 0 0 24 145.65v-35.3A56.78 56.78 0 0 0 62.35 72h131.3A56.78 56.78 0 0 0 232 110.35v35.3A56.78 56.78 0 0 0 193.65 184ZM232 93.37A40.81 40.81 0 0 1 210.63 72H232ZM45.37 72A40.81 40.81 0 0 1 24 93.37V72ZM24 162.63A40.81 40.81 0 0 1 45.37 184H24ZM210.63 184A40.81 40.81 0 0 1 232 162.63V184Z"/></svg>
                <input id="money" type="number" placeholder="Bill" >
            </div>
            <div class="entry">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10Z"/><path fill="currentColor" d="M15.5 16a.5.5 0 1 0 0-1a.5.5 0 0 0 0 1Zm-7-7a.5.5 0 1 0 0-1a.5.5 0 0 0 0 1Z"/><path d="m16 8l-8 8"/></g></svg>
                <input id="discount" type="number" placeholder="Discount">
            </div>
            <div class="entry">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16"><g fill="currentColor"><path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932c0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853c0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836c0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91c0 .542-.412.914-1.135.982V8.518l.087.02z"/><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M8 13.5a5.5 5.5 0 1 1 0-11a5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></g></svg>
                <input id="payment" type="number" placeholder="Payment" readonly>
            </div>
            <div class="entry" onclick="fileinput()">
                <input id="file" type="file" style="display: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="currentColor"><path d="M18 8a2 2 0 1 1-4 0a2 2 0 0 1 4 0Z"/><path fill-rule="evenodd" d="M11.943 1.25h.114c2.309 0 4.118 0 5.53.19c1.444.194 2.584.6 3.479 1.494c.895.895 1.3 2.035 1.494 3.48c.19 1.411.19 3.22.19 5.529v.088c0 1.909 0 3.471-.104 4.743c-.104 1.28-.317 2.347-.795 3.235c-.21.391-.47.742-.785 1.057c-.895.895-2.035 1.3-3.48 1.494c-1.411.19-3.22.19-5.529.19h-.114c-2.309 0-4.118 0-5.53-.19c-1.444-.194-2.584-.6-3.479-1.494c-.793-.793-1.203-1.78-1.42-3.006c-.215-1.203-.254-2.7-.262-4.558c-.002-.473-.002-.973-.002-1.501v-.058c0-2.309 0-4.118.19-5.53c.194-1.444.6-2.584 1.494-3.479c.895-.895 2.035-1.3 3.48-1.494c1.411-.19 3.22-.19 5.529-.19Zm-5.33 1.676c-1.278.172-2.049.5-2.618 1.069c-.57.57-.897 1.34-1.069 2.619c-.174 1.3-.176 3.008-.176 5.386v.844l1.001-.877a2.3 2.3 0 0 1 3.141.105l4.29 4.29a2 2 0 0 0 2.564.222l.298-.21a3 3 0 0 1 3.732.225l2.83 2.547c.286-.598.455-1.384.545-2.493c.098-1.205.099-2.707.099-4.653c0-2.378-.002-4.086-.176-5.386c-.172-1.279-.5-2.05-1.069-2.62c-.57-.569-1.34-.896-2.619-1.068c-1.3-.174-3.008-.176-5.386-.176s-4.086.002-5.386.176Z" clip-rule="evenodd"/></g></svg>
                <p id="proof">Proof of Transactions</p>
            </div>

            <button onclick="proceedTransact()">
                Proceed
            </button>
        </div>
        
    </div>
    <script>
        const file =  document.getElementById("file");
        function fileinput() {
            file.click();
        }
        file.addEventListener("change",()=>{
            const proof = document.getElementById("proof");
            proof.textContent = file.files[0].name
            console.log('okay')
        })

        function updatePayment(){
            const discount = document.getElementById("discount").value;
            const money = document.getElementById("money").value;
            const payment = document.getElementById("payment");
            const calcu = money-(money * (discount/100))
            payment.value = calcu;
        }
        const discount = document.getElementById("discount");
        discount.addEventListener('keyup',()=>{
            updatePayment();
        })
        const money = document.getElementById("money");
        money.addEventListener('keyup',()=>{
            updatePayment();
        })

        function proceedTransact(){
            const user_id = document.getElementById("user_id").value;
            const discount = document.getElementById("discount").value;
            const money = document.getElementById("money").value;
            const payment = document.getElementById("payment");
            const formData = new FormData();
            formData.append('company_id', <?php echo $company_id; ?>);
            formData.append('user_id',user_id);
            formData.append('discount',discount);
            formData.append('money',money);
            const calcu = money-(money * (discount/100))
            formData.append('payment',calcu);
            formData.append('image',file.files[0])
            fetch('./backend/transact.php',{
                method: "POST",
                body: formData
            })
            .then( response => response.json() )
            .then( result => {
            const notifications = document.querySelector('.notifications');
            notifications.style.display = 'block';
                if(result == "Successful") {
                    createToast("success","Receipt Added")
                    setTimeout(()=> window.location.href="entry.php",2000)
                }else{
                    createToast("error","Receipt Error")
                }
            // notifications.style.display = 'none';

            } );
        }
    </script>
 
</body>
</html>


