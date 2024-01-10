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



$showTable = false;
$showTable = true;
$query_user = "SELECT v.*, t.all_data FROM verified v inner join test t on v.app_id=t.user_id inner join account a on a.account_id = v.app_id where v.conditions like 'pwd' ";
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
        #filterBtn{
            width: 15em;
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
                                <p class="category">PWD</p>
                            </div>
                            <div class="content">
                                <div class="details">
                                    <button id="downloadBtn">DOWNLOAD</button>
                                    <div class="detailsBtn">
                                        <select name="filter" class="form-control" id="selectFilter">
                                            <option value="occupation"  <?php echo ($_GET['select']=='occupation')? 'selected': '' ?>>Occupation</option>
                                            <option value="education"  <?php echo ($_GET['select']=='education')? 'selected': '' ?>>Educational Attainment</option>
                                            <option value="typedisability"  <?php echo ($_GET['select']=='typedisability')? 'selected': '' ?>>Type of Disability</option>
                                            <option value="causedisability"  <?php echo ($_GET['select']=='causedisability')? 'selected': '' ?>>Cause of Disability</option>
                                            <option value="numberdisability" <?php echo ($_GET['select']=='numberdisability')? 'selected': '' ?>>Disability Number</option>
                                            <option value="employmentstatus" <?php echo ($_GET['select']=='employmentstatus')? 'selected': '' ?>>Status of Employment</option>
                                            <option value="employmenttypes"  <?php echo ($_GET['select']=='employmenttypes')? 'selected': '' ?>>Types of Employment</option>
                                            <option value="employmentcategory" <?php echo ($_GET['select']=='employmentcategory')? 'selected': '' ?>>Category of Employment</option>
                                        </select>
                                        <button id="filterBtn">Show Data</button>
                                    </div>
                                </div>
                                <br>
                                <?php
                                $select_col = "";
                                if($_GET['select'] == "occupation"){
                                    $select_col = "Occupation";
                                    $select_data = [ 'managers', 'technicians', 'professional', 'clerical', 'service', 'agricultural','trade', 'machine', 'occupation', 'forces', 'job_others'];
                                }else if($_GET['select'] == "education"){
                                    $select_col = "Education";
                                    $select_data = ['none', 'kindergarten', 'elementary', 'junior high school', 'senior high school', 'college', 'vocational', 'post graduate'];
                                }else if($_GET['select'] == "typedisability"){
                                    $select_col = "Type of Disability";
                                    $select_data = ['deaf', 'intellectual', 'learning', 'mental', 'physical', 'pyschosocial', 'speech', 'visual', 'cancer', 'rare'];
                                }else if($_GET['select'] == "causedisability"){
                                    $select_col = "Cause of Disability";
                                    $select_data = ['congenital', 'adhd', 'cerebral', 'palsy', 'down', 'cause_others_1', 'acquired', 'chronic', 'cerebral', 'injury', 'cause_others_2'];
                                }else if($_GET['select'] == "numberdisability"){
                                    $select_col = "Disability Number";
                                    $select_data = ['valid_id'];
                                }else if($_GET['select'] == "employmentstatus"){
                                    $select_col = "Employment Status";
                                    $select_data = ['employed','unemployed','selfemployed'];
                                }else if($_GET['select'] == "employmenttypes"){
                                    $select_col = "Employment Types";
                                    $select_data = ['regular','seasonal','casual'];
                                }else if($_GET['select'] == "employmentcategory"){
                                    $select_col = "Employment Category";
                                    $select_data = ['government','private'];
                                }
                                ?>
                               <table id="tableStore">
                                    <tr class="tablehead">
                                        <td>Name</td>
                                        <td>Address</td>
                                        <td>Gender</td>
                                        <td>Email</td>
                                        <td>Number</td>
                                        <td>Birthdate</td>
                                        <td><?php echo $select_col ?></td>
                                    </tr>
                                    <?php
                                    function findValue($jsonData, $keys) {
                                        foreach ($keys as $key) {
                                            if ($jsonData[$key] == "1") {
                                                return $key;
                                            }
                                        }
                                    
                                        return "";
                                    }

                                    if(mysqli_num_rows($query_result)>0){
                                        $counter =1;
                                        while($row = mysqli_fetch_assoc($query_result) ){

                                        ?>
                                            <tr>
                                                
                                                <?php
                                                    $data = json_decode($row['all_data'], true); 
                                                    $resultsData = findValue($data, $select_data)
                                                ?>
                                                <td><?php echo $counter ?></td>
                                                <td><?php echo $row['lname']." ".$row['fname'] ?></td>
                                                <td><?php echo $row['brgy']?></td>
                                                <td><?php echo $row['gender']?></td>
                                                <td><?php echo $row['email']?></td>
                                                <td><?php echo $row['number']?></td>
                                                <td><?php echo $row['bdate']?></td>
                                                <td><?php echo $resultsData ?></td>
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
    const selectFilter = document.querySelector('#selectFilter').value;
    window.location.href = `dash_reports_pwd.php?select=${selectFilter}`;
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
