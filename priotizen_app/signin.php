<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="css/toast.css">
    <link rel="stylesheet" href="css/root.css"><link rel="icon" type="image/png" href="../LGU/assets/img/favicon.ico">
    <link rel="stylesheet" href="css/form.css">
    <script src="script/script.js" defer></script>
    <style>
      .container{
        position: relative;
        width: 19em;
      }
      .buttonSubmit button{
        position: relative;
        width: 100%;
      }
    </style>
</head>
<body>
  <ul class="notifications"></ul>
    <div class="container">
        <div class="logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"><path fill="white" d="M17.998 8.064L6.003 8.11l-.277-3.325A3 3 0 0 1 8.17 1.482l.789-.143a17.031 17.031 0 0 1 6.086 0l.786.143a3 3 0 0 1 2.443 3.302Z"/><path fill="white" d="M6.009 8.109a5.994 5.994 0 0 0 11.984-.045Z" opacity=".25"/><path fill="white" d="m17.198 13.385l-4.49 4.49a1 1 0 0 1-1.415 0l-4.491-4.49a9.945 9.945 0 0 0-4.736 7.44a1 1 0 0 0 .994 1.108h17.88a1 1 0 0 0 .994-1.108a9.945 9.945 0 0 0-4.736-7.44Z"/><path fill="white" d="M15.69 12.654a6.012 6.012 0 0 1-7.381 0a10.004 10.004 0 0 0-1.507.73l4.491 4.492a1 1 0 0 0 1.414 0l4.491-4.491a10.005 10.005 0 0 0-1.507-.731Z" opacity=".5"/></svg>
            <h2>SIGNIN</h2>
        </div>
           <div class="form">
              <div class="entryInput">
                  <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"><path fill="white" fill-rule="evenodd" d="M12 1.25a4.75 4.75 0 1 0 0 9.5a4.75 4.75 0 0 0 0-9.5ZM8.75 6a3.25 3.25 0 1 1 6.5 0a3.25 3.25 0 0 1-6.5 0ZM12 12.25c-2.313 0-4.445.526-6.024 1.414C4.42 14.54 3.25 15.866 3.25 17.5v.102c-.001 1.162-.002 2.62 1.277 3.662c.629.512 1.51.877 2.7 1.117c1.192.242 2.747.369 4.773.369s3.58-.127 4.774-.369c1.19-.24 2.07-.605 2.7-1.117c1.279-1.042 1.277-2.5 1.276-3.662V17.5c0-1.634-1.17-2.96-2.725-3.836c-1.58-.888-3.711-1.414-6.025-1.414ZM4.75 17.5c0-.851.622-1.775 1.961-2.528c1.316-.74 3.184-1.222 5.29-1.222c2.104 0 3.972.482 5.288 1.222c1.34.753 1.961 1.677 1.961 2.528c0 1.308-.04 2.044-.724 2.6c-.37.302-.99.597-2.05.811c-1.057.214-2.502.339-4.476.339c-1.974 0-3.42-.125-4.476-.339c-1.06-.214-1.68-.509-2.05-.81c-.684-.557-.724-1.293-.724-2.601Z" clip-rule="evenodd"/></svg>
                  <input type="text" name="email" placeholder="Enter email" id="email">
              </div>
              <div class="entryInput passwordInput">
                  <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 15 15"><path fill="none" stroke="white" d="M12.5 8.5v-1a1 1 0 0 0-1-1h-10a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-1m0-4h-4a2 2 0 1 0 0 4h4m0-4a2 2 0 1 1 0 4m-9-6v-3a3 3 0 0 1 6 0v3m2.5 4h1m-3 0h1m-3 0h1"/></svg>
                  <input id="passInput" type="password" name="passcode" placeholder="Enter password">
                  <svg id="eyePass" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 36 36"><path fill="white" d="M25.19 20.4a6.78 6.78 0 0 0 .43-2.4a6.86 6.86 0 0 0-6.86-6.86a6.79 6.79 0 0 0-2.37.43L18 13.23a4.78 4.78 0 0 1 .74-.06A4.87 4.87 0 0 1 23.62 18a4.79 4.79 0 0 1-.06.74Z" class="clr-i-outline clr-i-outline-path-1"/><path fill="white" d="M34.29 17.53c-3.37-6.23-9.28-10-15.82-10a16.82 16.82 0 0 0-5.24.85L14.84 10a14.78 14.78 0 0 1 3.63-.47c5.63 0 10.75 3.14 13.8 8.43a17.75 17.75 0 0 1-4.37 5.1l1.42 1.42a19.93 19.93 0 0 0 5-6l.26-.48Z" class="clr-i-outline clr-i-outline-path-2"/><path fill="white" d="m4.87 5.78l4.46 4.46a19.52 19.52 0 0 0-6.69 7.29l-.26.47l.26.48c3.37 6.23 9.28 10 15.82 10a16.93 16.93 0 0 0 7.37-1.69l5 5l1.75-1.5l-26-26Zm9.75 9.75l6.65 6.65a4.81 4.81 0 0 1-2.5.72A4.87 4.87 0 0 1 13.9 18a4.81 4.81 0 0 1 .72-2.47Zm-1.45-1.45a6.85 6.85 0 0 0 9.55 9.55l1.6 1.6a14.91 14.91 0 0 1-5.86 1.2c-5.63 0-10.75-3.14-13.8-8.43a17.29 17.29 0 0 1 6.12-6.3Z" class="clr-i-outline clr-i-outline-path-3"/><path fill="none" d="M0 0h36v36H0z"/></svg>
              </div>
              <a id="forget" href="forgot.php">Forgot Pasword?</a>
              <div class="buttonSubmit">
                  <button name="submit" type="submit" onclick="loginAccount()">Sign In</button>
              </div>
           </div>
    </div>
    <script>
      function loginAccount(){
        const email = document.getElementById('email');
        const passInput = document.getElementById('passInput');
        fetch(`./backend/user.php?email=${email.value}&password=${passInput.value}`,{
          method: 'GET'
        })
        .then(response => response.json())
        .then( result => {
          if(result.message == "Successful"){
            const account_type = result.account_type
            const isfirstlogin = result.isfirstlogin
            createToast("success","Login Successful")
            if(account_type=="user"){
              const {message, app_id , photo, uniqueDownload, account_id, valid_id, account_type, account_name} = result
              localStorage.setItem('account_id', account_id)
              localStorage.setItem('account_name', account_name)
              localStorage.setItem('app_id', app_id);
              localStorage.setItem('photo', photo);
              localStorage.setItem('uniqueDownload', uniqueDownload);
              localStorage.setItem('valid_id', valid_id);
              localStorage.setItem('qrcode_valid_id', valid_id);
              localStorage.setItem('qrcode_app_id', app_id);
              setTimeout(()=>{
                window.location.href = `${(isfirstlogin =="0")? "changepass" :"notification"}.php?user_id=${app_id}&user_type=user`;
              },2000) 
              
            }else if(account_type=="company"){
              const {company_id , ...rest} = result
              setTimeout(()=>{
              window.location.href = `../store/${(isfirstlogin =="0")? "changepass" :"entry"}.php?company_id=${company_id}&user_type=store`;
            },2000)
            }
            else{
              const { id , ...rest} = result
              setTimeout(()=>{
              window.location.href = `../LGU/dashboard.php?user_id=${id}`;
            },2000)
            }
          }else{
            createToast("error","No User Found")
          }
        })
      }
    </script>
    <script src="script/showpass.js"></script>
    
</body>
</html>