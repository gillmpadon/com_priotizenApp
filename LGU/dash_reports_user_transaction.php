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
$endDateOld = $endDate;
if(isset($_GET['startDate']) && $_GET['endDate']){
    $startDate = $_GET['startDate'];
    $endDate = $_GET['endDate'];
    $endDateOld = $endDate;
    $formatDate = new DateTime($endDate);
    $formatDate ->modify('+1 day');
    $endDate = $formatDate->format('Y-m-d');
    $filter_date = " where r.date >= '$startDate' and r.date <= '$endDate'";
}
    $account_id = isset($_GET['account_id'])? $_GET['account_id']:"";
    $account =  $account_id? "and app_id='$account_id'":"";
    $query_user = "SELECT concat(c.lname,' ',c.fname) as name , c.conditions ,co.name as cname, r.date as date, r.discount, r.price from verified c inner join receipt r on r.user_id = c.app_id INNER JOIN company co on co.store_id = r.company_id $filter_date $account ";
    $query_result = mysqli_query($conn,$query_user);
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
                                <p class="category">USERS</p>
                            </div>
                            <div class="content">
                                <div class="details">
                                    <button id="downloadBtn">DOWNLOAD</button>
                                    <div class="date_details">
                                        <input type="date" name="" id="startDate" <?php echo $filter_date == "" ? "" : 'value="' . date('Y-m-d', strtotime($startDate)) . '"'; ?>>
                                        <p>To</p>
                                        <input type="date" name="" id="endDate" <?php echo $filter_date == "" ? "" : 'value="' . date('Y-m-d', strtotime($endDateOld)) . '"'; ?>>
                                    </div>
                                    <div class="detailsBtn">
                                        <input type="text" name="" id="account_id" >
                                        <button id="filterBtn">Show Data</button>
                                    </div>
                                </div>
                                <br>
                               <table id="tableStore">
                                    <tr class="tablehead">
                                        <td>Name</td>
                                        <td>Account Type</td>
                                        <td>Store Name</td>
                                        <td>Date</td>
                                        <td>Bill</td>
                                        <td>Discounts</td>
                                        <td>Payments</td>
                                    </tr>
                                    <?php
                                    if(mysqli_num_rows($query_result)>0){
                                        while($row = mysqli_fetch_assoc($query_result)){
                                        $bill = $row['price'] - ($row['price'] * ($row['discount'] / 100));

                                        ?>
                                            <tr>
                                                <td><?php echo $row['name']?></td>
                                                <td><?php echo $row['conditions']?></td>
                                                <td><?php echo $row['cname']?></td>
                                                <td><?php echo date('M j, g:i a', strtotime($row['date']))?></td>
                                                <td><?php echo $row['price']?></td>
                                                <td><?php echo $row['discount']?></td>
                                                <td><?php echo $bill ?></td>
                                            </tr>
                                        <?php
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
    let account_id = document.querySelector('#account_id').value;
    account_id = account_id? account_id: new URLSearchParams(window.location.search).get('account_id')
    window.location.href = `dash_reports_user_transaction.php?startDate=${startDate}&endDate=${endDate}&account_id=${account_id}`;
})
</script>

</body>
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap-notify.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
	<script src="assets/js/demo.js"></script>
</html>
