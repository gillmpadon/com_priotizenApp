<?php
require('connection.php');
if(isset($_GET['user_id'])){
    $_SESSION['user_id'] = $_GET['user_id'];
    $admin_id = $_GET['user_id'];
    echo "<script>localStorage.setItem('admin_id','$admin_id')</script>";
    $photo = "SELECT image from admin where admin_id = '$admin_id'";
    $resphoto = mysqli_query($conn, $photo);
    $assocphoto = mysqli_fetch_assoc($resphoto);
    $_SESSION['admin_image'] = $assocphoto['image'];
    $_SESSION['isLogged'] =true;
}
if(!isset($_SESSION['isLogged'])){
    header('Location: login.php');
    exit();
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


 $brgyQuery ="SELECT count(*) as count, brgy, conditions from verified GROUP by conditions,brgy";
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

 $topDiscount ="SELECT c.name , count(r.id) as count, sum(r.discount) as discount from receipt r inner join company c on c.store_id = r.company_id group by company_id order by discount desc limit 10";
 $resDiscount = mysqli_query($conn, $topDiscount);
 $arrCompany = array();
 $dis_count= 1;
 if($resDiscount){
    if(mysqli_num_rows($resDiscount) > 0){
        while($row = mysqli_fetch_assoc($resDiscount)){
            $arr = array();
            $arr['discount'] = $row['discount'];
            $arr['count'] = $row['count'];
            $arr['name'] = $row['name'];
            $arrCompany[] = $arr;
            $dis_count++;
        }
    }else{
        $arrCompany[] = "Error";
    }
 }else{
    $arrCompany[] = "Error";
 }
$arrCom = $arrCompany;
 $arrCompany = json_encode($arrCompany);

 $topCustomer ="SELECT  r.user_id, concat(v.lname, ' ', v.fname) as name , sum(r.price) as price, sum(r.discount) as discount, count(r.id) as count from receipt r inner join verified v on r.user_id = v.app_id group by r.user_id order by price desc limit 10  ";
 $resCustomer = mysqli_query($conn, $topCustomer);
 $arrCustomer = array();
 $dis_count= 1;
 if($resCustomer){
    if(mysqli_num_rows($resCustomer) > 0){
        while($row = mysqli_fetch_assoc($resCustomer)){
            $arr = array();
            $arr['name'] = $row['name'];
            $arr['price'] = $row['price'];
            $arr['discount'] = $row['discount'];
            $arr['count'] = $row['count'];
            $arrCustomer[] = $arr;
            $dis_count++;
        }
    }else{
        $arrCustomer[] = "Error";
    }
 }else{
    $arrCustomer[] = "Error";
 }
 $arrCus = $arrCustomer;
 $arrCustomer = json_encode($arrCustomer);
 $showTable = false;
 if(isset($_GET['filter']) && $_GET['filter'] == 'company'){
    $showTable = true;
    // $start_date = $_GET['start_date'];
    // $end_date = $_GET['end_date'];
    $highest ="";
    $query_company = "SELECT c.name , c.address, c.number, r.company_id, r.discount, r.price from company c inner join receipt r on r.company_id = c.store_id";
    $query_company_max = "SELECT concat(c.name,' ' , max(r.price) ) as max_price from company c inner join receipt r on r.company_id = c.store_id";
    $query_result = mysqli_query($conn,$query_company);
    $query_result_max = mysqli_query($conn,$query_company_max);
    if($query_result_max){
        $assoc_one= mysqli_fetch_assoc($query_result_max);
        $highest = $assoc_one['max_price'];
    }else{
        $highest = "None 0";
    }
 }

 if(isset($_GET['filter']) && $_GET['filter'] == 'user'){
    $showTable = true;
    // $start_date = $_GET['start_date'];
    // $end_date = $_GET['end_date'];
    $highest_user ="";
    $query_user = "SELECT c.name , c.address, c.number, r.company_id, r.discount, r.price from company c inner join receipt r on r.company_id = c.store_id";
    $query_user_max = "SELECT concat(c.name,' ' , max(r.price) ) as max_price from company c inner join receipt r on r.company_id = c.store_id";
    $query_result = mysqli_query($conn,$query_user);
    $query_result_max_user = mysqli_query($conn,$query_user_max);
    if($query_result_max_user){
        $assoc_one= mysqli_fetch_assoc($query_result_max_user);
        $highest_user = $assoc_one['max_price'];
    }else{
        $highest_user = "None 0";
    }
 }
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
            gap: 2em;
        }
        .date_details, .detailsBtn{
            display:flex;
            gap: 1em;
        }

        .detailsBtn button{
            background-color: green;
            border: none;
            color: white;
        }
        

        #tableStore table, #tableStore td{
            border: 1px solid black;
        }
        table{
            width: 100%;
        }
        table td{
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
                    <div class="col-md-6 graph" <?php echo  $showTable?  'style="display:none;"':'' ?>>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Top Company</h4>
                                <p class="category">Representation</p>
                            </div>
                            <div class="content">
                                <canvas id="chart_company" class="ct-chart ct-perfect-fourth" style="font-size: 2em;"></canvas>
                                <div class="footer">
                                    <hr>
                                    <div class="stats" >
                                        <?php 
                                        $counterCom = 1;
                                            foreach  ( $arrCom  as $i){
                                                echo ' <p>Top '.$counterCom.' <span style="font-size: 1em;">'.$i['name'].'</span> </p>';
                                                $counterCom++;
                                            }
                                        ?>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 graph" <?php echo $showTable? 'style="display:none;"':'' ?>>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Top User </h4>
                                <p class="category">Representation</p>
                            </div>
                            <div class="content">
                                <canvas id="chart_customer" class="ct-chart ct-perfect-fourth" style="font-size: 2em;"></canvas>
                                <div class="footer">
                                    <hr>
                                    <div class="stats" >
                                    <?php 
                                        $counterCus = 1;
                                            foreach  ( $arrCus as $i){
                                                echo ' <p>Top '.$counterCus.' <span style="font-size: 1em;">'.$i['name'].'</span> </p>';
                                                $counterCus++;
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                </div>
                <div class="flex" style="display:flex; gap:1em;">
                        <button id="downloadBtn">DOWNLOAD</button>
                   </div>
            </div>
        </div>

<?php include('includes/footer.php'); ?>

    </div>
</div>

<script>
    const arrCompany = <?php echo $arrCompany ?>;
    const arrCustomer = <?php echo $arrCustomer ?>;
    

    const company = [];  
    const companyLabel = [];   
    const customer = [];
    const customerLabel = []; 
    arrCompany.forEach( item=>{
        company.push(item.discount)
        companyLabel.push(item.name)
    })
    arrCustomer.forEach( item=>{
        customer.push(item.discount)
        customerLabel.push(item.name)
    })
    console.log(arrCustomer)
    console.log(arrCompany)
   
//Chart Top 10 Company Discounts
    const chart_company = document.getElementById('chart_company');
    new Chart(chart_company, {
    type: 'bar',
    data: {
        labels: companyLabel,
        datasets: [{
        label: 'Top Company to give Discounts',
        data: company,
        borderWidth: 1,
        backgroundColor: [ 'red ']
        }]
    },
    options: {
        scales: {
        y: {
            beginAtZero: true
        }
        }
    }
});



//Top Customre to use Discounts
const chart_customer = document.getElementById('chart_customer');
    new Chart(chart_customer, {
    type: 'bar',
    data: {
        labels: customerLabel,
        datasets: [{
        label: 'Top Customer to use Discounts',
        data: customer,
        borderWidth: 1,
        backgroundColor: [ 'skyblue ']

        }]
    },
    options: {
        scales: {
        y: {
            beginAtZero: true
        }
        }
    }
});

const downloadButton = document.getElementById('downloadBtn');
const cardContainer = document.getElementById('downloadComponent');

downloadButton.addEventListener('click', function () {
  const element = cardContainer; // element to be converted to PDF
  html2pdf(element, {
    margin: 10, // optional, set the margins
    filename: 'dashboard_report.pdf', // optional, set the filename
    jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' } // set the orientation to landscape
  }).from(element).save();
});
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
