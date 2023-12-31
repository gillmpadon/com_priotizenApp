<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="css/toast.css">
    <link rel="stylesheet" href="css/root.css"><link rel="icon" type="image/png" href="../LGU/assets/img/favicon.ico">
    <link rel="stylesheet" href="css/form.css">
    <script src="script/script.js" defer></script>
</head>
<body>
  <ul class="notifications"></ul>
    <div class="container">
        <div class="logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"><path fill="white" d="M17.998 8.064L6.003 8.11l-.277-3.325A3 3 0 0 1 8.17 1.482l.789-.143a17.031 17.031 0 0 1 6.086 0l.786.143a3 3 0 0 1 2.443 3.302Z"/><path fill="white" d="M6.009 8.109a5.994 5.994 0 0 0 11.984-.045Z" opacity=".25"/><path fill="white" d="m17.198 13.385l-4.49 4.49a1 1 0 0 1-1.415 0l-4.491-4.49a9.945 9.945 0 0 0-4.736 7.44a1 1 0 0 0 .994 1.108h17.88a1 1 0 0 0 .994-1.108a9.945 9.945 0 0 0-4.736-7.44Z"/><path fill="white" d="M15.69 12.654a6.012 6.012 0 0 1-7.381 0a10.004 10.004 0 0 0-1.507.73l4.491 4.492a1 1 0 0 0 1.414 0l4.491-4.491a10.005 10.005 0 0 0-1.507-.731Z" opacity=".5"/></svg>
            <h2>RESET PASSWORD</h2>
        </div>
            <div class="entryInput passwordInput">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 15 15"><path fill="none" stroke="white" d="M12.5 8.5v-1a1 1 0 0 0-1-1h-10a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-1m0-4h-4a2 2 0 1 0 0 4h4m0-4a2 2 0 1 1 0 4m-9-6v-3a3 3 0 0 1 6 0v3m2.5 4h1m-3 0h1m-3 0h1"/></svg>
                <input id="passInput1" type="password" name="password" placeholder="New Password">
            </div>
            <div class="entryInput passwordInput">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 15 15"><path fill="none" stroke="white" d="M12.5 8.5v-1a1 1 0 0 0-1-1h-10a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-1m0-4h-4a2 2 0 1 0 0 4h4m0-4a2 2 0 1 1 0 4m-9-6v-3a3 3 0 0 1 6 0v3m2.5 4h1m-3 0h1m-3 0h1"/></svg>
                <input id="passInput2" type="password" name="cpassword" placeholder="Confirm password">
                <svg id="eyePass" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 36 36"><path fill="white" d="M25.19 20.4a6.78 6.78 0 0 0 .43-2.4a6.86 6.86 0 0 0-6.86-6.86a6.79 6.79 0 0 0-2.37.43L18 13.23a4.78 4.78 0 0 1 .74-.06A4.87 4.87 0 0 1 23.62 18a4.79 4.79 0 0 1-.06.74Z" class="clr-i-outline clr-i-outline-path-1"/><path fill="white" d="M34.29 17.53c-3.37-6.23-9.28-10-15.82-10a16.82 16.82 0 0 0-5.24.85L14.84 10a14.78 14.78 0 0 1 3.63-.47c5.63 0 10.75 3.14 13.8 8.43a17.75 17.75 0 0 1-4.37 5.1l1.42 1.42a19.93 19.93 0 0 0 5-6l.26-.48Z" class="clr-i-outline clr-i-outline-path-2"/><path fill="white" d="m4.87 5.78l4.46 4.46a19.52 19.52 0 0 0-6.69 7.29l-.26.47l.26.48c3.37 6.23 9.28 10 15.82 10a16.93 16.93 0 0 0 7.37-1.69l5 5l1.75-1.5l-26-26Zm9.75 9.75l6.65 6.65a4.81 4.81 0 0 1-2.5.72A4.87 4.87 0 0 1 13.9 18a4.81 4.81 0 0 1 .72-2.47Zm-1.45-1.45a6.85 6.85 0 0 0 9.55 9.55l1.6 1.6a14.91 14.91 0 0 1-5.86 1.2c-5.63 0-10.75-3.14-13.8-8.43a17.29 17.29 0 0 1 6.12-6.3Z" class="clr-i-outline clr-i-outline-path-3"/><path fill="none" d="M0 0h36v36H0z"/></svg>
            </div>
            <div class="buttonSubmit">
                <button type="submit" name="submit" onclick="resetEmail()">Change Password</button>
                <div class="orline">
                    <hr>
                    <p>or</p>
                    <hr>
                </div>
                <button onclick="window.location.href='signin.php'">Quit</button>
            </div>
    </div>
 <script>
    var passInput1 = document.getElementById('passInput1');
    var passInput2 = document.getElementById('passInput2');
    var svgContainer = document.getElementById('eyePass');
    var isPasswordVisible = true;
    svgContainer.addEventListener('click', function() {
    isPasswordVisible = !isPasswordVisible;
    if (isPasswordVisible) {
        svgContainer.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="black" d="M2 5.27L3.28 4L20 20.72L18.73 22l-3.08-3.08c-1.15.38-2.37.58-3.65.58c-5 0-9.27-3.11-11-7.5c.69-1.76 1.79-3.31 3.19-4.54L2 5.27M12 9a3 3 0 0 1 3 3a3 3 0 0 1-.17 1L11 9.17A3 3 0 0 1 12 9m0-4.5c5 0 9.27 3.11 11 7.5a11.79 11.79 0 0 1-4 5.19l-1.42-1.43A9.862 9.862 0 0 0 20.82 12A9.821 9.821 0 0 0 12 6.5c-1.09 0-2.16.18-3.16.5L7.3 5.47c1.44-.62 3.03-.97 4.7-.97M3.18 12A9.821 9.821 0 0 0 12 17.5c.69 0 1.37-.07 2-.21L11.72 15A3.064 3.064 0 0 1 9 12.28L5.6 8.87c-.99.85-1.82 1.91-2.42 3.13Z"/></svg>';
        passInput1.type = "password";
        passInput2.type = "password";
    } else {
        svgContainer.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5Z"/><path fill="none" d="M0 0h24v24H0z"/></svg>';
        passInput1.type = "text";
        passInput2.type = "text";
    }
    });

    function resetEmail(){
        var pass1 = document.getElementById('passInput1').value;
        var pass2 = document.getElementById('passInput2').value;
        
        if(pass1 != pass2){
            createToast("error","Passwords do not match")
        }else{
            const url = new URLSearchParams(window.location.search)
            const app_id = url.get('app_id')
            
            const formdata = new FormData();
            formdata.append('pass', pass1);
            formdata.append('id', app_id);
            fetch(`./backend/changepass_reg.php`,{
                method:'POST',
                body: formdata
            })
            .then(response=>response.json())
            .then(result=>{
                if(result=="Success"){
                createToast("success","Updated Successfully")
                setTimeout(() => {
                    window.location.href='signin.php'
                }, 2000);
                }else{
                    createToast("error","Updated Failed")
                }
            })
        }
    }
 </script>
</body>
</html>