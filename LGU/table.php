<?php
require('connection.php');
$query = "SELECT v.id, v.fname, v.lname, v.brgy, v.mi, a.account_status , v.gender, v.conditions, a.account_id from verified v INNER JOIN account a on v.app_id = a.account_id";
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
        #condition:hover{
            cursor: pointer;
        }
        #brgy:hover{
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" >
        <?php 
        $class="table";
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
                                <h4 class="title">User Profile Lists</h4>
                                <p class="category">Discover who is among the lists</p>
                                <div class="col-md-12" style="display:flex; align-items:center; justify-content:center; gap:1em;">
                                    <input type="text" class="form-control" name="" id="search" placeholder="search">
                                    <select name="" class="form-control" id="brgy"  style="width: 10em;">
                                    <option value="">Barangay</option>
                                        <?php
                                        $barangays = [
                                            'ALIWEKWEK',
                                            'BAAY',
                                            'BALANGOBONG',
                                            'BALOCOC',
                                            'BANTAYAN',
                                            'BASING',
                                            'CAPANDANAN',
                                            'DOMALANDAN CENTER',
                                            'DOMALANDAN EAST',
                                            'DOMALANDAN WEST',
                                            'DORONGAN',
                                            'DULAG',
                                            'ESTANZA',
                                            'LASIP',
                                            'LIBSONG EAST',
                                            'LIBSONG WEST',
                                            'MALAWA',
                                            'MALIMPUEC',
                                            'MANIBOC',
                                            'MATALAVA',
                                            'NAGUELGUEL',
                                            'NAMOLAN',
                                            'PANGAPISAN NORTH',
                                            'PANGAPISAN SUR',
                                            'POBLACION',
                                            'QUIBAOL',
                                            'ROSARIO',
                                            'SABANGAN',
                                            'TALOGTOG',
                                            'TUMBAR',
                                            'TONTON',
                                            'WAWA'
                                        ];
                                        foreach ($barangays as $barangay) {
                                            echo "<option value=\"$barangay\">$barangay</option>";
                                        }
                                        ?>
                                    </select>
                                    <select name="" id="condition" class="form-control" style="width: 10em;">
                                        <option value="">Condition</option>
                                        <option value="senior citizen">Senior Citizen</option>
                                        <option value="pwd">Pwd</option>
                                    </select>
                                </div>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Name</th>
                                    	<th>Condition</th>
                                    	<th style="text-align: center;">STATUS</th>
                                    	<th>Gender</th>
                                    	<th>Brgy</th>
                                    </thead>
                                    <tbody id="tbody">
                                    <?php
                                       
                                       if(mysqli_num_rows($result)>0){
                                        $count=1;
                                        while($row = mysqli_fetch_assoc($result)){
                                            extract($row);
                                            $color = $account_status!="Pending"? "#fba423" : "#f01c05";
                                            echo "<tr class='row_data' onclick=\"goToPage('$account_id')\">
                                            <td>$count</td>
                                            <td>$fname $mi $lname</td>
                                            <td>$conditions</td>
                                            <td style='background: $color  ; text-align:center; color:white;'>$account_status</td>
                                            <td>$gender</td>
                                            <td>$brgy</td>
                                            </tr>";
                                            $count++;
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
    function goToPage(id){
        window.location.href = "user.php?user_id="+id;
    }
    function createElementTag(e,count){
        const tbody = document.querySelector('#tbody')
        const {id , fname, lname, number, mi, account_status, conditions,gender, brgy, account_id} =e
        const tr = document.createElement('tr')
        const td1 = document.createElement('td')
        const td2 = document.createElement('td')
        const td3 = document.createElement('td')
        const td4 = document.createElement('td')
        const td5 = document.createElement('td')
        const td6 = document.createElement('td')

        tr.classList.add("row_data")
        tr.onclick= function() {
            goToPage(account_id)
        }
        td1.textContent = count
        td2.textContent = `${fname} ${mi} ${lname}`
        td3.textContent = conditions
        td4.textContent = account_status
        td4.style.background = account_status!="Pending"? "#fba423" : "#f01c05";
        td4.style.textAlign = "center"
        td4.style.color = "white"
        td5.textContent = gender
        td6.textContent = brgy
        tr.appendChild(td1)
        tr.appendChild(td2)
        tr.appendChild(td3)
        tr.appendChild(td4)
        tr.appendChild(td5)
        tr.appendChild(td6)
        tbody.appendChild(tr)
    }
    function refreshTags(){
        const entrydashElements = document.querySelectorAll('.row_data');
        for (let entry of entrydashElements) {
            entry.remove();
        }
    }

    const tbody = document.querySelector('#tbody');

function sendRequest(searchValue, brgy, condition) {
  const value = searchValue ? searchValue : "";
  fetch(`./backend/user.php?filter=${encodeURIComponent(value)}&brgy=${encodeURIComponent(brgy)}&condition=${condition}`, {
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
          createElementTag(item, count);
          count++;
        });
      }
    });
}

const search = document.getElementById('search');
const brgy = document.getElementById('brgy');
const condition = document.getElementById('condition');

function updateSearch() {
  const conditionVal = condition.value !== "" ? condition.value : "";
  const brgyVal = brgy.value !== "" ? brgy.value : "";
  sendRequest(search.value, brgyVal, conditionVal);
}

search.addEventListener('keyup', function (e) {
  console.log('keyup event triggered');
  updateSearch();
});

brgy.addEventListener('change', function (e) {
  console.log('change event for brgy triggered');
  updateSearch();
});

condition.addEventListener('change', function (e) {
  console.log('change event for condition triggered');
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
