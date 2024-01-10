<?php
require('connection.php');
if(isset($_GET['user_id'])){
    $_SESSION['user_id'] = $_GET['user_id'];
    $_SESSION['isLogged'] =true;
}
if(!isset($_SESSION['isLogged'])){
    header('Location: login.php');
    exit();
}

$endDate = new DateTime('last day of last month');
$startDate = new DateTime('first day of this month');
$endDateStr = $endDate->format('Y-m-d');
$startDateStr = $startDate->format('Y-m-d');
$startDate = $endDateStr;
$endDate = $startDateStr;
$filter_date = " ";
if(isset($_GET['startDate']) && $_GET['endDate'] && $_GET['store_id']){
    $startDate = $_GET['startDate'];
    $endDate = $_GET['endDate'];
    $store_id = $_GET['store_id'];
    $store_pick = $store_id=="all"? "": "and c.store_id= '$store_id'";
    $filter_date = " where r.date >= '$startDate' and r.date <= '$endDate' $store_pick";
}
 $showTable = false;
    $showTable = true;
    $highest_user ="";
    $query_user = "SELECT c.name  , c.address, c.number, r.date as date, r.company_id, r.discount, r.price from company c inner join receipt r on r.company_id = c.store_id $filter_date";
    $query_user_max = "SELECT concat(c.name,' ' , (r.price)) as max_price from company c inner join receipt r on r.company_id = c.store_id $filter_date order by r.price desc limit 1 ";
    $query_result = mysqli_query($conn,$query_user);
    $query_result_max_user = mysqli_query($conn,$query_user_max);
    if($query_result_max_user){
        $assoc_one= mysqli_fetch_assoc($query_result_max_user);
        $highest_user = $assoc_one['max_price'];
    }else{
        $highest_user = "None 0";
    }
    $queryStore = "SELECT c.name , c.store_id from company c inner join account a on c.store_id = a.account_id";
    $resultStore = mysqli_query($conn, $queryStore);
    // echo $query_user;
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

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <link href="assets/css/confirmation.css" rel="stylesheet" />
    <link href="assets/css/demo.css" rel="stylesheet" />

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <!--  Charts Plugin -->
    <script src="./assets/js/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        #anotherList, .listUser{
            list-style-type: none;
        }
        #anotherList li a, , .listUser li a{
            padding:.5em;
        }
        .sidebar{
            background-color: #608943;
        }
        #downloadBtn, #showtable,#showgraph,#showcompany{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            height: 2em;
            width: 10em;
            padding: 1.5em;
            background: var(--primary);

            border: none;
            color: white;
        }
        .details{
            width: 100%;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            gap: 2em;
        }
        .date_details, .detailsBtn{
            display:flex;
            gap: 1em;
            justify-content: center;
            align-items: center;
        }
        .details input{
            height:3em;
        }

        .detailsBtn button{
            background: var(--primary);
            border: none;
            color: white;
            padding: .8em;
        }
        

        #tableStore {
            border: 1px solid black;
            height: 10em;
            width: 100%;
            overflow: scroll;

        }
        table td{
            border: 1px solid black;
            padding: .5em;
        }
        .tablehead td{
            text-align: center;
        }
    </style>
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
        <div class="content" id="downloadComponent">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Reports</h4>
                                <p class="category">STORE</p>
                            </div>
                            <div class="content">
                                <div class="details">
                                    <button id="downloadBtn">DOWNLOAD</button>
                                    <select class="form-control" name="shopname" id="store_id" style="width: 20em">
                                        <option value="all" selected>All Store</option>
                                    <?php
                                    if(mysqli_num_rows($resultStore)>0){
                                        while($assocStore = mysqli_fetch_assoc($resultStore)){
                                            $store_id = $assocStore['store_id'];
                                            $store_name = $assocStore['name'];
                                            echo "<option value='$store_id'>$store_name</option>";
                                        }
                                    }else{
                                        echo "<option value='none'>None</option>";
                                    }
                                    ?>

                                    </select>
                                    <div class="date_details">
                                        <input type="date" name="" id="startDate" <?php echo $filter_date == "" ? "" : 'value="' . date('Y-m-d', strtotime($startDate)) . '"'; ?>>
                                        <p>To</p>
                                        <input type="date" name="" id="endDate" <?php echo $filter_date == "" ? "" : 'value="' . date('Y-m-d', strtotime($endDate)) . '"'; ?>>

                                    </div>
                                    <div class="detailsBtn">
                                        <input type="text" name="" id="" readonly value="Highest: <?php echo $highest_user?>">
                                        <button id="filterBtn">Show Data</button>
                                    </div>
                                </div>
                                <br>
                               <table id="tableStore">
                                    <tr class="tablehead">
                                        <td>Name</td>
                                        <td>Address</td>
                                        <td>Contact</td>
                                        <td>Store ID</td>
                                        <td>Date</td>
                                        <td>Discounts</td>
                                        <td>Payments</td>
                                    </tr>
                                    <?php
                                    
                                    if(mysqli_num_rows($query_result)>0){
                                        $counter = 1;
                                        while($row = mysqli_fetch_assoc($query_result)){
                                        ?>
                                            <tr>
                                                <td><?php echo $counter ?></td>
                                                <td><?php echo $row['name']?></td>
                                                <td><?php echo $row['address']?></td>
                                                <td><?php echo $row['number']?></td>
                                                <td><?php echo $row['company_id']?></td>
                                                <td><?php echo date('M j, g:i a', strtotime($row['date']))?></td>
                                                <td><?php echo $row['discount']?></td>
                                                <td><?php echo $row['price']?></td>
                                            </tr>
                                        <?php
                                        $counter++;
                                        }}else{
                                            echo '<tr><td colspan="7" style="text-align:center;">No Data</td></tr>';
                                        }
                                    
                                    ?>
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
const downloadButton = document.getElementById('downloadBtn');
const cardContainer = document.getElementById('downloadComponent');

downloadButton.addEventListener('click', function () {
  const element = cardContainer; // element to be converted to PDF
  html2pdf(element)
    .from(element)
    .save('dashboard_report.pdf');
});

const filterBtn = document.querySelector('#filterBtn');
filterBtn.addEventListener('click', ()=>{
    const startDate = document.querySelector('#startDate').value;
    const endDate = document.querySelector('#endDate').value;
    const store_id = document.querySelector('#store_id').value;
    window.location.href = `dash_reports_company.php?startDate=${startDate}&endDate=${endDate}&store_id=${store_id}`;
})
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
	<script src="assets/js/demo.js"></script>

	

</html>
