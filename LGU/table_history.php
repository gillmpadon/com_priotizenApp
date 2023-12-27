<?php
require('connection.php');
$query = "SELECT u.action, u.time_edited, a.name as admin_name,v.conditions, concat(v.lname,' ',v.fname) as user_name  from user_history u inner join admin a on u.admin_id = a.admin_id inner join verified v on u.user_id = v.app_id  order by u.id desc ";
$result = mysqli_query($conn,$query);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>LGU Managment</title>

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
                                    <select name="" class="form-control" id="brgy"  style="width: 10em; display:none" >
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
                                    <select name="" id="condition" class="form-control" style="width: 10em;display:none">
                                        <option value="">Condition</option>
                                        <option value="senior citizen">Senior Citizen</option>
                                        <option value="disabled">Disabled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>User</th>
                                    	<th>Condition</th>
                                    	<th>Admin</th>
                                    	<th>Action</th>
                                    	<th>Date</th>
                                    </thead>
                                    <tbody id="tbody">
                                    <?php
                                       
                                       if(mysqli_num_rows($result)>0){
                                        $counter=1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $user_name = $row['user_name'];
                                            $admin_name = $row['admin_name'];
                                            $action = $row['action'];
                                            $conditions = $row['conditions'];
                                            $time_done = $row['time_edited'];
                                            $dateTime = new DateTime($time_done);
                                            $newDate = $dateTime -> format('F j g:i A');
                                            echo "<tr class='row_data'>
                                            <td>$counter</td>
                                            <td>$user_name</td>
                                            <td>$conditions</td>
                                            <td>$admin_name</td>
                                            <td>$action</td>
                                            <td>$newDate</td>
                                            </tr>";
                                            $counter++;
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

<?php include('includes/footer.php'); ?>


    </div>
</div>

<script>
    function goToPage(id){
        window.location.href = "user.php?user_id="+id;
    }
    function createElementTag(e,count){
        const tbody = document.querySelector('#tbody')
        const {action, admin_name, conditions, time_done, user_name} = e
        const tr = document.createElement('tr')
        const td1 = document.createElement('td')
        const td2 = document.createElement('td')
        const td3 = document.createElement('td')
        const td4 = document.createElement('td')
        const td5 = document.createElement('td')
        const td6 = document.createElement('td')

        tr.classList.add("row_data")

        td1.textContent = count
        td2.textContent = user_name
        td3.textContent = conditions
        td4.textContent = admin_name
        td5.textContent = action
        td6.textContent = time_done
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

function sendRequest(searchValue) {
  const value = searchValue ? searchValue : "";
  fetch(`./backend/search.php?filter=${encodeURIComponent(value)}`, {
    method: 'GET'
  })
    .then(response => response.json())
    .then(result => {
      if (result.Error == "Error") {
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
    console.log(result);
    });
}

function updateSearch(){
    const search_value =  document.getElementById('search').value
    sendRequest(search_value);
}
const search = document.getElementById('search');

search.addEventListener('keyup', function (e) {
  console.log('keyup event triggered');
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
