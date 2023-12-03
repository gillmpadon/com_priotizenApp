<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
 <link rel="icon" type="image/png" href="../LGU/assets/img/favicon.ico">

    <title>Notification</title>
    <link rel="stylesheet" href="../priotizen_app/css/root.css">
    <link rel="stylesheet" href="../priotizen_app/css/notification.css">
    <script src="./script/script.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .entrydash{
            margin-bottom: .5em;
            padding: 0;
            padding-inline: 2em;
            justify-content: space-between;
        }
        .dash{
            overflow: auto;
            height: 24em;
        }
        .dash::-webkit-scrollbar{
            width: 0;
        }
        .container{
            width: 19em;
            position: relative;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="head"  style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1em;">
            <svg onclick="goPage('profile')" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M24 0v24H0V0h24ZM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036c-.01-.003-.019 0-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.016-.018Zm.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01l-.184-.092Z"/><path fill="currentColor" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2ZM8.5 9.5a3.5 3.5 0 1 1 7 0a3.5 3.5 0 0 1-7 0Zm9.758 7.484A7.985 7.985 0 0 1 12 20a7.985 7.985 0 0 1-6.258-3.016C7.363 15.821 9.575 15 12 15s4.637.821 6.258 1.984Z"/></g></svg>
            <p>Pending User</p>
            <p></p>
        </div>
        <div class="search">
            <input id="search" type="text" placeholder="Search...">
            <svg id="searchSvg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 1024 1024"><path fill="currentColor" d="m795.904 750.72l124.992 124.928a32 32 0 0 1-45.248 45.248L750.656 795.904a416 416 0 1 1 45.248-45.248zM480 832a352 352 0 1 0 0-704a352 352 0 0 0 0 704z"/></svg>
        </div>
        <div class="dash">
        
        </div>
        <div class="buttonNav">
            <button class="notActive"onclick="goPage('verify')">VERIFIED</button>
            <button class="active" onclick="goPage('unverify')">PENDING</button>
        </div>
        </div>
        
        
    </div>
    <script>
   
        function refreshTags(){
            const dash = document.querySelector('.dash');
            while (dash.firstChild) {
                dash.removeChild(dash.firstChild);
            }
        }
        const dash = document.querySelector('.dash');
        function createElementTag(result){
            const id = result.id
            const name = result.name
            const email = result.email
            const status = result.status

            const entry = document.createElement('div');
            entry.classList.add('entrydash');
            // entry.onclick = function() {
            //     window.location.href = `view_profile.php?profile=${encodeURIComponent(id)}`;
            // };
            const text = document.createElement('div');
            text.classList.add('text');
            const p1 = document.createElement('p');

            p1.textContent = name;
            const p2 = document.createElement('p');
            p2.textContent = email
            text.appendChild(p1);
            text.appendChild(p2);

            const btn = document.createElement('div');
            btn.classList.add('btn');
            const p3 = document.createElement('p');
            p3.textContent = status
            btn.appendChild(p3);

            entry.appendChild(text);
            entry.appendChild(btn);
            dash.appendChild(entry);
        }
        function createElementTagError(){
            const name = "No User Found"
            const email = "error@example.com"
            const status = "Error"
            
            const entry = document.createElement('div');
            entry.classList.add('entrydash');
            const text = document.createElement('div');
            text.classList.add('text');
            const p1 = document.createElement('p');

            p1.textContent = name;
            const p2 = document.createElement('p');
            p2.textContent = email
            text.appendChild(p1);
            text.appendChild(p2);

            const btn = document.createElement('div');
            btn.classList.add('btn');
            const p3 = document.createElement('p');
            p3.textContent = status
            btn.appendChild(p3);

            entry.appendChild(text);
            entry.appendChild(btn);
            dash.appendChild(entry);
        }

        function goSearch(value){
            const status = 'Pending'
            fetch(`./backend/search.php?name=${value}&status=${status}`,{
                method: "GET",
            })
            .then(response => response.json())
            .then( result => {
                const entrydashElements = document.querySelectorAll('.entrydash');
                for (let entry of entrydashElements) {
                    entry.remove();
                }
                if(result =="Error" ){
                    createElementTagError()
                }else{
                result.map(test =>{
                   if(test.status == status){
                    createElementTag(test)
                   }
                })
             
                }
            });
        }
        const search = document.getElementById('search').value;
        const searchInput = document.getElementById('search');
        const searchSvg = document.getElementById('searchSvg');
        goSearch("");
        searchInput.addEventListener('keyup', function(e){
            if(e.keyCode === 13){
                goSearch(search);
            }
        });
        searchSvg.addEventListener('click', function(e){
            const searchs = document.getElementById('search').value;
            goSearch(searchs);
        });

        function goOnePage(id){
            window.location.href = `view_profile.php?profile=${encodeURIComponent(id)}`;
        }
    </script>
 
</body>
</html>


