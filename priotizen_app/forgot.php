<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot</title>
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
      .notifications{
        width: 19em;
        display:flex;
        justify-content: center;
        align-items: center;
      }
      .buttonSubmit button{
        position: relative;
        width: 100%;
      }
    </style>
    </style>
</head>
<body>
  <ul class="notifications"></ul>
    <div class="container">
        <div class="logo">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"><path fill="white" d="M17.998 8.064L6.003 8.11l-.277-3.325A3 3 0 0 1 8.17 1.482l.789-.143a17.031 17.031 0 0 1 6.086 0l.786.143a3 3 0 0 1 2.443 3.302Z"/><path fill="white" d="M6.009 8.109a5.994 5.994 0 0 0 11.984-.045Z" opacity=".25"/><path fill="white" d="m17.198 13.385l-4.49 4.49a1 1 0 0 1-1.415 0l-4.491-4.49a9.945 9.945 0 0 0-4.736 7.44a1 1 0 0 0 .994 1.108h17.88a1 1 0 0 0 .994-1.108a9.945 9.945 0 0 0-4.736-7.44Z"/><path fill="white" d="M15.69 12.654a6.012 6.012 0 0 1-7.381 0a10.004 10.004 0 0 0-1.507.73l4.491 4.492a1 1 0 0 0 1.414 0l4.491-4.491a10.005 10.005 0 0 0-1.507-.731Z" opacity=".5"/></svg> -->
            <img src="../assets/logo.png" id="" style="height: 5em; width: 5em;" />

            <h2>FORGOT PASSWORD</h2>
        </div>
            <div class="entryInput">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"><g fill="white"><path fill-rule="evenodd" d="M9 6.25a2.75 2.75 0 1 0 0 5.5a2.75 2.75 0 0 0 0-5.5ZM7.75 9a1.25 1.25 0 1 1 2.5 0a1.25 1.25 0 0 1-2.5 0ZM9 12.25c-1.196 0-2.315.24-3.164.665c-.803.402-1.586 1.096-1.586 2.085v.063c-.002.51-.004 1.37.81 1.959c.378.273.877.448 1.495.559c.623.112 1.422.169 2.445.169s1.822-.057 2.445-.169c.618-.111 1.117-.286 1.495-.56c.814-.589.812-1.448.81-1.959V15c0-.99-.783-1.683-1.586-2.085c-.849-.424-1.968-.665-3.164-.665ZM5.75 15c0-.115.113-.421.757-.743c.6-.3 1.48-.507 2.493-.507s1.894.207 2.493.507c.644.322.757.628.757.743c0 .604-.039.697-.19.807c-.122.088-.373.206-.88.298c-.502.09-1.203.145-2.18.145c-.977 0-1.678-.055-2.18-.145c-.507-.092-.758-.21-.88-.298c-.152-.11-.19-.203-.19-.807Z" clip-rule="evenodd"/><path d="M19 12.75a.75.75 0 0 0 0-1.5h-4a.75.75 0 0 0 0 1.5h4ZM19.75 9a.75.75 0 0 1-.75.75h-5a.75.75 0 0 1 0-1.5h5a.75.75 0 0 1 .75.75ZM19 15.75a.75.75 0 0 0 0-1.5h-3a.75.75 0 0 0 0 1.5h3Z"/><path fill-rule="evenodd" d="M9.944 3.25h4.112c1.838 0 3.294 0 4.433.153c1.172.158 2.121.49 2.87 1.238c.748.749 1.08 1.698 1.238 2.87c.153 1.14.153 2.595.153 4.433v.112c0 1.838 0 3.294-.153 4.433c-.158 1.172-.49 2.121-1.238 2.87c-.749.748-1.698 1.08-2.87 1.238c-1.14.153-2.595.153-4.433.153H9.944c-1.838 0-3.294 0-4.433-.153c-1.172-.158-2.121-.49-2.87-1.238c-.748-.749-1.08-1.698-1.238-2.87c-.153-1.14-.153-2.595-.153-4.433v-.112c0-1.838 0-3.294.153-4.433c.158-1.172.49-2.121 1.238-2.87c.749-.748 1.698-1.08 2.87-1.238c1.14-.153 2.595-.153 4.433-.153ZM5.71 4.89c-1.006.135-1.586.389-2.01.812c-.422.423-.676 1.003-.811 2.009c-.138 1.028-.14 2.382-.14 4.289c0 1.907.002 3.261.14 4.29c.135 1.005.389 1.585.812 2.008c.423.423 1.003.677 2.009.812c1.028.138 2.382.14 4.289.14h4c1.907 0 3.262-.002 4.29-.14c1.005-.135 1.585-.389 2.008-.812c.423-.423.677-1.003.812-2.009c.138-1.028.14-2.382.14-4.289c0-1.907-.002-3.261-.14-4.29c-.135-1.005-.389-1.585-.812-2.008c-.423-.423-1.003-.677-2.009-.812c-1.027-.138-2.382-.14-4.289-.14h-4c-1.907 0-3.261.002-4.29.14Z" clip-rule="evenodd"/></g></svg>
                <input type="text" name="psn" id="psn" placeholder="Enter PSN ID No.">
            </div>
            <div class="entryInput">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"><path fill="white" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5l-8-5h16zm0 12H4V8l8 5l8-5v10z"/></svg>
                <input type="email" name="email" id="email" placeholder="Enter email">
            </div>
            
            <div class="buttonSubmit">
                <button type="submit" name="submit" onclick="submit()">Forgot Password</button>
                <div class="orline">
                    <hr>
                    <p>or</p>
                    <hr>
                </div>
                <button onclick="window.location.href='signin.php'">Cancel</button>
            </div>
    </div>
    <script src="https://cdn.emailjs.com/dist/email.min.js"></script> 
    <script>
    emailjs.init('wNOaPZ8yBLfSbRF8O'); 

    function sendEmail(to_email, fromname, message) {
        const serviceID = 'service_ri5dx1k'; 
        const templateID = 'template_a22qdxk'; 

        const emailParams = {
            to_email: to_email,
            from_name: fromname, 
            message: message,
        };

        emailjs.send(serviceID, templateID, emailParams)
            .then(function(response) {
                console.log('Email sent successfully!', response);
            })
            .catch(function(error) {
                console.error('Error sending email:', error);
            });
        }
        function submit(){
            const psn = document.querySelector('#psn').value
            const email = document.querySelector('#email').value
            fetch(`./backend/forgot.php?email=${email}&psn=${psn}`,{
                method:'GET'
            })
            .then( response => response.json() )
            .then( result =>{
                if(result[0] =="Success"){
                    createToast("success","Email Sent")
                    const message =`
                    We have received that you forgot your password and want to reset it. Here is the link to reset it. 
                    https://pig-tidy-gradually.ngrok-free.app/edsa-priotizen/priotizen_app/reset.php?app_id=${result[1]}
                    Please do not share this link with anyone.
                    Greetings from Quezone.`
                    sendEmail(email, "Forgot Password", message)
                }else{
                    createToast("error","Email Failed")
                }
            })
        }
    </script>
</body>
</html>