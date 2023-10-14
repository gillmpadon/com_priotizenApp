<?php
require('connection.php');
if(isset($_GET['user_id'])){
    $_SESSION['user_id'] = $_GET['user_id'];
    $_SESSION['isLogged'] =true;
}

 $query = "SELECT  count(*) as count, conditions from verified GROUP by conditions";
 $result = mysqli_query($conn, $query);
 $origArr = array();
if($result){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $arr = array();
            $arr['count'] = $row['count'];
            $arr['conditions'] = $row['conditions'];
            $origArr[] = $arr;
        }
    }else{
        $origArr[] = "Error";
    }
}else{
    $origArr[] = "Error";
}
 $origArr = json_encode($origArr);


 $brgyQuery ="select count(*) as count, brgy, conditions from verified GROUP by conditions,brgy";
 $brgyResult = mysqli_query($conn, $brgyQuery);
 $brgyArr = array();
 if($brgyResult){
    if(mysqli_num_rows($brgyResult) > 0){
        while($row = mysqli_fetch_assoc($brgyResult)){
            $arr = array();
            $arr['count'] = $row['count'];
            $arr['brgy'] = $row['brgy'];
            $arr['conditions'] = $row['conditions'];
            $brgyArr[] = $arr;
        }
    }else{
        $brgyArr[] = "Error";
    }
 }else{
    $brgyArr[] = "Error";
 }

 $brgyArr = json_encode($brgyArr);
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

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" />

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <!--  Charts Plugin -->
    <script src="./assets/js/chartist.min.js"></script>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" >
        <?php 
        $class="dashboard";
        include('includes/sidebar.php'); ?>
    </div>
    <div class="main-panel">
        <?php include('includes/navbar.php'); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Total Number Of User</h4>
                                <p class="category">Percentage</p>
                            </div>
                            <div class="content">
                                <div id="chartPreferences" class="ct-chart ct-perfect-fourth" style="font-size: 2em;"></div>
                                <div class="footer">
                                    <div class="legend " style=" display: flex;  justify-content: center; align-items: center; gap:1em">
                                        <i class="fa fa-circle text-info" ></i> Disabled
                                        <i class="fa fa-circle text-danger"></i> Senior Citizen
                                    </div>
                                    <hr>
                                    <div class="stats" >
                                        <i class="fa fa-clock-o"></i><span id="totalCount" style="font-size: 1em;"> </span> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">USERS REPORT</h4>
                                <p class="category">Categorized via condition each brgy</p>
                            </div>
                            <div class="content">
                                <div id="chartActivity" class="ct-chart ct-perfect-fourth"></div>

                                <div class="footer">
                                    <div class="legend " style=" display: flex;  justify-content: center; align-items: center; gap:1em">
                                        <i class="fa fa-circle text-info" ></i> Disabled
                                        <i class="fa fa-circle text-danger"></i> Senior Citizen
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-check"></i> Data information certified
                                    </div>
                                </div>
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
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>

<script>
    const totalCount = document.getElementById("totalCount")
    const arr = <?php echo $origArr  ?>;
    console.log(arr);
    const label = []
    const percent = []
    let count = 0;
    arr.map(item=>{
        const str = `${item.count}%`;
        label.push(str)
        percent.push(item.count)
        count += Number.parseInt(item.count)
    })
    totalCount.textContent = ` Total Number is ${count}`;
    
    var dataPreferences = {
            series: [
                [25, 30, 20, 25]
            ]
        };

        var optionsPreferences = {
            donut: true,
            donutWidth: 40,
            startAngle: 0,
            total: 100,
            showLabel: false,
            axisX: {
                showGrid: false
            },
        
        };

        Chartist.Pie('#chartPreferences', dataPreferences, optionsPreferences);

        Chartist.Pie('#chartPreferences', {
          labels: label,
          series: percent
        });



    // Sample SQL result data
    const sqlResult = <?php echo $brgyArr ?>;
    // Create a new object to store the formatted data
    const formattedData = {};

    // Iterate through the SQL result data
    sqlResult.map((row) => {
    if (!formattedData[row.brgy]) {
        formattedData[row.brgy] = {
        brgy: row.brgy,
        disabled: '0',
        senior: '0',
        };
    }

    if (row.conditions === 'Disabled') {
        formattedData[row.brgy].disabled = row.count;
    } else if (row.conditions === 'Senior Citizen') {
        formattedData[row.brgy].senior = row.count;
    }
    });

    // Convert the formatted data into an array
        const resultArray = Object.values(formattedData);
        const brgyData = resultArray

        // Extract disabled and senior population data
        const disabledData = brgyData.map((item) => parseInt(item.disabled, 10));
        const seniorData = brgyData.map((item) => parseInt(item.senior, 10));
        const brgyLabels = brgyData.map((item) => item.brgy);

        // Create data for the bar graph
        const data = {
        labels: brgyLabels,
        series: [disabledData, seniorData],
        };

        // Set the options for the bar graph
        const options = {
        stackBars: false,
        axisX: {
            labelInterpolationFnc: (value) => value, // Display brgy name as labels
        },
        };

        // Create the bar graph
        new Chartist.Bar('#chartActivity', data, options);
        console.log({"resultArray":resultArray})
</script>

</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<!-- <script src="assets/js/demo.js"></script> -->

	

</html>
