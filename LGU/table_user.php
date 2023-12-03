<?php
require('connection.php');
$query = "select a.id, a.admin_id as uid, a.name, a.email, a.number, ac.account_type from admin a inner join account ac on a.admin_id=ac.account_id 
UNION
select a.id, a.store_id as uid, a.name, a.email, a.number, ac.account_type from company a inner join account ac on a.store_id=ac.account_id ";
$result = mysqli_query($conn,$query);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>LGU Management</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="assets/css/confirmation.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <style>
        .row_data:hover{
            cursor: pointer;
        }
        tr{
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" >
        <?php 
        $class="table list";
        include('includes/sidebar.php'); ?>
    </div>
    <div class="main-panel">
    <?php include('includes/navbar.php'); ?>
		

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Admin & Store Lists</h4>
                                <p class="category">Discover who is among the lists</p>
                                <div class="col-md-12" style="display:flex; align-items:center; justify-content:center; gap:1em;">
                                    <input type="text" class="form-control" name="" id="search" placeholder="search">
                                    <select name="" id="type" class="form-control" style="width: 10em;">
                                        <option value="">Account</option>
                                        <option value="admin">Admin</option>
                                        <option value="company">Store</option>
                                    </select>
                                </div>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Name</th>
                                    	<th>Email</th>
                                    	<th>Number</th>
                                    	<th>Type</th>
                                    </thead>
                                    <tbody id="tbody">
                                    <?php
                                       
                                       if(mysqli_num_rows($result)>0){
                                        $count=1;
                                        while($row = mysqli_fetch_assoc($result)){
                                            extract($row);
                                            if ($account_type != "user") {
                                                echo  '<tr class="row_data" onclick="goToPage(\''.$uid.'\',\''.$account_type.'\')">
                                                        <td>'.$count.'</td>
                                                        <td>'.$name.'</td>
                                                        <td>'.$email.'</td>
                                                        <td>'.$number.'</td>
                                                        <td>'.$account_type.'</td>
                                                      </tr>';
                                                $count++;
                                            }
                                            
                                        }
                                       }else{
                                            echo '<tr class="row_data">
                                                    <td colspan="6" style="text-align: center;">NO DATA FOUND</td>
                                                  </tr>';
                                       }
                                     
                                    ?>
                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="dashboard.php">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="table.php">
                                User List
                            </a>
                        </li>
                        <li>
                            <a href="table_user.php">
                                Admin List
                            </a>
                        </li>
                        <li>
                          <a href="../priotizen_app/index.html">
                                Priotizen App
                            </a>
                        </li>
                    </ul>
                </nav>
                
            </div>
        </footer>


    </div>
</div>

<script>

    function goToPage(id,accountType){
        window.location.href = `user_view_admin.php?user_id=${id}&account_type=${accountType}`;
    }
    function createElementTag(e,count){
        const tbody = document.querySelector('#tbody')
        const {id , name, email, account_type , number} = e
        const tr = document.createElement('tr')
        const td1 = document.createElement('td')
        const td2 = document.createElement('td')
        const td3 = document.createElement('td')
        const td4 = document.createElement('td')
        const td5 = document.createElement('td')

        tr.classList.add("row_data")
        tr.onclick= function() {
            goToPage(id,account_type)
        }
        td1.textContent = count
        td2.textContent = `${name}`
        td3.textContent = email
        td4.textContent = number
        td5.textContent = account_type
        tr.appendChild(td1)
        tr.appendChild(td2)
        tr.appendChild(td3)
        tr.appendChild(td4)
        tr.appendChild(td5)
        tbody.appendChild(tr)
    }
    function refreshTags(){
        const entrydashElements = document.querySelectorAll('.row_data');
        for (let entry of entrydashElements) {
            entry.remove();
        }
    }

    const tbody = document.querySelector('#tbody');

function sendRequest(searchValue, typeValue,) {
  const value = searchValue ? searchValue : "";
  fetch(`./backend/admin_store.php?filter=${encodeURIComponent(value)}&type=${encodeURIComponent(typeValue)}`, {
    method: 'GET'
  })
    .then(response => response.json())
    .then(result => {
      if (result == "Error") {
        refreshTags();
        const tr = document.createElement('tr');
        const td = document.createElement('td');
        td.textContent = "NO DATA FOUND";
        td.style.textAlign = 'center';
        td.colSpan = 6;
        tr.classList.add('row_data');
        tr.appendChild(td);
        tbody.appendChild(tr);
      } else {
        refreshTags();
        let count = 1;
        result.map(item => {
            console.log(item);
         if(item.account_type != "user"){
            createElementTag(item, count);
            count++;
         }
          
        });
      }
    });
}

const search = document.getElementById('search');
const type = document.getElementById('type');

function updateSearch() {
  const typeVal = type.value !== "" ? type.value : "";
  sendRequest(search.value, typeVal, );
}

search.addEventListener('keyup', function (e) {
  console.log('keyup event triggered');
  updateSearch();
});

type.addEventListener('change', function (e) {
  console.log('change event for brgy triggered');
  updateSearch();
});

</script>

</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
